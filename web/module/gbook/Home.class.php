<?php

namespace module\gbook;

class Home extends \core\Controller{

	function index(){

		$data = array();

		$sql = "select * from gbook";


		$rows = $this->model()->gets($sql);

		$data['rows'] = $rows;

		$this->view('/gbook/home_index',$data);


	} 
	function save(){
		$content = $this->input()->post('content');
		$sql = "insert into gbook (content) values ('{$content}')";
		$gid = $this->model()->insert($sql);
		header("location:/?m=gbook");
	}
}