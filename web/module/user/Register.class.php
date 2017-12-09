<?php

/* 
 * 用户注册
 * /user/Register
 * vick-wang
 */

namespace module\user;


class Register extends \core\Controller
{
    //注册模版
    function index()
    {
        $date = array();
        $this->fw("/user/register",$date);
    }
    
    //表单提交来的 注册用户验证
    function add()
    {
        //获取表单提交的数据
        $username   = $this->input()->post('name');
        $tel        = $this->input()->post('tel');
        $password1  = $this->input()->post('password1');
        $code       = $this->input()->post('code');
        $password2  = $this->input()->post('password2');
        $intime     = time();
        $password   = 0;
        
        //检查提交的数据是否为空
        if(empty($username) || empty($tel) || empty($password1) || empty($password2) ||empty($code) )
        {
            //提交数据为空跳转到注册页面
            $this->output()->redirect('?m=user&c=Register');
        }
        
        //检查2次密码是否一致
        if($password1 !== $password2)
        {
            //2次密码不一致跳转到注册页面
            $this->output()->redirect('?m=user&c=Register');
        } else 
        {
            $options = [
                'cost' => 11, 
                    // 默认是10，用来指明算法递归的层数
                    // mcrypt_create_iv — 从随机源创建初始向量
                    // @param 初始向量大小
                    // @param 初始向量数据来源
                    // 可选值有： MCRYPT_RAND （系统随机数生成器）, MCRYPT_DEV_RANDOM （从 /dev/random 文件读取数据） 和 MCRYPT_DEV_URANDOM （从 /dev/urandom 文件读取数据）。 在 Windows 平台，PHP 5.3.0 之前的版本中，仅支持 MCRYPT_RAND。请注意，在 PHP 5.6.0 之前的版本中， 此参数的默认值为 MCRYPT_DEV_RANDOM。
                    // 生成一个长度为22的随机向量
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
            ];

            //密码加密
            $password = password_hash($password1,PASSWORD_DEFAULT,$options);
        }
        
        //查询用户名是否存在
        $sql = "SELECT * FROM user WHERE name = '{$username}' LIMIT 1";
        $row = $this->model()->get($sql);
        if(is_array($row) == true)
        {
            exit('用户名已经存在');
        }
        
        //插入注册用户信息
        $sql = "INSERT INTO user (`name`, `password`, `tel`, `intime`) VALUES ('{$username}','{$password}','{$tel}','{$intime}')";
        $insert_id = $this->model()->insert($sql);

        //插入用户信息数据表user_info default_thumb
        $sql = "INSERT INTO user_info (`user_id`, `name`, `tel`, `intime`,`file`,`thumbfile`) VALUES ('{$insert_id}','{$username}','{$tel}','{$intime}','/themes/img/default.jpg','/themes/img/default_thumb.jpg')";
        
        var_dump($sql);
        $insert_info_id = $this->model()->insert($sql);

        //用户注册成功 更新验证码状态 ‘1’ 代表已经使用过
        $sql = "UPDATE `user_tel` SET `status`='1' WHERE (`tel`='{$tel}') ORDER BY id DESC LIMIT 1";
        $this->model()->update($sql);
        
        //跳转到登录界面
        $this->output()->redirect(HOST . '/themes/tpl/user/jump.php');
    }
    
    
    
    //Ajax 对注册表单用户名的验证
    function checkName()
    {
        // 获取传递过来的 user 参数
        $name = $this->input()->get('user');
        $sql  = "SELECT * FROM user WHERE name = '{$name}'";
        $row  = $this->model()->get($sql);
        
        //判断用户名不可注册的名字
        if($name == 'admin' || $name == "administrator" || $name == "妈卖批" )
        {

            $res['info'] = "用户名含有非法字符";
            echo json_encode($res);

        }elseif(is_array($row))   //判断用户名是否存在
        {

            $res['info'] = "用户名已存在";
            echo json_encode($res);

        }elseif(empty($name))       //判断用户名是否为空
        {

            $res['info'] = "用户名不能为空";
            echo json_encode($res);

        }elseif(!preg_match('/^[a-zA-Z][a-zA-Z0-9]{3,15}$/', $name))   //正则判断用户名
        {

            $res['info'] = "用户名格式不正确";
            echo json_encode($res);

        }else
        {

            $res['info'] = "注册成功";
            echo json_encode($res);
        }
    }
    
    //Ajax 对注册表单电话的验证 
    function checkTel()
    {
        //电话 获取传递过来的 cktel 参数
        $cktel = $this->input()->get("cktel");
        
        //电话号是否已被注册
        $sql ="SELECT * FROM user WHERE tel = '{$cktel}' LIMIT 1";
        $is = $this->model()->get($sql);
        
        if(is_array($is))
        {

            $res['info'] = "电话号码已经被注册";
            echo json_encode($res);

        }elseif(empty($cktel))       
        {

            $res['info'] = "电话号不能为空";
            echo json_encode($res);

        }elseif(!preg_match('/^0?(13|14|15|17|18)[0-9]{9}$/', $cktel))
        {

            $res['info'] = "电话号码格式不正确";
            echo json_encode($res);

        } else 
        {

            $res['info'] = "成功";
            echo json_encode($res);

        }
    }
    
    //Ajax验证码
    function checkCode()
    {
        //get 过来的数据
        $name = $this->input()->get("name");
        $tel = $this->input()->get("tel");
        $code = $this->input()->get("code");
        
        //取数据库中的code
        $sql = "SELECT code FROM user_tel WHERE tel ='{$tel}' ORDER BY id DESC LIMIT 1";
     
        $row = $this->model()->get($sql);
        //var_dump($row['code']);var_dump($code);exit;
        if($code != $row['code'])
        {
            
            $res['info'] = "验证失败";
            echo json_encode($res);

        }elseif(empty($code)) {
            
            $res['info'] = "验证码不能为空";
            echo json_encode($res);

        }else{
            
            $res['info'] = "验证成功";
            echo json_encode($res);

        }
    }
    
}
