<?php  
     
      
    function send_check_code($code, $mob){  
          
        include "alidayu\TopSdk.php";  
        date_default_timezone_set('Asia/Shanghai');   
        $c = new TopClient;  
        $appkey = "-------";  //这里是我的应用key  
        $secret = "----------------------------"; //这里是我的密匙 在第五步应用创建好之后可以看到  
        $c->appkey = $appkey;  
        $c->secretKey = $secret;     
        $req = new AlibabaAliqinFcSmsNumSendRequest;  
        /*       
             公共回传参数，在“消息返回”中会透传回该参数； 
             举例：用户可以传入自己下级的会员ID，在消息返回时， 
        */  
        $req->setExtend("123456");      
        /* 
            短信类型，传入值请填写normal  
        */     
        $req->setSmsType("normal");    
        /*  
           短信签名，传入的短信签名必须是在阿里大于“管理中心-短信签名管理”中的可用签名。  
        */    
        $req->setSmsFreeSignName("民院论坛");   //这里根据自己的做调整， 不调整会报错  
        /*     
           短信模板变量，传参规则{"key":"value"}， 
        */  
        $req->setSmsParam("{\"code\":\"$code\",\"product\":\"民院论坛\"}"); //一样， 可以调整。 这里不调整不会报错  
           
        /* 
            短信接收号码。支持单个或多个手机号码，传入号码为11位手机号码， 
        */  
          
        $req->setRecNum("$mob");       
        $req->setSmsTemplateCode("SMS_25260302");    
        $resp = $c->execute($req);  
        //echo "<pre />"  ;  
        //var_dump($resp);  
        if($resp->result->success)  
        {  
            echo json_encode(array('msgid'=>"1",'html'=>"发送成功"));  
              
        }  
        else  
        {  
            echo json_encode(array('msgid'=>"2",'html'=>"发送失败"));  
              
        }  
          
    }  
      
    $mobb = $_GET['a'];  
    $coding = rand(100000, 1000000);  
    send_check_code("$coding", "$mobb");  
?>  
