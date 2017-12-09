


<div class="container" style="margin-top: 60px">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">用户注册</h3>
			</div>

			<div class="panel-body">

				<form action="/?m=wpk_user&c=Inuser&f=check" method="post" name="username">

					<div class="form-group">
						<label for="exampleInputPassword1">用户名</label><?php echo str_repeat('&nbsp', 10) ?>
						<span id="notice_point_1" ></span>
						<input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">密码</label><?php echo str_repeat('&nbsp', 10) ?>
						<span id="notice_point_2"></span>
						<input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">再次输入密码</label><?php echo str_repeat('&nbsp', 10) ?>
						<span id="notice_point_3"></span>
						<input type="password" class="form-control" id="repassword" name="repassword" placeholder="请再次输入密码">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">手机号</label><?php echo str_repeat('&nbsp', 10) ?>
						<button type="button" class="btn btn-info btn-xs" id="yzm">发送验证码</button><?php echo str_repeat('&nbsp', 10) ?>
						<span id="notice_point_4"></span>
						<input type="text" class="form-control" id="usermobile" name="usermobile" placeholder="请输入手机号">
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">手机验证码</label><?php echo str_repeat('&nbsp', 10) ?>
						<span id="notice_point_5"></span>
						<input type="text" class="form-control" id="yzm_code" name="yzm_code" placeholder="请输入手机验证码">
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">邮件地址</label><?php echo str_repeat('&nbsp', 10) ?>
						<span id="notice_point_6"></span>
						<input type="email" class="form-control" id="email" name="email" placeholder="请输入邮件地址">
					</div>

					<div class="col-md-offset-4">
						<button type="submit" id = "btn"class="btn btn-primary">注册</button><?php echo str_repeat('&nbsp', 20) ?>
						
					</div>

				</form>

			</div>
		</div>


		</div>
	</div>
</div>


<script>

$(document).ready(function(){
	var flag = 1;

	var re = /^[a-zA-Z]\w{5,17}$/;
	$('#username').on('blur',function(){
/*		if(re.test($('#username').val())){
			$('#notice_point_1').text('用户名可用');
			flag = flag+1;
		}
		else{
			$('#notice_point_1').text('用户名输入不符合格式：以字母开头，由数字和字母组成,只能包含字符、数字和下划线，且长度为6-18。');
			
		}*/
	});

	var re2 = /^[a-zA-Z]\w{5,17}$/;
	$('#password').on('blur',function(){
	/*	if(re2.test($('#password').val())){
			$('#unotice_point_2').text('密码验证通过');
			flag = flag+1;			
		}
		else{
			$('#notice_point_2').text('密码用户名输入不符合格式：以字母开头，由数字和字母组成,只能包含字符、数字和下划线，且长度为6-18。');
			
		}*/
	});


   	$('#repassword').on('blur',function(){

	});


	var re3 = /^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}/;

	$('#usermobile').on('blur',function(){
		/*if(re3.test($('#usermobile').val())){
			$('#notice_point_4').text('手机号符合规范');
			flag = flag+1;			
		} 
		else
			$('#notice_point_4').text('请输入正确的手机号。');*/			
	});
	
	var flag1,flag2,flag3,flag4;
	setInterval(function(){
		if(re3.test($('#usermobile').val())){
			$('#notice_point_4').text('手机号符合规范');
			flag1 = 1;
			
		} 

		else{
			$('#notice_point_4').text('请在下方输入正确的手机号码');
			flag1 = 0;
		}


	




		if($('#password').val()===$('#repassword').val())
    	{


    		$('#notice_point_3').text('  ');
    		flag2 = 1;
   		}
   		else{
   			$('#notice_point_3').text('两次密码不一致');
   			flag2 = 0;
   		}


   		if(re2.test($('#password').val())){
			$('#notice_point_2').text('密码验证通过');
			flag3 = 1;
			
		}
		else{
			$('#notice_point_2').text('密码由字母和数字组成且以字母开头，长度在6-18个字之间');
			flag3 = 0;
		}


		if(re.test($('#username').val())){
			$('#notice_point_1').text('用户名可用');
			flag4 = 1;
		}

		else{
			$('#notice_point_1').text('用户名由字母和数字组成且以字母开头，长度在6-18个字之间');
			flag4 = 0;
		}



		if(flag1+flag2+flag3+flag4 != 4){
			$("#btn").attr("disabled", true);
		}else{
			$("#btn").removeAttr("disabled");
		}
	},50);

});

	$("#yzm").click(function(){
			alert("1");
			$.post("?m=wpk_user&c=Inuser&f=get_yzm",{"usermobile":usermobile},function(data){
				var num  = ISON.parse(data);
				if(num.code == 0){
					$('#yzm').removeClass('btn-info btn-primary');
					$('#yzm').addClass('btn-success'); 
					$('#notice_point_5').text(num.err_msg); 
				}else{
		       		$('#yzm').removeClass('btn-info btn-success');
		       		$('#yzm').addClass('btn-primary'); 
		       		$('#notice_point_5').text(num.err_msg);
				}
			});
		});



</script>