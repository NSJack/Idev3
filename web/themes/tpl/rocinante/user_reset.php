<script>

$(document).ready(function(){

	var flag1 = 0;
	var flag2 = 0;
	var flag3 = 0;
	var flag4 = 0;
	var flag5 = 0;
	var flag6 = 0;
	var setTime;
	var time = 10;

	var re = /^[a-zA-Z][0-9a-zA-Z]{5,19}/;
	$('#username').on('blur',function(){
		if(re.test($('#username').val())){
			var username = $("#username").val();
			$.post("/?m=rocinante&c=user&f=is_user_exist_ajax","username="+username,function(data){
				var obj=JSON.parse(data);
               	if(obj == "yes"){
               		$('#u_notice1').text('用户名匹配成功');
               		flag1 = 1;
               	}else{
               		$('#u_notice1').text('用户名匹配失败');
               	}
            });
		}
		else{
			$('#u_notice1').text('用户名必须是以字母开头，之后为数字或字母。长度在6-20位之间');
		}
	});

	var re4 = /^1[0-9]{10}/;
	$('#mobile').on('blur',function(){
		if(re4.test($('#mobile').val())) {
			$('#u_notice4').text('手机号符合规范');
			flag4 = 1;
		}else{
			$('#u_notice4').text('手机号必须是以1开头的11位数字');
		}
	});

	var re6 = /^[0-9]{6}/;
	$('#sms_code').on('blur',function(){
		if(re6.test($('#sms_code').val())){
			var mobile = $('#mobile').val();
			var sms_code = $("#sms_code").val();
			$.post("/?m=rocinante&c=user&f=is_sms_code_ajax",{"mobile":mobile,"sms_code":sms_code},function(data){
				var obj=JSON.parse(data);
               	if(obj == "yes"){
               		$('#u_notice6').text('验证码正确');
               		flag6 = 1;
               	}else{
               		$('#u_notice6').text('验证码不正确');               		
               	}
            });
		}else{
			$('#u_notice6').text('验证码必须是6位数字');
		}
	});

	$('#sms').on('click',function(){
		var mobile = $("#mobile").val();
		$.post("/?m=rocinante&c=user&f=sms_sent",{"mobile":mobile},function(data){
			var obj=JSON.parse(data);
           	if(obj.code == 0){
	           	$('#sms').removeClass('btn-info btn-primary');
           		$('#sms').addClass('btn-success'); 
           		$('#u_notice4').text(obj.err_msg);     		
           	}else{
           		$('#sms').removeClass('btn-info btn-success');
           		$('#sms').addClass('btn-primary'); 
           		$('#u_notice4').text(obj.err_msg);
           	}
        });
        setTime=setInterval(function(){
            if(time<=0){
            	$('#sms').text("重新发送验证码");
            	$('#sms').removeAttr("disabled");
              	time = 10;
                clearInterval(setTime);
                return;
            }else{
            	time--;
            	$('#sms').text("重新发送(" + time + ")");
            	$('#sms').attr("disabled", true);
            }
        },1000);
	});

	$('#useradd').on('submit',function(e){
		if(flag1 == 1 && flag4 == 1 && flag6 == 1){
			return true;
		}else{
			alert("请检查表单后重新提交！");
			e.preventDefault();
			return false;
		}
	});

});

</script>
<div class="container" style="margin-top: 60px">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-primary">
	              <div class="panel-heading">
	                    <h3 class="panel-title">忘记密码页</h3>
	              </div>
	              <div class="panel-body">

	              	<form action="/?m=rocinante&c=user&f=user_revise" method="post" id="useradd">

						  <div class="form-group">
						    <label for="exampleInputPassword1">用户名</label><?php echo str_repeat('&nbsp', 10) ?><span id="u_notice1"></span>
						    <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
						  </div>

						  <div class="form-group">
						    <label for="exampleInputPassword1">手机号</label><?php echo str_repeat('&nbsp', 10) ?><button type="button" class="btn btn-info btn-xs" id="sms">发送验证码</button><?php echo str_repeat('&nbsp', 10) ?><span id="u_notice4"></span>
						    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="请输入手机号">
						  </div>

  						  <div class="form-group">
						    <label for="exampleInputPassword1">手机验证码</label><?php echo str_repeat('&nbsp', 10) ?><span id="u_notice6"></span>
						    <input type="text" class="form-control" id="sms_code" name="sms_code" placeholder="请输入手机验证码">
						  </div>

						  <div class="col-md-offset-4">
						  <button type="submit" class="btn btn-primary">忘记密码</button><?php echo str_repeat('&nbsp', 20) ?>
						  <a class="btn btn-info" href="?m=rocinante&c=user&f=user_login">放弃修改</a>
						  </div>
					</form>
	                    
	              </div>
            </div>



		
		</div>
	</div>
</div>