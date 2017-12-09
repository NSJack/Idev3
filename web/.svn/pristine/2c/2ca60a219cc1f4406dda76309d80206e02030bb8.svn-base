<?php

/* 帐户信息
 * user/UserInfo
 * vick-wang
 */

namespace module\user;

class UserInfo extends \core\Controller
{
    function index()
    {
        $data = array();

        $id = $this->input()->session("id");
        

        //查询语句 用户信息表 user_info
        $row = $this->model()->get("SELECT * FROM user_info WHERE user_id = '{$id}'");
        $data['row'] = $row;
        $this->fw("/user/user_info",$data);
    }


    function save()
    {
        //表单提交的数据
        $name     = $this->input()->post("name");
        $tel      = $this->input()->post("tel");
        $sex      = $this->input()->post("sex");
        $hobby    = $this->input()->post("hobby");
        $message  = $this->input()->post("message");
        $id       = $this->input()->session("id");
        $t        = time();
        
        //用户名和手机号码 
        if( empty($name) || empty($tel) )
        {
            //数据为空提交失败
            $this->output()->redirect("?m=user&c=UserInfo");
        }

        $sql = "SELECT * from `user_info` WHERE `user_id`= '{$id}' LIMIT 1";
        $row = $this->model()->get($sql);
        
        $sql ="UPDATE `user_info` SET `sex`='{$sex}', `hobby`='{$hobby}', `message`='{$message}',  `updatetime`='{$t}' WHERE (`user_id`='{$id}') LIMIT 1";
        
        
        $is = $this->model()->update($sql);
        $user_sql = "UPDATE `user` SET `name`='{$name}' WHERE (`id`='{$id}') LIMIT 1";
        $user_is = $this->model()->update($user_sql);
        if( $is == true && $user_is == true)
        {
            $this->output()->redirect('/?m=user&c=UserInfo');
        }else
        {
            $this->output()->redirect('/?m=user&c=UserInfo');
        }
    }
    
}