<?php

namespace module\admin5;

include 'Validate.class.php';

class login extends base{

    function __construct(){
        parent::__construct();
    }

	function login(){
		$data = array();
		$this->view("/admin5/login",$data);
	}

	function user_checkin(){
		$data = array();
		// dump($_POST);
		if(isset($_POST['admin_user'])){
			$username = $this->input()->post('admin_user');
			$password = $this->input()->post('admin_pass');
			// if(\Validate::checkUser($username)) die('用户名必须是以字母开头，之后为数字或字母。长度在6-20位之间');
			// if(\Validate::checkPass($password)) die('密码必须是数字或字母。长度在6-20位之间');
			$sql = "SELECT m.*,l.level_name,l.permission FROM `qzw_manage` as m LEFT JOIN `qzw_level` as l ON m.level = l.lid WHERE `username` = '$username'";
			$result = $this->model()->get($sql);
			if($result){
				$dbpass = $result['password'];
				if(password_verify($password,$dbpass)){
					$ip = $this->model()->GetIp();
					$sql = "UPDATE `qzw_manage` SET `login_count`=`login_count`+1,`last_ip`='$ip',`last_time`=NOW() WHERE `username` = '$username'";
					$this->model()->update($sql);
					$this->input()->session('mid',$result['mid']);
					$this->input()->session('username',$result['username']);
					// $this->input()->session('level',$result['level']);
					$this->input()->session('level_name',$result['level_name']);
					// $this->input()->session('permission',$result['permission']);
					$message = '用户登录成功';
					$pageName = '后台主页';
					$url = url('admin5','home','index');
				}else{
					$message = '用户登录失败';
					$pageName = '管理员登录页';
					$url = url('admin5','login','login');
				}
			}else{
				$message = '用户登录失败';
				$pageName = '管理员登录页';
				$url = url('admin5','login','login');
			}
			$this->jump($message,$pageName,$url);
		}
	}

	function logout(){
		$this->input()->clearSession();
		$message = '成功登出';
		$pageName = '管理员登录页';
		$url = url('admin5','login','login');
		$this->jump($message,$pageName,$url);
	}
	
}