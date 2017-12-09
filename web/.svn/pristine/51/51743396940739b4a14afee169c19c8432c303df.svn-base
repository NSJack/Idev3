<?php

namespace module\admin;

Class Auser extends admin{
    //显示添加管理员界面
	function showAdd(){
		$data=array();
		 $this->afw('/admin/auser/add',$data);
	}

    //显示管理员列表界面
	function showList(){
        $sql="select * from jj_admin";
        $data=$this->model()->gets($sql);

		$this->afw('/admin/auser/list',$data);
	}

    //显示登陆日志界面
    function showLog(){
        $sql="select l.id as id,auser,ip,loginTime,broswer,os from jj_admin u join jj_adminLog l on u.id=l.aid order by l.id desc";
        $data=$this->model()->gets($sql);
        $this->afw('/admin/auser/log',$data);        
    }

    //添加管理员
    function addAuser(){
        $url=url('admin','Auser','showAdd');

        $auser=$this->input()->post('auser');
        $apass=$this->input()->post('apass');         

        $sql="select * from jj_admin where auser='{$auser}' ";
        $row = $this->model()->get($sql);
         if($row){         
            $this->jump('用户名已存在','管理员添加',$url);
        } 

        $apass=encrypt($apass);
        $createTime=time();

        $sql="insert into jj_admin (auser,apass,createTime) values ('{$auser}','{$apass}',{$createTime})"; 

        $result = $this->model()->query($sql);

        if(!$result){//应该不会失败
            $this->jump('添加失败','管理员添加',$url);
             
        }else{
            $url=url('admin','Auser','showList');
            $this->jump('添加成功','管理员列表',$url);
            
        }           
    }

    //删除管理员
    function delAuser(){
        $id=$this->input()->get('id');
        $url=url('admin','Auser','showList');
        $nowId=$this->input()->session('aid');

        //防止用户直接在地址栏带参数调用
        if ($id==1) $this->jump('不能删除超管理员','管理员列表',$url);
        if ($id==$nowId) $this->jump('不能删除自己','管理员列表',$url);
        
        $sql="delete from jj_admin where id={$id}";
        $result = $this->model()->query($sql);
        if(!$result){//应该不会失败
            $this->jump('删除失败','管理员列表',$url);             
        }else{
            $this->jump('删除成功','管理员列表',$url);          
        }    
    }

    //修改管理员密码
    function editAuser(){
        $url=url('admin','Auser','showList');
        $id=$this->input()->post('editId');
        $oldPass=$this->input()->post('oldPass');

        $sql="select * from jj_admin where id={$id}";
        $row = $this->model()->get($sql);
        $dbPass=$row['apass'];

         if( !pwVerify($oldPass,$dbPass)){ 
            $this->jump('原密码错误','管理员列表',$url);   
         }

        $newPass=$this->input()->post('newPass');
        $newPass=encrypt($newPass);

        $sql="update jj_admin set apass='{$newPass}' where id={$id}";
        $result = $this->model()->query($sql);

        if(!$result){//应该不会失败
            $this->jump('修改密码失败','管理员列表',$url);             
        }else{
            $this->jump('修改密码成功','管理员列表',$url);          
        }  
    }	

}




	