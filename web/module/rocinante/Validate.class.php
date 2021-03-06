<?php
	//验证类
	class Validate {
		
		//是否为空
		static public function checkNull($_data) {
			if (trim($_data) == '') return true;
			return false;
		}
		
		//数据是否为数字
		static public function checkNum($_data) {
			if (!is_numeric($_data)) return true;
			return false;
		}
		
		//长度是否合法
		// static public function checkLength($_data, $_length, $_flag) {
		// 	if ($_flag == 'min') {
		// 		if (mb_strlen(trim($_data),'utf-8') < $_length) return true;
		// 		return false;
		// 	} elseif ($_flag == 'max') {
		// 		if (mb_strlen(trim($_data),'utf-8') > $_length) return true;
		// 		return false;
		// 	} elseif ($_flag == 'equals') {
		// 		if (mb_strlen(trim($_data),'utf-8') != $_length) return true;
		// 		return false;
		// 	} else {
		// 		Tool::alertBack('EROOR：参数传递的错误，必须是min,max！');
		// 	}
		// }
		
		//数据是否一致
		static public function checkEquals($_data, $_otherdate) {
			if (trim($_data) != trim($_otherdate)) return true;
			return false;
		}
		
		//验证电子邮件
		static public function checkEmail($_data) {
			if (!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/',$_data)) return true;
			return false;
		}
		
		//session验证
		// static public function checkSession() {
		// 	if (!isset($_SESSION['admin'])) Tool::alertBack('警告：非法登录！');
		// }
		
		//权限
		// static public function checkPremission($_date,$_info) {
		// 	if (!in_array($_date,$_SESSION['admin']['premission'])) {
		// 		Tool::alertBack($_info);
		// 	}
		// }

		static public function checkUser($user){
			if(!preg_match('/^[a-zA-Z][0-9a-zA-Z]{5,19}/',$user)) return true;
			return false;
		}

		static public function checkPass($pass){
			if(!preg_match('/^[0-9a-zA-Z]{6,20}/',$pass)) return true;
			return false;
		}

		static public function checkMobile($mobile){
			if(!preg_match('/^1[0-9]{10}/',$mobile)) return true;
			return false;
		}

		static public function checkSms($sms_code){
			if(!preg_match('/^[0-9]{6}/',$sms_code)) return true;
			return false;
		}
		
	}
?>