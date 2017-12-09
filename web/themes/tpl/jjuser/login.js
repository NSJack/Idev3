$(function() {
	//点击注册
	$("#regBtn").click(function(){
		location.assign("/?m=jjuser&c=Reg&f=showReg");
	})

	//点击登陆
	$("form").submit(function () {
		
		var account=$("#account").val();
		var password=$("#password").val();
		//先进行基础的验证，看输入是否在6位以上。
		var basicChk=true;

		if(account.length<6){
			basicChk=false;
			info('account','red',"账号必须是6位以上",true)
		}else{
			info('account','green',"",false)
		}
		
		if(password.length<6){
			basicChk=false;
			info('password','red',"密码必须是6位以上",true)
		}else{
			info('password','green',"",false)
		}

		if(!basicChk){
			return false;
		}
		var _this=this;
		$.ajax({
			url:"/?m=jjuser&c=Login&f=chkLogin",//提交到哪个url网址
			type:"POST",
			data:{'account':account,'password':password},//发送给服务器的数据
			success:function (d) {

				var obj=JSON.parse(d);
				if(obj.err=="用户名不存在"){	
					info('account','red',obj.err,true);
				}else if(obj.err=="密码错误"){		
					info('password','red',obj.err,true);
				}else{
					console.log("通过验证");
					_this.submit();//事实上后执行，但实现了提交的功能。
				}
						
			},//success结束

		})	//ajax结束			
		console.log("没有提交");
		return false;//事实上会先执行
			
	})

})
	