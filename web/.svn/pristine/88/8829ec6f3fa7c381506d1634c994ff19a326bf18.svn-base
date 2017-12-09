<?php
session_start();
//短信验证
/*
include ('dayu/TopSdk.php');
 function Sms($aliAppkey,$aliSecretKey,$aliUtograph,$aliSmsTemplate,$aliUser,$aliCode,$aliTel)
    {
        //阿里大于相关
        $c = new TopClient;
        $c ->appkey = $aliAppkey ;                              //appkey   23774817
        $c ->secretKey = $aliSecretKey ;   //secretKey    ded34c95b310d8eae33e91a806aebf45
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req ->setExtend( "" );
        $req ->setSmsType( "normal" );
        $req ->setSmsFreeSignName( $aliUtograph );                  //审核通过的短信签名  王世伟
        $req ->setSmsParam( "{name:'$aliUser',code:'$aliCode'}" );
        $req ->setRecNum( "$aliTel" );
        $req ->setSmsTemplateCode( $aliSmsTemplate ); //短信模板  SMS_63260253
        $resp = $c ->execute( $req );
    }



*/
include ('dayu/TopSdk.php');

class Sms{    
    function SendSms($aliAppkey,$aliSecretKey,$aliUtograph,$aliSmsTemplate,$aliUser,$aliCode,$aliTel)
    {
        //include ( PATH . '/core/lib/dayu/TopSdk.php');
        $c = new TopClient;
        $c ->appkey = $aliAppkey ;                              //appkey   23774817
        $c ->secretKey = $aliSecretKey ;   //secretKey    ded34c95b310d8eae33e91a806aebf45
        $req = new AlibabaAliqinFcSmsNumSendRequest;
        $req ->setExtend( "" );
        $req ->setSmsType( "normal" );
        $req ->setSmsFreeSignName( $aliUtograph );                  //审核通过的短信签名  王世伟
        $req ->setSmsParam( "{name:'$aliUser',code:'$aliCode'}" );
        $req ->setRecNum( "$aliTel" );
        $req ->setSmsTemplateCode( $aliSmsTemplate ); //短信模板  SMS_63260253
        $resp = $c ->execute( $req );
        return $resp;

    }
}






$mysqli = new mysqli('dev.sodevel.com', 'dev3_sodevel', 'dev3_0509', 'dev3_sodevel');

//获取post方式传递过来的数据
$user = $_POST['name'];
$tel = $_POST['tel'];
$postcode = $_POST['code'];
$time = time();



if(!empty($tel))
{
    
    
    $lastTime = $time+30;  //有效时间


    //短信的验证码 随机4位数字
    $roundcode = rand(1000,9999);

    //取出保存电话验证码表的相关信息
    $res = $mysqli->query( "SELECT * FROM user_tel WHERE tel='{$tel}' ORDER BY id DESC LIMIT 1 ");
    $row = $res->fetch_array(MYSQLI_ASSOC);

    //判断状态 ['status'] == '0' 表示验证码没有使用过  并且在有效时间内
    if( ($row['status'] == '0') && $time < $row['lasttime'])
    {
        $roundcode = $row['code'];
        $lastTime = $row['lasttime'];
    }else
    {
        //重新生成新的验证码 
        $roundcode = rand(1000,9999);
    }

    
        //写入记录验证码的数据库
        //$mysqli = new mysqli('dev.sodevel.com', 'dev3_sodevel', 'dev3_0509', 'dev3_sodevel');
        $sql = "INSERT INTO user_tel (`tel`,`code`,`intime`,`lasttime`)VALUES('{$tel}','{$roundcode}','{$time}','{$lastTime}')";
        $is = $mysqli->query($sql);

        if($is == true)
        {
            echo '1';
        }
        
  
}

      $obj = new Sms;
      $obj->SendSms("23774817","ded34c95b310d8eae33e91a806aebf45","王世伟","SMS_63260253",$user,$roundcode,$tel);

    

