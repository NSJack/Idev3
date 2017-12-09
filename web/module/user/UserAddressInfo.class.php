<?php

/* 用户保存地址
 * user/User
 * vick-wang
 */

namespace module\user;


class UserAddressInfo extends \core\Controller
{
    function index()
    {
        $data = array();
        $id = $this->input()->session("id");

        //查询语句 用户信息表 user_info
        $row = $this->model()->get("SELECT * FROM user_info WHERE user_id = '{$id}'");
        $data['row'] = $row;

        //查询语句 用户信息表 user_info
        $address_row = $this->model()->gets("SELECT * FROM user_address WHERE user_id = '{$id}'");
        $data['address_row'] = $address_row;

        
        $this->fw("/user/user_address_info",$data);
    }

   
}