<?php

namespace module\admin5;

class permission extends base{

	function __construct(){
		parent::__construct();
		// $check = $this->getPermission(__CLASS__);
		// if(!$check){
		// 	echo "<script type='text/javascript'>alert('该用户没有处理该模块的权限');</script>";
		// 	exit();
		// }
	}

	function permission_list(){
		$data = array();
		$sql = "SELECT * FROM `qzw_permission`";
		$result = $this->model()->gets($sql);
		if($result){
			$data['title'] = "权限列表";
			$data['show'] = true;
			$data['permission_list'] = $result;
			$this->view("/admin5/permission", $data);
		}else{
			echo "未有权限列表记录";
		}
	}

	function permission_add(){
		$data = array();
		$data['title'] = "新增管理权限";
		$data['add'] = true;
		$this->view("/admin5/permission", $data);
	}

	function permission_insert(){
		if(isset($_POST['send'])){
			$name = $this->input()->post('permission_name');
			$info = $this->input()->post('permission_info');
			$class = $this->input()->post('permission_class');
			// if(\Validate::checkUser($username)) die('用户名必须是以字母开头，之后为数字或字母。长度在6-20位之间');
			// if(\Validate::checkPass($password)) die('密码必须是数字或字母。长度在6-20位之间');
			$className = __NAMESPACE__.'\\'.$class;
			$methods = get_class_methods($className);
			$founded = array_search('getPermission',$methods);
			$method = array_slice($methods,1,$founded-1);
			$method = implode(',',$method);
			$sql = "SELECT * FROM `qzw_permission` WHERE `name` = '$name'";
			$result = $this->model()->get($sql);
			if($result){
				$message = "$name 已经被占用";
				$pageName = '权限添加页';
				$url = url('admin5','permission','permission_add');
			}else{
				$sql = "INSERT INTO `qzw_permission` (`name`,`info`,`class`,`method`) VALUES('$name','$info','$class','$method')";
				$pid = $this->model()->insert($sql);
				if($pid){
					$message = "$name 添加成功";
					$pageName = '权限列表页';
					$url = url('admin5','permission','permission_list');
				}else{
					$message = "$name 添加失败";
					$pageName = '权限添加页';
					$url = url('admin5','permission','permission_add');
				}
			}
			$this->jump($message,$pageName,$url);
		}
	}

	function permission_update(){
		$pid = $this->input()->get('pid');
		$sql = "SELECT * FROM `qzw_permission` WHERE `pid` = '$pid'";
		$result = $this->model()->get($sql);
		if($result){
			$data = array();
			$data['title'] = "修改管理权限";
			$data['update'] = true;
			$data['pid'] = $pid;
			$data['name'] = $result['name'];
			$data['info'] = $result['info'];
			$data['class'] = $result['class'];
			$this->view("/admin5/permission", $data);
			return;
		}else{
			die("相关用户不存在");
		}		
	}

	function permission_revise(){
		if(isset($_POST['send'])){
			$pid = $this->input()->post('id');
			$name = $this->input()->post('permission_name');
			$info = $this->input()->post('permission_info');
			$class = $this->input()->post('permission_class');
			$className = __NAMESPACE__.'\\'.$class;
			$methods = get_class_methods($className);
			$founded = array_search('getPermission',$methods);
			$method = array_slice($methods,1,$founded-1);
			$method = implode(',',$method);
			$sql = "SELECT * FROM `qzw_permission` WHERE `name` = '$name' AND `pid` != '$pid'";
			$result = $this->model()->get($sql);
			if($result){
				$message = "要修改的权限名称已经存在";
				$pageName = '权限修改页';
				$url = url('admin5','permission','permission_update');
			}else{
				$sql = "UPDATE `qzw_permission` SET `name`='$name' , `info`='$info' , `class`='$class',`method`='$method' WHERE `pid` = '$pid'";
				$pid = $this->model()->update($sql);
				if($pid){
					$message = "权限修改成功";
					$pageName = '权限列表页';
					$url = url('admin5','permission','permission_list');
				}else{
					$message = "权限修改失败";
					$pageName = '权限修改页';
					$url = url('admin5','permission','permission_update');
				}
			}
			$this->jump($message,$pageName,$url);
		}
	}

	function permission_delete(){
		$pid = $this->input()->get('pid');
		$sql = "DELETE FROM `qzw_permission` WHERE `pid` = '$pid'";
		$result = $this->model()->delete($sql);
		if($result){
			$message = "删除权限成功";
		}else{
			$message = "删除权限失败";
		}
		$pageName = '权限列表页';
		$url = url('admin5','permission','permission_list');
		$this->jump($message,$pageName,$url);
	}

}