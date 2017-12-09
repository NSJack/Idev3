<?php

namespace module\liulin;

class Home extends \core\Controller{
    function index(){
        $data = array();
        
        $sql            = "select * from gbook";
        $rows           = $this->model()->gets($sql);
        $data['rows']   = $rows;//通过data数组就可以在模板里面调用
        $this->view('/gbook/home_index', $data);
    }
    
    function save(){
        $content = $this->input()->post('content');
        $sql = "INSERT INTO gbook(content) values ('{$content}')";
        $gid = $this->model()->insert($sql);
        header("location:/?m=gbook");
    }
}