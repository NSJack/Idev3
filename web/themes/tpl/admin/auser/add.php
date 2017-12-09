			<div class="page-header">
				<h1>
					管理员添加
				</h1>
			</div>

				<form action="<?php echo url('admin','Auser','addAuser') ?>" method="post" class="form-horizontal">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
				    <div class="col-sm-10">
				      <input type="text" name="auser" id="auser" class="form-control" value="">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
				    <div class="col-sm-10">
				      <input type="password" name="apass" id="apass" class="form-control" value="">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
				    <div class="col-sm-10">
				      <input type="password" name="confirm" id="confirm" class="form-control" value="">
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">提交</button>
				    </div>
				  </div>
				</form>		

		</div>	

<script type="text/javascript">
	$(function() {
	
		$("form").submit(function () {
			var auser=$("#auser").val();
			var apass=$("#apass").val();
			var confirm=$("#confirm").val();
			//用户名4到16位，必须以字母开头
			patt=/^[a-z][a-z0-9_]{3,17}$/;
	 		if(!patt.test(auser)){
	 			alert(auser + "用户名必须是4位以上，且以字母开头");
	 			return false;
	 		} ;
	 		
			patt=/^[\w~!@#$%^&*()_+`\-={}:";'<>?,.\/]{6,16}$/;
	 		if(!patt.test(apass)){
	 			alert("密码必须是6到16位字母数字或特殊字符");
	 			return false;
	 		} ;

	 		if(apass != confirm){
	 			alert("两次输入密码不一致");
	 			return false;	 			
	 		} 		
		
		})
	})	
</script>		