<?php

namespace module\admin;

Class Admin extends \core\Controller{

    function __construct(){
        parent::__construct();
        
        //判断是否登陆
        $aid=$this->input()->session('aid');

        $c=$this->input()->get('c');//取得类名，如果是Login类，表示已经在登陆页面了，不必再跳转。
        if( !$aid && $c!='Login' ){
            $url=url('admin','Login','index');
            $this->jump('请先登陆','登陆页面',$url);       
        }     
    }

    //用于显示后台
    function afw( $tplFileName, $data = array(), $return = false ){
        $afw_data = array();

        //输出框架头部的代码
        $top_data = array();
        $afw_data['top']   = $this->view( '/admin/top', $top_data, true );

        //输出每个子模板特有的代码
        $afw_data['main']     = $this->view( $tplFileName, $data, true );


        $this->view( '/admin/afw', $afw_data, $return );    
     

    }  

    //显示信息和跳转
    function jump($info='',$pageName='',$url){
        $data=array();
        $data['info']=$info;
        $data['pageName']=$pageName;
        $data['url']=$url;
        $this->view('/admin/infojump',$data,false ); 
        die();
    }

 


}