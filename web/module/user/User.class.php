<?php

/* 用户中心
 * user/User
 * vick-wang
 */

namespace module\user;


class User extends \core\Controller
{
    function index()
    {
    	
        $data = array();
        $id = $this->input()->session("id");

        //查询语句 用户信息表 user_info
        $row = $this->model()->get("SELECT * FROM user_info WHERE user_id = '{$id}'");
        $data['row'] = $row;
        
        $this->fw("/user/user_order",$data);
        
    }

    
}