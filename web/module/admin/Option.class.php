<?php

namespace module\admin;

Class Option extends admin{

	function index(){
		$data=array();
        $sql="select * from jj_setting";
        $data=$this->model()->gets($sql);


		$this->afw('/admin/option',$data);
	}
	
	function save(){
        //取post中的所有数据
		$settings=$this->input()->post(false,1);
        
        //批量更新到设置表
        foreach ($settings as $key => $value) {
            $sql="update jj_setting set `value`='{$value}' where `key`='{$key}' ";
            $this->model()->query($sql);
        }

        $url=url('admin','Option','index');
        $this->jump('系统设置修改成功','系统设置页面',$url);      

	}

}




	