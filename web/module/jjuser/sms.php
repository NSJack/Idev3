<?php
	session_start();

	 //随机生成4位数，作为验证码待发送。1000以下的补0，成为4位。
	$verifyCode=rand(0,9999);
	$verifyCode="000" . $verifyCode;
	$verifyCode=substr($verifyCode,-4);

	$mobile=$_POST['mobile'];


//引入阿里大于SDK

	include "ailidayu/TopSdk.php";
	$c = new TopClient;
	$c ->appkey = "23814877" ;
	$c ->secretKey = "b68d12c6399bd5438d43a6787cd65ef6" ;
	$req = new AlibabaAliqinFcSmsNumSendRequest;
	$req ->setExtend( "" );
	$req ->setSmsType( "normal" );
	$req ->setSmsFreeSignName( "姜君学习php" );//必须和阿里中设置的一模一样
	$req ->setSmsParam( "{verifyCode:'$verifyCode'}" );
	$req ->setRecNum( "$mobile" );
	$req ->setSmsTemplateCode( "SMS_66660248" );
	$resp = $c ->execute( $req );

	$_SESSION['verifyCode'] = strval($verifyCode);
	$_SESSION['mobile'] = $mobile;

	echo json_encode( array('sentCode'=>$verifyCode) );



