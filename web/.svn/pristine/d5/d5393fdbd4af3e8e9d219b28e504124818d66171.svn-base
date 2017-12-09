<?php

/**
* 登录类
*/

namespace module\tuser;


//创建一个登录类
 class Login extends \core\Controller
 {
	function login(){

		$data = array();

		$this->fw('/tuser/login',$data);
	}
	//验证用户名是否存在的方法
	function checklogin(){

		//定义用户名、密码变量 接收POST数据；
		$username = $_POST['username'];
		$password = md5($_POST['password']);


		$sql = "SELECT * FROM tuser WHERE username = '{$username}' and password = '{$password}'";

		$row = $this->model()->get($sql);

		//输出1时 用户名密码正确，可登录
		//输出2时，用户名密码不正确
		if ($row) {
			echo "1";
		}else{
			echo "2";
		}
	}

}