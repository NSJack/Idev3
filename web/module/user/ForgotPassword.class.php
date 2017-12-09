<?php

/*
 * 忘记密码
 */

namespace module\user;


class ForgotPassword extends \core\Controller
{
    //忘记密码模版
    function index()
    {
        $data = array();
        $this->fw("/user/forgot_password",$data);
    }
    
    //提示修改成功的模板
    function two()
    {
        $data = array();
        $this->fw("/user/forgot_password_two",$data);
    }
}