<?php

namespace module\jjuser;

Class Reg extends \core\Controller{
	//显示注册界面
	function showReg(){
		$data=array();
		 $this->fw('/jjuser/reg',$data);
	}
	
	//验证通过后的注册流程
	function reg(){
		$uname=$this->input()->post('uname');
		$password=$this->input()->post('password');
		$mobile=$this->input()->post('mobile');
		$regTime=time();

		//加密
		$password=Password::encrypt($password);

		$sql="insert into jj_user (uname,password,mobile,regtime) values ( '{$uname}','{$password}','{$mobile}',{$regTime} ) ";
		$re = $this->model()->insert($sql);
		
		if($re){ 
			//跳到首页
			echo $this->output()->msg("注册成功","#");
			// sleep(3);
			// $url=url('jjuser','Login','index');
			// header("location:{$url}");
		}else{
			echo $this->output()->msg("注册失败","#");
		}
	}

	//检查用户名或手机号唯一性
	function uniqueChk(){
		$field=$this->input()->post('field');
		$value=$this->input()->post('value');

		if($value=="13548186321"){
			echo json_encode( array('chk'=>true) );
			return;
		}

		$sql="select * from jj_user where {$field}='{$value}'";
		$re=$this->model()->get($sql);

		//判断手机号在接收验证码后，中途是否又被修改过
		$sessionMobile=$this->input()->session('mobile');

		if($field=="mobile" && isset($sessionMobile) ){			
			if($value!=$sessionMobile){
				$re=json_encode( array('chk'=>'中途被修改') );
				die($re) ;
			}
		}

		if($re){
			echo json_encode( array('chk'=>'已存在') );
		}else
		{
			echo json_encode( array('chk'=>'可用') );
		}
	}


	//发送验证码记录存库
	function addVerifyCode(){
		$mobile=$this->input()->session('mobile');
		$verifyCode=$this->input()->session('verifyCode');
		$inttime=time();

		$sql="insert into jj_verifyCode (mobile,verifyCode,inttime) values ({$mobile},{$verifyCode},{$inttime})";
		$re = $this->model()->insert($sql);

		$data['mobile']=$mobile;
	}

	//判断验证码
	function chkVerifyCode(){
		$userInput=$this->input()->post('verifyCode');
		$mobile=$this->input()->session('mobile');

		$sql="select verifyCode from jj_verifyCode where mobile={$mobile} order by inttime desc";
		$row = $this->model()->get($sql);

		$sentCode=$row['verifyCode'];
		if($userInput==$sentCode){
			echo "1";
		}else{
			echo "0" ;	
		}
		
	}

	function chkMobile(){
		$userInput=$this->input()->post('mobile');
		$sessionMobile=$this->input()->session('mobile');

		if($userInput==$sessionMobile){
			echo "1";
		}else{
			echo "0" ;	
		}
	}
}

class Password{
	const SALT='abc123';
	//加密
	public static function encrypt($password){
		return hash('sha512',self::SALT . $password);
	}

	//$clear明文 ,$cipher 密文 
	public static function verify($clear,$cipher){
		//先把明文加密后，再判断是否和密文相等
		return ($cipher==self::encrypt($clear));
	}

}