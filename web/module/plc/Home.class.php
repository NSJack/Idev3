<?php
namespace module\plc;
class Home extends \core\Controller{
    function index(){
        $data = array();
        return $this->fw( '/plc/index',$data );
    }

	function test(){
		echo '学习';
	}
}