<?php

/*
 * 修改密码
 */

namespace module\user;

class userPassword extends \core\Controller
{
    
    function index()
    {
        $data = array();

        $id = $this->input()->session("id");

        //查询语句 用户信息表 user_info
        $row = $this->model()->get("SELECT * FROM user_info WHERE user_id = '{$id}'");
        $data['row'] = $row;
        $this->fw("/user/user_resetpassword",$data);
    }
    
    
    function textPasswod()
    {
        //用户的id
        $id = $this->input()->session('id');
        
        //获取POST过来的数据
        $newPassword    =  $this->input()->post('newPassword'); //新密码
        $reNewPassword  =  $this->input()->post('reNewPassword');//确认新密码
        
        
        //判断输入是否为空
        if(empty($newPassword) || empty($reNewPassword))
        {
            echo '输入不能为空';
        }
        
        //判断2次密码是否一致
        if($newPassword !== $reNewPassword)
        {
            //2次密码不一致
            echo '2次密码不一致';
        }
        
        //密码哈希加密
        $options = [
                'cost' => 11, // 默认是10，用来指明算法递归的层数
                    // mcrypt_create_iv — 从随机源创建初始向量
                    // @param 初始向量大小
                    // @param 初始向量数据来源
                    // 可选值有： MCRYPT_RAND （系统随机数生成器）, MCRYPT_DEV_RANDOM （从 /dev/random 文件读取数据） 和 MCRYPT_DEV_URANDOM （从 /dev/urandom 文件读取数据）。 在 Windows 平台，PHP 5.3.0 之前的版本中，仅支持 MCRYPT_RAND。请注意，在 PHP 5.6.0 之前的版本中， 此参数的默认值为 MCRYPT_DEV_RANDOM。
                    // 生成一个长度为22的随机向量
                'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
            ];
        $password = password_hash($newPassword,PASSWORD_DEFAULT,$options);
        
        //更新密码
        $sql = "UPDATE `user` SET `password`='{$password}' WHERE `id` = '{$id}' LIMIT 1";
        $this->model()->update($sql);
        
       
        
        
        //跳转到用户中心
        $this->output()->redirect('/?m=user&c=User');
        
    }
}
