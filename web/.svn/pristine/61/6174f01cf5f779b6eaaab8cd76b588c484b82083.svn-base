<?php

 session_start();
 $vertiCode = rand(1000, 9999);

 $_SESSION['vertiCode'] = $vertiCode;//给session中的vertiCodeS变量赋值


//引入阿里大于SDK
include "alidayu/TopSdk.php";
$phone = $_POST['phone'];
$_SESSION['phone'] = $phone;

$c = new TopClient;
$c ->appkey = "23784331" ;
$c ->secretKey = "bf5da220efd2197b6cfe4a139d32d7c0" ;
$req = new AlibabaAliqinFcSmsNumSendRequest;
$req ->setExtend( "" );
$req ->setSmsType( "normal" );
$req ->setSmsFreeSignName( "谭燕培" );
$req ->setSmsParam( "{vertiCode:'$vertiCode'}" );
$req ->setRecNum( "$phone" );
$req ->setSmsTemplateCode( "SMS_66010289" );
$resp = $c ->execute( $req );