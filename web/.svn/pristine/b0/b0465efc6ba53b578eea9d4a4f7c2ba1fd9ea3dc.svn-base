<?php
/**
 * 注册登录页面
 */
namespace module\liulin;

class Register extends \core\Controller{
    
    function index(){
        
    }
    //用户注册页面
    function register_erl(){
        $data = array();
        $this->fw('/liulin/register_erl', $data);
    }
    //注册验证流程
    function register_erlsave(){
        //获取用户名密码
        $username  = $this->input()->post('username');
        $password  = $this->input()->post('password');
        $password2 = $this->input()->post('password2');  
        $phone     = $this->input()->post('phone'); 
        $code      = $this->input()->post('code');    
        //非空判断
        if(empty($username) || empty($password)){
            die('用户名或密码不能为空');
        }
        if ( $password != $password2 ) {
            die('两次密码输入不一致'); 
        }
        //如果数据库有相匹配的用户名，则用户名已存在             
        $sql = "SELECT * FROM login_ll where username = '{$username}' limit 1";
        $row = $this->model()->get($sql);
        if( is_array($row) == true ){  
            die("用户名已存在");
        }

        $sql = "SELECT * FROM sc_ll WHERE phone='{$phone}' and code='{$code}' limit 1";
        $req = $this->model()->get($sql);
        if($req){
            $intime   = time();
            $password = password_hash($password, PASSWORD_DEFAULT);
            //插入数据到数据库，并跳转到登录页
            $sql = "INSERT INTO login_ll( `username`,`password`,`intime`,`phone` ) values( '{$username}','{$password}','{$intime}','{$phone}' )";
            $uid = $this->model()->insert($sql);
            if( $uid > 0 ){
                echo "注册成功";
                //exit();
                header("location:/?m=liulin&c=login&f=register");
            } else {
                echo "请联系管理员";
            }
        }else{
            die("手机号验证未通过");
        }

        
    }
    //AJAX验证用户名的唯一性
    function register_username(){
        $username  = $this->input()->post('username');
        $sql = "SELECT * FROM login_ll where username = '{$username}' limit 1";
        $row = $this->model()->get($sql);
        if( is_array($row) == true ){
            $row['status'] = 0;
        }else{
            //echo json_encode($row);
            $row['status'] = 1;
        }
        echo json_encode($row);
    }
    //验证码存库
    function code(){
        $phone = $this->input()->session('phone');
        $code  = $this->input()->session('code');
        $time  = time();

        $sql = "INSERT INTO sc_ll(`phone`,`code`,`intime`) values('{$phone}','{$code}','{$intime}')";
        $row = $this->model()->INSERT($sql);

        $data['phone'] = $phone;
    }

}