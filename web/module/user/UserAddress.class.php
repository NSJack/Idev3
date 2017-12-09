<?php

/* 用户添加收货地址
 * user/User
 * vick-wang
 */

namespace module\user;


class UserAddress extends \core\Controller
{
    function index()
    {
        
        $data = array();
        $id = $this->input()->session("id");

        //查询语句 用户信息表 user_info
        $row = $this->model()->get("SELECT * FROM user_info WHERE user_id = '{$id}'");
        $data['row'] = $row;

        //省的信息
        $region_row = $this->model()->gets("SELECT * FROM user_region WHERE level = 1");
        $data['region_row'] = $region_row;
        
        $this->fw("/user/user_address",$data);

    }
    
    // AJAX市的信息
    function address()
    {
       
        $parent_id  = $this->input()->get('father_id');
        $sql = "SELECT * FROM `user_region` WHERE `parent_id` = '{$parent_id}' and level = '2'";
        $province_row = $this->model()->gets($sql);

        //json
        echo ( json_encode($province_row));

    }

    // AJAX区的信息
    function city()
    {

        $parent_id  = $this->input()->post('father_id');
        $sql = "SELECT * FROM `user_region` WHERE `parent_id` = '{$parent_id}' and level = '3'";
        $city_row = $this->model()->gets($sql);
        
        //json
        echo ( json_encode($city_row));
        
    }

    //用户添加收货地址
    function save()
    {

        //表单传来的数据
        $name       =  $this->input()->post("addres_name");
        $tel        =  $this->input()->post("addres_tel");
        $province   =  $this->input()->post("provinces");
        $city       =  $this->input()->post("citys");
        $district   =  $this->input()->post("countys");
        $message    =  $this->input()->post("add_message");
        $t          =  time();

        //省的名字
        $sql = "SELECT `name` FROM `user_region` WHERE `id` = '{$province}' LIMIT 1";
        $province_row   =  $this->model()->get($sql);
        $province_name  =  $province_row['name'];

        //市的名字
        $sql = "SELECT `name` FROM `user_region` WHERE `id` = '{$city}' LIMIT 1";
        $city_row   =  $this->model()->get($sql);
        $city_name  =  $city_row['name'];

        //区的名字
        $sql = "SELECT `name` FROM `user_region` WHERE `id` = '{$district}' LIMIT 1";
        $district_row   =  $this->model()->get($sql);
        $district_name  =  $district_row['name'];

        $id         =  $this->input()->session('id'); 

        //插入收货地址
        $sql = "INSERT INTO `user_address` (`user_id`, `name`, `province_name`, `city_name`, `district_name`, `tel`, `txt`, `updatetime`) VALUES ('{$id}', '{$name}', '{$province_name}', '{$city_name}', '{$district_name}', '{$tel}', '{$message}', '{$t}')";
        
        $row_id  =  $this->model()->insert($sql);

    }
    
}