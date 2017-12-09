<?php
namespace module\gbook;
/**
 * 用户信息提取方法测试--溜溜20161224
 * 采用$this->user 可以提取登录用户在rusers的所有信息：
 * 列举：
  ["rid"]=>用户id
  ["username"]=>用户账号
  ["phone"]=>手机号码
  ["email"]=>验证邮箱
  ["nickname"]=>用户昵称
  ["sex"]=>用户性别
  ["birthday"]=>生日
  ["default_img"]=>头像保存路径
  测试网址：http://ldev.sodevel.com/?m=gbook&c=TestUserinfo&f=test
 */

class TestUserinfo extends\module\users\UserCenter//继承sunset做的中间类，先登录后显示
{

    //在方法中调用用户信息的写法
    public function test()
    {
        //$result = $this->user['nickname'];
        $result = $this->user;
        dump($result);//直接使用sunset做的dump工具可以友好的输出数组信息
    }
}
