$(function() {

		//0:正则不通过
		//1:正则通过，第二步不通过。
		//2：全部通过
		chkArr={"uname":"0","mobile":"0","verifyCode":"0","password":"0","confirm":"0"};
		var sentCode=0;//已发送的验证码
		var patt="";//正则表达式

		//失焦时校验用户名
		$("#uname").blur(function(){
			value=$("#uname").val();
			//用户名6到16位，必须以字母开头
			patt=/^[a-z][a-z0-9_]{5,17}$/;

			$.ajax({
				url:"/?m=jjuser&c=Reg&f=uniqueChk",//提交到哪个url网址
				type:"POST",//不加这个参数，默认是get
				data:{'field':'uname','value':value},//发送给服务器的数据

				//先进行正则校验
				beforeSend:function(){

					chkArr['uname']=patt.test(value)?"1":"0";
					if(chkArr['uname']==0){//如果用户名没通过正则验证
						info('uname','red',"用户名必须是6-18位的字母数字或下划线，且以字母开头。",true);
						return false;//不再去验证唯一
					}
				},				
				//成功后执行
				success:function (d) {
					var obj=JSON.parse(d);

					if(!obj.only){
						info('uname','red',"用户名已存在",true);
						chkArr['uname']=1;

					}else{
						info('uname','green',"用户名可以使用。",true);
						chkArr['uname']=2;
					}												

				},//success结束
			})	//ajax结		
		})//用户名失去焦点结束

		//失焦时校验手机号
		$("#mobile").blur(function(){

			value=$("#mobile").val();
			patt=/^1[34578]\d{9}$/;
			$.ajax({
				url:"/?m=jjuser&c=Reg&f=uniqueChk",//提交到哪个url网址
				type:"POST",//不加这个参数，默认是get
				data:{'field':'mobile','value':value},//发送给服务器的数据
				beforeSend:function(){

					chkArr['mobile']=patt.test(value)?"1":"0";
					if(chkArr['mobile']==0){
						info('mobile','red',"手机号格式不正确。",true);
						return false;//不再去验证唯一
					}					
				},				
				//成功后执行
				success:function (d) {
					var obj=JSON.parse(d);

					if(!obj.only){
						info('mobile','red',"手机号已存在",true);
						chkArr['mobile']=1;

					}else{
						info('mobile','green',"手机号可以使用。",true);
						chkArr['mobile']=2;
						$("#btnCode").removeAttr("disabled");//激活验证码按钮
					}												
				},//success结束
			})	//ajax结		
		})//手机号失去焦点结束		

		//失焦时校验验证码
		$("#verifyCode").blur(function(){
			value=$("#verifyCode").val();
			patt=/^[0-9]{4}$/;

			$.ajax({
				url:"/?m=jjuser&c=Reg&f=chkVerifyCode",//提交到哪个url网址
				type:"POST",
				data:{'verifyCode':value},//发送给服务器的数据

				beforeSend:function(){

					chkArr['verifyCode']=patt.test(value)?"1":"0";
					if(chkArr['verifyCode']==0){
						info('verifyCode','red',"验证码只能是4位纯数字",true);
						return false;
					}					
				},					

				success:function (d) {
					if(d=='1'){
						info('verifyCode','green',"验证码通过",true);
						chkArr['verifyCode']=2;

					}else{
						info('verifyCode','red',"验证码错误",true);
						chkArr['verifyCode']=1;
					}					
				},
			}); //$.ajax结束			
		})//验证码失去焦点结束	

		//点击获取验证码	
		$("#btnCode").click(function(){
			var time=59;
			$("#btnCode").attr("disabled","disabled");//点击后，马上失效

			var timer1= setInterval(//一段时间后，重新激活验证码按钮
				function(){
					time=time-1;
					$("#btnCode").val(time+"秒后可重新发送");
					if(time==0){
						clearInterval(timer1);
						$("#btnCode").removeAttr("disabled");//激活验证码按钮
						$("#btnCode").val("获取验证码");
					}
				}
				,400)//不知道为啥，设成1000会不准。			
			var mobile=$("#mobile").val();			
			$("#verifyCode").trigger("focus");
			//第一个ajax 用于发送验证码。
			$.ajax({
				url:"/themes/tpl/jjuser/sms.php",//提交到哪个url网址
				type:"POST",//不加这个参数，默认是get
				data:{'mobile':mobile},//发送给服务器的数据
				
				//成功后执行
				success:function (d) {
					var obj=JSON.parse(d);
					sentCode=obj.sentCode;
					alert("用于测试：发送的验证码是" + obj.sentCode);
				},

			}); //$.ajax结束	

			//第二个ajax 用于把发送验证码记录 存库		
			$.ajax({
				url:"/?m=jjuser&c=Reg&f=addVerifyCode",
			});					
		
		})//点击获取验证码结束

		//失焦时校验密码
		$("#password").blur(function(){
			value=$("#password").val();
			patt=/^[\w~!@#$%^&*()_+`\-={}:";'<>?,.\/]{6,16}$/;
			if(patt.test(value)){
				info('password','green',"可以使用该密码",true);
				chkArr['password']=2;
			}else{
				info('password','red',"密码必须是6到16位字母数字或特殊字符",true);
				chkArr['password']=0;
			}	
			
		})//失焦时校验密码 结束

		//密码确认框失焦
		$("#confirm").blur(function(){
			pw=$("#password").val()
			pw2=$("#confirm").val()

			if(chkArr['password']!=2){
				info('confirm','red','请先在上面输入要求的密码',true);
				chkArr['confirm']=0;
				return;
			}

			if(pw!=pw2 ){
				info('confirm','red','两次输入的密码不一致',true);
				chkArr['confirm']=0;
			}else{
				info('confirm','green','密码一致',true);
				chkArr['confirm']=2;				
			}	
			
		})//失焦时校验确认 结束		

		//得到焦点 就隐藏提示框
		$("#regForm input").focus(function(){
			id=$(this).attr('id');
			info(id,'red',"",false);
			if(id=='mobile'){//手机号输入框，得到焦点后，就让获去验证码按钮失效
				$("#btnCode").attr("disabled","disabled");
			}

			$("#test").html("当前的校验数组为："+JSON.stringify(chkArr));
		})//得到焦点事件结束

		//提交注册按钮
		$("form").submit(function () {
			$("#test").html("当前的校验数组为："+JSON.stringify(chkArr));
			mobile=$("#mobile").val();
			//除手机号外，触发所有输入框失焦校验事件
		//	$("#regForm input:not(#mobile)").trigger("blur");

			//手机号单独判断
			$.ajax({
				url:"/?m=jjuser&c=Reg&f=chkMobile",//提交到哪个url网址
				type:"POST",//不加这个参数，默认是get
				data:{'mobile':mobile},//发送给服务器的数据
				async:false,
				
				beforeSend:function(){
									
					if(chkArr['mobile']==0){
						info('mobile','red',"手机号格式不正确。",true);
						return false;
					};
				},	
				//成功后执行				
				success:function (d) {
					if(d=='0'){

						info('mobile','red',"该手机号不是接收验证码的手机号。",true);
						chkArr['mobile']=3;
						
					}
				},

			}); //$.ajax结束		
			if(chkArr['mobile']==3){
				return false;
			}
			chkOk=1;//校验总结果，默认成功
			//检查每个校验结果
			$.each(chkArr,function(key,val){
				if (val!=2) {
					chkOk=0;//只要有一个校验不通过，总结果就不通过
					info(key,'red',"请检查输入",true);
				}
			})

			if (chkOk==0) {
				return false;
			}			
		})//提交注册按钮 结束		



		//测试用
		$("#btntest").click(function () {
			
		})

	})
