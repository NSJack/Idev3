<?php

namespace module\admin;

Class Login extends admin{

    //显示登陆界面
    function index(){
        $data=array();
        $this->view('/admin/login',$data,false );
    }

    //登陆验证
    function check(){


        $auser=$this->input()->post('auser');
        $apass=$this->input()->post('apass');         

        $sql="select * from jj_admin where auser='{$auser}' ";
        $row = $this->model()->get($sql);

        //验证不通过就跳到登陆页
        $url=url('admin','Login','index');

        if(!$row){         
            $this->jump('用户名不存在','登陆页面',$url);
            return;
        }

        //校验密码
        $dbPass=$row['apass'];
        if( pwVerify($apass,$dbPass)){  //通过验证
            $this->input()->session('aid',$row['id']);
            $this->input()->session('auser',$row['auser']);

            //更新登陆总次数
            $sql="update jj_admin set loginCount=loginCount+1 where id={$row['id']}";
            $this->model()->query($sql);

            //更新最近登陆时间
            $logtime=time();
            $sql="update jj_admin set lastLoginTime={$logtime} where id={$row['id']}";
            $this->model()->query($sql);

            //更新最近登陆ip
            $ip=$this->model()->GetIp();
            $sql="update jj_admin set lastLoginIp='{$ip}' where id={$row['id']}";
            $this->model()->query($sql);

        //写入登陆日志
            $broswer=get_broswer();//获取浏览器信息
            $os=get_os();//获取操作系统信息

            $sql="insert into jj_adminLog (aid,ip,broswer,os,loginTime) values ({$row['id']},'{$ip}','{$broswer}','{$os}','{$logtime}')";
            $this->model()->query($sql);
         //写入登陆日志_完成

            //设置登陆后，默认显示哪个功能模块
            $url=url('admin','Auser','showList'); 
            setcookie('btnId','liAuser');//用于显示左侧菜单
            header("location:{$url}");
        }else{
            $this->jump('密码错误','登陆页面',$url);
        }

        return;

    }

    //退出登陆
    function logout(){
        $url=url('admin','Login','index');
       $this->input()->clearSession();
       setcookie('btnId','');
        $this->jump("已成功退出",'登陆页面',$url);
    }
}