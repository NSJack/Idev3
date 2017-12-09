<?php  
session_start();
    $username = $_POST['username'];
    $code=rand(1000,9999);
    $phone=$_POST['phone'];
    $intime = time();
/*
    $mysqli = new mysqli('dev.sodevel.com', 'dev3_sodevel', 'dev3_0509', 'dev3_sodevel');
    $sql = "INSERT INTO sc_ll(`phone`,`code`,`intime`) values('{$phone}','{$code}','{$intime}')"
    mysql_query($sql);
*/
    include "alidayu/TopSdk.php";
    $c = new TopClient;  
    $appkey = "23804144";  //这里是我的应用key  
    $secret = "30bd839451be002c36ad4c7172bc2ca9"; //这里是我的密匙 在第五步应用创建好之后可以看到  
    $c->appkey = $appkey;  
    $c->secretKey = $secret;     
    $req = new AlibabaAliqinFcSmsNumSendRequest;  
    /*       
         公共回传参数，在“消息返回”中会透传回该参数； 
         举例：用户可以传入自己下级的会员ID，在消息返回时， 
    */  
    $req->setExtend("");      
    /* 
        短信类型，传入值请填写normal  
    */     
    $req->setSmsType("normal");    
    /*  
       短信签名，传入的短信签名必须是在阿里大于“管理中心-短信签名管理”中的可用签名。  
    */    
    $req->setSmsFreeSignName("刘先生");   //这里根据自己的做调整， 不调整会报错  
    /*     
       短信模板变量，传参规则{"key":"value"}， 
    */  
    $req->setSmsParam("{\"username\":\"$username\",\"code\":\"$code\"}"); //一样， 可以调整。 这里不调整不会报错  
       
    /* 
        短信接收号码。支持单个或多个手机号码，传入号码为11位手机号码， 
    */    
    $req->setRecNum("$phone");       
    $req->setSmsTemplateCode("SMS_67226403");    
    $resp = $c->execute($req);   

    $_SESSION['phone'] = $phone;
    $_SESSION['code']  = $code;

    echo json_encode($code);


?>  
