<?php

namespace module\admin5;

class base extends \core\Controller{

    protected $mid;
    protected $username;

    function __construct(){
        parent::__construct();
        $this->mid = $this->input()->session('mid');
        $this->username = $this->input()->session('username');
        $this->checkPermission();
    }

    function getPermission($className){
        $sql = "SELECT l.permission FROM `qzw_manage` as m LEFT JOIN `qzw_level` as l ON m.level = l.lid WHERE m.`username` = '$this->username' AND m.`mid` = '$this->mid'";
        $permission = $this->model()->get($sql);
        if($permission){
            $permission = $permission['permission'];
        }else{
            return false;
        }
        $sql = "SELECT `class` FROM `qzw_permission` WHERE `pid` IN ($permission) AND `class` != ''";
        $result = $this->model()->gets($sql);
        $result1 = array();
        foreach($result as $key=>$value){
            $result1[]=$value["class"];
        }
        $calssname = explode("\\", $className);
        $calssname = $calssname[count($calssname)-1];
        if(in_array($calssname,$result1)){
            return true;
        }else{
            return false;
        }
    }

    function checkPermission(){
        $sql = "SELECT l.permission FROM `qzw_manage` as m LEFT JOIN `qzw_level` as l ON m.level = l.lid WHERE m.`username` = '$this->username' AND m.`mid` = '$this->mid'";
        $permission = $this->model()->get($sql);
        if($permission){
            $permission = $permission['permission'];
            $permission = unserialize($permission);
            $c = $this->input()->get('c');
            $f = $this->input()->get('f');
            if(array_key_exists($c,$permission) && in_array($f, $permission[$c])){

            }else{
                $message = '该用户没有处理该模块的权限';
                $pageName = '后台主页';
                $url = url('admin5','adminuser','index');
                $this->jump($message,$pageName,$url);
                exit();
            }
        }else{
            // $message = '用户登录成功';
            // $pageName = '后台主页';
            // $url = url('admin5','home','index');
            // $this->jump($message,$pageName,$url);
            // exit();
        }
    }

    function jump($info,$pageName,$url){
        $data = array();
        $data['info'] = $info;
        $data['page_name'] = $pageName;
        $data['url'] = $url;
        $this->view('/admin5/jump',$data);
        exit();
    }

}