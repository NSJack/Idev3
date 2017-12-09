<?php

namespace module\tuser;

class Register extends \core\Controller{

	function register(){

		$data = array();

		$this->fw('/tuser/register',$data);


	}
	//验证用户名唯一性

	function checkname(){

		// 获取传递过来的 username 
		$name = $_POST['username'];

		$sql = "SELECT * FROM tuser WHERE username = '{$name}'";
		
		$row = $this->model()->get($sql);

		
		if (!$row) {
			echo "1";
		}else{
			echo "2";
		}
	}

	//验证手机号唯一性
	function checkphone(){

		// 获取传递过来的 phone 
		$name = $_POST['phone'];

		$sql = "SELECT * FROM tuser WHERE phone = '{$name}'";
		
		$row = $this->model()->get($sql);

		
		if (!$row) {
			echo "1";
		}else{
			echo "2";
		}
	

	}
	//将验证码存入数据库
	function addyanzheng(){

		 $this->input()->session('vertiCode');
		 $this->input()->session('phone');

		 $yanzheng = $_SESSION['vertiCode'];
		 $phone    = $_SESSION['phone'];

		 $sql = "INSERT INTO tpyz (`phone`, `yanzheng`) VALUES ('$phone', '$yanzheng') ";
	     
	     $res = $this->model()->insert($sql);
	     


	}
	//检查验证码输入是否正确
	function checkyanzheng(){

		$this->addyanzheng();

		  $yanzheng = $_POST['yanzheng'];
		  $phone    = $_POST['phone'];


		 $sql = "SELECT * FROM tpyz WHERE phone = '{$phone}' and yanzheng = '{$yanzheng}'";

		 $row = $this->model()->get($sql);

		 if ($row) {
			echo "1";
		}else{
			echo "2";
		}



	}
	//注册流程

	function regist(){

		if ( isset($_POST['username'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$phone    = $_POST['phone'];
			$t        = time();

			$sql = "INSERT INTO tuser (`username`, `password`,`phone`,`intime`) VALUES ('$username', '$password','$phone','$t') ";

			$res = $this->model()->insert($sql);

			if ( $res != false ) {
				echo "<script>alert('注册成功！');window.location.href='/?m=tuser&c=Login&f=login';</script>";
                }else{
                	echo "<script>alert('注册失败！');window.history.back();</script>";
                }
			}
		}
		

	}
