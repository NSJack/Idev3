<?php
namespace module\gbook;

class Test extends \core\Controller{

	public $name = 1;

    private function a(){

}

    function index(){

        $this->input()->session("a",1);

        $data = array();
        $this->fw('/gbook/home_test',$data);
    }

    function aaa(){
        var_dump($this->input()->session("a"));
    }
}