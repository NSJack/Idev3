<?php
/* 
 * 用户登录验证
 * /user/login
 * vick-wang
 */

namespace module\user;
session_start();

class Login extends \core\Controller
{
    //登录页面
    function index()
    {
        $data = array();
        $this-> fw("/user/login",$data);
    }
    
    //用户登录的Ajax验证
    function checkLogin()
    {
        //获取表单post过来的数据
        $username = $this->input()->post("username");
        $password = $this->input()->post("password");
        
        //获取这个登录用户的的数据库信息
        $sqlhash = "SELECT * FROM user WHERE name = '{$username}' or tel = '{$username}' LIMIT 1";
        $rowhash = $this->model()->get($sqlhash);
        
        $res = array();

        if(is_array($rowhash) == true)
        {
            //数据库中hash过的密码
            $passwordhash = $rowhash['password'];
            
            //验证表单提交的密码和数据库中的是否匹配
            if (password_verify($password,$passwordhash)) {
                $res['info'] = "验证成功";
                echo json_encode($res);
            } else {  
                $res['info'] = "密码错误";
                echo json_encode($res);
            }
        }else
        {
            $res['info'] = "用户名不存在";
            echo json_encode($res);
        }
        
        
    }
    
    
    //用户登录的的判断
    function save()
    {

        //获取表单post过来的数据
        $username    = $this->input()->post('name');
        $password    = $this->input()->post('password');
      
        //获取这个用户的的数据库信息
        $sqlhash = "SELECT * FROM user WHERE name = '{$username}' or tel = '{$username}'";
        $rowhash = $this->model()->get($sqlhash);
        
        if(is_array($rowhash) == false)
        {
            //输入的用户名或电话号码不存在，跳转到登录界面
            $this->output()->redirect('/?m=user&c=Login&f=index');
        }else{
            
            //数据库中hash过的密码 
            $passwordhash = $rowhash['password'];
            
            //校验密码是否正确
            if (password_verify($password,$passwordhash)) { 
                //登录成功，写入session
                $_SESSION['id'] = $rowhash['id'];
                $_SESSION['username'] = $username;

                //更新登录时间
                $updatetime = time();
                $session_id = $rowhash['id'];
                $sql = "UPDATE user SET `updatetime` = '{$updatetime}' WHERE id = '{$session_id}' LIMIT 1";
                $this->model()->update($sql);

//$obj = new  \core\lib\Sms;
//$obj->SendSms("23774817","ded34c95b310d8eae33e91a806aebf45","王世伟","SMS_63260253",$user,$roundcode,$tel);

                //跳转到用户中心
                $this->output()->redirect('/?m=user&c=User&f=index');
                
            } else {  
                //登录失败
                $this->output()->redirect('/?m=user&c=Login&f=index');
            }
        }
       
    }   

    //登出功能
    function loginOut()
    {
        $_SESSION['id']     = 0;
        $_SESSION['name']   = 0;
        //跳转到用户中心
        $this->output()->redirect('/?m=user');
    }

}
