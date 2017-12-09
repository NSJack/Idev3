<?php

class smsCode extends \core\Controller{

	private $mobile;
	private $sms_code;
	private $sent_time;
	private $sms_temp;
	private $resp;

	function __construct($mobile,$sms_temp=null){
		$this->mobile = $mobile;
		if($sms_temp === null){
			$this->sms_temp = "SMS_67191186";
		}else{
			$this->sms_temp = $sms_temp;
		}
		$this->smsCodeGeneration();
		$this->sendSms();
	}

	function smsCodeGeneration(){
		$sms_code = (string) rand(1,999999);
		if(strlen($sms_code) < 6){
			$sms_code = str_repeat("0",6-strlen($sms_code)).$sms_code;
		}
		$this->sms_code = $sms_code;
	}

	function sendSms(){
		spl_autoload_unregister('core\SoDevel::autoload');
		include(PATH . '/module/rocinante/alidayu/TopSdk.php');
		$c = new TopClient;
		$c->appkey = '23837518';
		$c->secretKey = '8802dcc1d89aec99588934fbeba0be85';
		$c->format = "json";
		$req = new AlibabaAliqinFcSmsNumSendRequest;
		$req->setExtend("123456");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName("邱智文PHP学习");
		$req->setSmsParam("{smsCode:'$this->sms_code'}");
		$req->setRecNum($this->mobile);
		$req->setSmsTemplateCode("$this->sms_temp");
		$resp = $c->execute($req);
		$this->resp = $resp;
		// var_dump($resp);
		// echo "<br />";
		// echo $resp->result->err_code;
		// echo "<br />";
		// echo $resp->result->success;
		// echo "<br />";
		spl_autoload_register('core\SoDevel::autoload');
	}

	function getSmsResp(){
		return $this->resp;
	}

	function getSmsCode(){
		return $this->sms_code;
	}

}