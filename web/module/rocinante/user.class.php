<?php

namespace module\rocinante;

include 'Validate.class.php';

class user extends \core\Controller{

	const SALT = 'WoLeG';

	function user_login(){
		$data = array();
		$this->fw('/rocinante/user_login',$data);
	}

	function user_checkin(){
		$data = array();
		// dump($_POST);
		if(isset($_POST['username'])){
			$username = $this->input()->post('username');
			$password = $this->input()->post('password');
			if(\Validate::checkUser($username)) die('用户名必须是以字母开头，之后为数字或字母。长度在6-20位之间');
			if(\Validate::checkPass($password)) die('密码必须是数字或字母。长度在6-20位之间');
			$password = $this->phash($password);
			$sql = "SELECT `uid`,`username`,`password` FROM `qzw_user` WHERE `username` = '$username' AND `password` = '$password'";
			$result = $this->model()->get($sql);
			if($result){
				echo "用户登录成功";
				$this->input()->session('uid',$result['uid']);
				$this->input()->session('username',$result['username']);
				$this->fw( '/plc/index',$data );
			}else{
				echo "用户登录失败";
			}
		}
	}

	function is_user_login(){
		$uid = $this->input()->session('uid');
		$username = $this->input()->session('username');
		$sql = "SELECT `uid`,`username`  FROM `qzw_user` WHERE `username` = '$username' AND `uid` = '$uid'";
		$result = $this->model()->get($sql);
		if($result){
			echo "用户已经登录，用户ID为：".$uid." 用户名为：".$username;
		}else{
			echo "用户未登录，或session信息有误！";
		}
	}

	function user_reg(){
		$data = array();
		$this->fw('/rocinante/user_reg',$data);
	}

	function user_insert(){
		$data = array();
		// dump($_POST);
		if(isset($_POST['username'])){
			$username = $this->input()->post('username');
			if(!$this->is_user_exist($username)){
				$password = $this->input()->post('password');
				$password1 = $this->input()->post('password1');
				$mobile = $this->input()->post('mobile');
				$sms_code = $this->input()->post('sms_code');
				$email = $this->input()->post('email');

				if(\Validate::checkUser($username)) die('用户名必须是以字母开头，之后为数字或字母。长度在6-20位之间');
				if(\Validate::checkPass($password)) die('密码必须是数字或字母。长度在6-20位之间');
				if(\Validate::checkEquals($password,$password1)) die('两次密码不一致！');
				if(\Validate::checkMobile($mobile)) die('手机号必须是以1开头的11位数字');
				if(\Validate::checkSms($sms_code)) die(' 验证码必须是6位数字');

				if(!$this->is_sms_code($mobile,$sms_code)){
					echo "手机号或验证码有误！";
					exit();
				}
				$password = $this->phash($password);
				$reg_time = time();
				$sql = "INSERT INTO `qzw_user` (`username`,`password`,`mobile`,`email`,`reg_time`) VALUES('$username','$password','$mobile','$email',$reg_time)";
				// echo $sql;
				$uid = $this->model()->insert($sql);
				if($uid){
					echo "用户注册成功";
					return $this->fw( '/plc/index',$data );
				}else{
					echo "用户注册失败";
				}
			}else{
				die('此用户名已经注册过了！');
			}			
		}
	}

	function is_user_exist($username, $mobile=null){
		if($mobile === null){
			$sql = "SELECT * FROM `qzw_user` WHERE `username` = '$username'";
		}else{
			$sql = "SELECT * FROM `qzw_user` WHERE `username` = '$username' AND `mobile` = '$mobile'";
		}		
		$result = $this->model()->get($sql);
		if($result){
			return $result['uid'];
		}else{
			return false;
		}
	}

	function is_user_exist_ajax(){
		$username = $this->input()->post('username');
		$sql = "SELECT * FROM `qzw_user` WHERE `username` = '$username'";
		$result = $this->model()->get($sql);
		$user_exist = array();
		if($result){
			$user_exist['status'] = "yes";
			echo json_encode($user_exist['status']);
		}else{
			$user_exist['status'] = "no";
			echo json_encode($user_exist['status']);
		}
	}

