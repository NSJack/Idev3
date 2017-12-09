<?php

namespace module\admin5;

class home extends base{

    function __construct(){
        parent::__construct();
    }

	public function index(){
		$data = array();
		$this->view("/admin5/home/home",$data);
	}

	public function top(){
        // session_start();
		$data = array();
		$data['username'] = $this->input()->session('username');
		$data['level_name'] = $this->input()->session('level_name');
		$this->view("/admin5/home/top",$data);
	}

	public function sidebar(){
		$data = array();
		$data['select'] = $this->input()->get('select');
		$this->view("/admin5/home/sidebar",$data);
	}

	public function main(){
		$data = array();
		$this->view("/admin5/home/main",$data);
	}
	
}