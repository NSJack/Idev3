<script>

$(document).ready(function(){

	var flag1 = 0;
	var flag2 = 0;
	var flag3 = 0;
	var flag4 = 0;
	var flag5 = 0;
	var flag6 = 0;

	var re = /^[a-zA-Z][0-9a-zA-Z]{5,19}/;
	$('#username').on('blur',function(){
		if(re.test($('#username').val())){
			var username = $("#username").val();
			$.post("/?m=rocinante&c=user&f=is_user_exist_ajax","username="+username,function(data){
				var obj=JSON.parse(data);
               	if(obj == "yes"){
               		$('#u_notice1').text('用户名匹配成功');
               	}else{
               		$('#u_notice1').text('用户名匹配失败');
               	}
            });
		}
		else{
			$('#u_notice1').text('用户名必须是以字母开头，之后为数字或字母。长度在6-20位之间');
		}
	});

	var re2 = /^[0-9a-zA-Z]{6,20}/;
	$('#password').on('blur',function(){
		if(re2.test($('#password').val())){
			$('#u_notice2').text('密码符合规范');
			flag2 = 1;
		}else{
			$('#u_notice2').text('密码必须是数字或字母。长度在6-20位之间');
		}
	});

	$('#password1').on('blur',function(){
		if($('#password').val() == $('#password1').val()){
			$('#u_notice3').text('两次密码输入一致');
			flag3 = 1;
		}else{
			$('#u_notice3').text('两次密码输入不一致');
		}
	});

	// var re4 = /^1[0-9]{10}/;
	// $('#mobile').on('blur',function(){
	// 	if(re4.test($('#mobile').val())) 
	// 		$('#u_notice4').text('手机号符合规范');
	// 	else
	// 		$('#u_notice4').text('手机号必须是以1开头的11位数字');
	// });

	// re5 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
	// $('#email').on('blur',function(){
	// 	if(re5.test($('#email').val())) 
	// 		$('#u_notice5').text('邮件地址符合规范');
	// 	else
	// 		$('#u_notice5').text('邮件地址不符合规范');
	// });

	// $('#sms').on('click',function(){
	// 	var mobile = $("#mobile").val();
	// 	$.post("/?m=rocinante&c=user&f=sms_verify",{"mobile":mobile},function(data){
	// 		var obj=JSON.parse(data);
 //           	if(obj = 'success'){
	//            	$('#sms').removeClass('btn-info');
 //           		$('#sms').addClass('btn-success');      		
 //           	}else{
 //           		$('#u_notice4').text('手机验证码发送失败');
 //           	}
 //        });

	// });

	$('#useradd').on('submit',function(e){
		if(flag2 == 1 && flag3 == 1){
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

	              	<form action="/?m=rocinante&c=user&f=user_amend" method="post" id="useradd">

						  <div class="form-group">
						    <label for="exampleInputPassword1">用户名</label><?php echo str_repeat('&nbsp', 10) ?><span id="u_notice1"></span>
						    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly placeholder="请输入用户名">
						    <input type="hidden" class="form-control" id="uid" name="uid" value="<?php echo $uid; ?>" readonly placeholder="请输入uid">
						  </div>

  						  <div class="form-group">
						    <label for="exampleInputPassword1">重设密码</label><?php echo str_repeat('&nbsp', 10) ?><span id="u_notice2"></span>
						    <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
						  </div>

						  <div class="form-group">
						    <label for="exampleInputPassword1">再次输入密码</label><?php echo str_repeat('&nbsp', 10) ?><span id="u_notice3"></span>
						    <input type="password" class="form-control" id="password1" name="password1" placeholder="请再次输入密码">
						  </div>

						  <div class="col-md-offset-4">
						  <button type="submit" class="btn btn-primary">修改密码</button><?php echo str_repeat('&nbsp', 20) ?>
						  <a class="btn btn-info" href="?m=rocinante&c=user&f=user_login">放弃修改</a>
						  </div>
					</form>
	                    
	              </div>
            </div>



		
		</div>
	</div>
</div>