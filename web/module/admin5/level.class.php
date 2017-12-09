<?php

namespace module\admin5;

include 'Validate.class.php';

class level extends base{

	function __construct(){
		parent::__construct();
		// $check = $this->getPermission(__CLASS__);
		// if(!$check){
		// 	echo "<script type='text/javascript'>alert('该用户没有处理该模块的权限');</script>";
		// 	exit();
		// }
	}

	function level_list(){
		$data = array();
		$sql = "SELECT * FROM `qzw_level`";
		$result = $this->model()->gets($sql);
		if($result){
			$data['title'] = "管理员等级列表";
			$data['show'] = true;
			$data['level_list'] = $result;
			$this->view("/admin5/level", $data);
		}else{
			echo "未有管理员等级记录";
		}
	}

	function level_add(){
		$data = array();
		$data['title'] = "新增管理员等级";
		$data['add'] = true;
		$sql = "SELECT * FROM `qzw_permission`";
		$result = $this->model()->gets($sql);
		foreach($result as $key=>&$value){
			$methods = explode(",",$value['method']);
			foreach($methods as $value1){
				$value['methods'][]=$value1;
			}
		}
		$data['permission'] = $result;
		$this->view("/admin5/level", $data);
	}

	function level_insert(){

			// var_dump($_POST);
			// die();

		if(isset($_POST['send'])){
			$level_name = $this->input()->post('level_name');
			$level_info = $this->input()->post('level_info');
			$permission = $_POST['permission'];
			$permission = serialize($permission);
			// $permission = implode(',',$permission);
			$sql = "SELECT * FROM `qzw_level` WHERE `level_name` = '$level_name'";
			$result = $this->model()->get($sql);
			if($result){
				$message = "$level_name 已经被占用";
				$pageName = '等级添加页';
				$url = url('admin5','level','level_add');
			}else{
				$sql = "INSERT INTO `qzw_level` (`level_name`,`level_info`,`permission`) VALUES('$level_name','$level_info','$permission')";
				$lid = $this->model()->insert($sql);
				if($lid){
					$message = "$level_name 添加成功";
					$pageName = '等级列表页';
					$url = url('admin5','level','level_list');
				}else{
					$message = "$level_name 添加失败";
					$pageName = '等级添加页';
					$url = url('admin5','level','level_add');
				}
			}
			$this->jump($message,$pageName,$url);
		}
	}

	function level_update(){
		$lid = $this->input()->get('lid');
		$sql = "SELECT * FROM `qzw_level` WHERE `lid` = '$lid'";
		$result = $this->model()->get($sql);
		if($result){
			$data = array();
			$data['title'] = "修改管理员等级";
			$data['update'] = true;
			$data['lid'] = $lid;
			$data['level_name'] = $result['level_name'];
			$data['level_info'] = $result['level_info'];
			// $data['level_per'] = explode(',',$result['permission']);
			if($result['permission'] != ""){
				$data['level_per']=unserialize($result['permission']);
			}
			$sql = "SELECT * FROM `qzw_permission`";
			$result = $this->model()->gets($sql);
			foreach($result as $key=>&$value){
				$methods = explode(",",$value['method']);
				foreach($methods as $value1){
					$value['methods'][]=$value1;
				}
			}
			$data['permission'] = $result;
			$this->view("/admin5/level", $data);
			return;
		}else{
			$message = "相关用户不存在";
			$pageName = '等级列表页';
			$url = url('admin5','level','level_list');
			$this->jump($message,$pageName,$url);
		}		
	}

	function level_revise(){
		if(isset($_POST['send'])){
			$lid = $this->input()->post('id');
			$level_name = $this->input()->post('level_name');
			$level_info = $this->input()->post('level_info');
			$permission = $_POST['permission'];
			// $permission = implode(',',$permission);
			$permission = serialize($permission);
			$sql = "SELECT * FROM `qzw_level` WHERE `level_name` = '$level_name' AND `lid` != '$lid'";
			$result = $this->model()->get($sql);
			if($result){
				$message = "$level_name 已经被占用";
				$pageName = '等级更新页';
				$url = url('admin5','level','level_update');
			}else{
				$sql = "UPDATE `qzw_level` SET `level_name`='$level_name' , `level_info`='$level_info' , `permission`='$permission' WHERE `lid` = '$lid'";
				$lid = $this->model()->update($sql);
				if($lid){
					$message = "$level_name 修改成功";
					$pageName = '等级列表页';
					$url = url('admin5','level','level_list');
				}else{
					$message = "$level_name 修改失败";
					$pageName = '等级更新页';
					$url = url('admin5','level','level_update');
				}
			}
			$this->jump($message,$pageName,$url);
		}
	}

	function level_delete(){
		$lid = $this->input()->get('lid');
		$sql = "DELETE FROM `qzw_level` WHERE `lid` = '$lid'";
		$result = $this->model()->delete($sql);
		if($result){
			$message = "删除管理等级成功";
		}else{
			$message = "删除管理等级失败";
		}
		$pageName = '等级列表页';
		$url = url('admin5','level','level_list');
		$this->jump($message,$pageName,$url);
	}

	
}