	function sms_sent(){

		// die(json_encode('success'));

		$mobile = $this->input()->post('mobile');
		// $mobile = '18650112352';
		if(empty($mobile)) {
			die(json_encode('fail. mobile should not be empty!'));
		}

		// $sms = new \core\lib\Sms();
		// $sms->sendSms('23774817','ded34c95b310d8eae33e91a806aebf45','王世伟','SMS_63260253','123',$sms_code,$mobile);

		$feedback = array();

		include(PATH . '/module/rocinante/smsCode.class.php');
		$sms = new \smsCode($mobile);
		$resp = $sms->getSmsResp();
		if(isset($resp->code)){
			$feedback['code'] = $resp->code;
			$feedback['msg'] = $resp->msg;
			$feedback['sub_code'] = $resp->sub_code;
			$feedback['sub_msg'] = $resp->sub_msg;
			$feedback["request_id"] = $resp->request_id;
			$feedback['err_msg'] = "阿里反馈错误。阿里设置错误或触发业务流控";
			echo json_encode($feedback);
			exit();
		}else{
			$sms_code = $sms->getSmsCode();
			$sent_time = time();
			$sql = "INSERT INTO `qzw_sms` (`mobile`,`smscode`,`sent_time`) VALUES('$mobile','$sms_code',$sent_time)";
			$sms_id = $this->model()->insert($sql);
			if($sms_id){
				$feedback['code'] = 0;
				$feedback['model'] = $resp->result->model;
				$feedback['success'] = $resp->result->success;
				$feedback["request_id"] = $resp->request_id;
				$feedback['err_msg'] = "阿里反馈成功。数据库插入成功";
				echo json_encode($feedback);
				exit();
			}else{
				$feedback['code'] = -1;
				$feedback['model'] = $resp->result->model;
				$feedback['success'] = $resp->result->success;
				$feedback["request_id"] = $resp->request_id;
				$feedback['err_msg'] = "阿里反馈成功。数据库插入失败";
				echo json_encode($feedback);
				exit();
			}
		}
	}

	function is_sms_code($mobile,$sms_code){
		$current = time();
		$sql = "SELECT * FROM `qzw_sms` WHERE `mobile` = '$mobile' AND `smscode` = '$sms_code'  AND `sent_time` > $current - 60*5";
		$result = $this->model()->get($sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function is_sms_code_ajax(){
		$mobile = $this->input()->post('mobile');
		$sms_code = $this->input()->post('sms_code');
		$current = time();
		$sql = "SELECT * FROM `qzw_sms` WHERE `mobile` = '$mobile' AND `smscode` = '$sms_code' AND `sent_time` > $current - 60*5";
		$result = $this->model()->get($sql);
		$sms_code_verify = array();
		if($result){
			$sms_code_verify['status'] = "yes";
			echo json_encode($sms_code_verify['status']);
		}else{
			$sms_code_verify['status'] = "no";
			echo json_encode($sms_code_verify['status']);
		}
	}

	function phash($password){
		return hash('sha512',self::SALT.$password);
	}

	function pverify($password,$hash){
		return (self::phash($password) == $hash);
	}

	function user_reset(){
		$data = array();
		$this->fw('/rocinante/user_reset',$data);
	}

	function user_revise(){
		$data = array();
		if(isset($_POST['username'])){
			$username = $this->input()->post('username');
			$mobile = $this->input()->post('mobile');
			$sms_code = $this->input()->post('sms_code');
			if(\Validate::checkUser($username)) die('用户名必须是以字母开头，之后为数字或字母。长度在6-20位之间');
			if(\Validate::checkMobile($mobile)) die('手机号必须是以1开头的11位数字');
			if(\Validate::checkSms($sms_code)) die(' 验证码必须是6位数字');
			if(!($uid = $this->is_user_exist($username,$mobile))){
				echo "用户名与手机号匹配错误！";
				exit();
			}else{
				$data['uid'] = $uid;
				$data['username'] = $username;
			}
			if(!$this->is_sms_code($mobile,$sms_code)){
				echo "手机号或验证码有误！";
				exit();
			}

			
			$this->fw( '/rocinante/user_revise',$data );
		}
	}

	function user_amend(){
		$data = array();
		if(isset($_POST['username'])){
			$username = $this->input()->post('username');
			$uid = $this->input()->post('uid');
			$password = $this->input()->post('password');
			$password1 = $this->input()->post('password1');
			if(\Validate::checkPass($password)) die('密码必须是数字或字母。长度在6-20位之间');
			if(\Validate::checkEquals($password,$password1)) die('两次密码不一致！');
			$password = $this->phash($password);
			$sql = "UPDATE `qzw_user` SET `password` = '$password' WHERE `username` = '$username' AND `uid` = '$uid'";
			$result = $this->model()->update($sql);
			if($result){
				echo "密码修改成功";
				return $this->fw( '/rocinante/user_login',$data );
			}else{
				echo "密码修改失败";
			}

		}
	}

}