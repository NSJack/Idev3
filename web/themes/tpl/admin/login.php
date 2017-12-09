<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>聚美后台登陆</title>
        <link rel='stylesheet' href='<?php echo THEMES; ?>/bootstrap-3.3.0/css/bootstrap.css'/>
        <link rel='stylesheet' href='<?php echo THEMES; ?>/css/base.css?t=<?php echo time(); ?>'/>
        <script src="<?php echo THEMES; ?>/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo THEMES; ?>/bootstrap-3.3.0/js/bootstrap.js"></script> 
<script type="text/javascript">
	$(function() {
	
		$("form").submit(function () {
			var auser=$("#auser").val();
			var apass=$("#apass").val();
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
		
		})
	})	
</script>
    </head>
    <body>
         <div class="container">
             <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary" style="margin-top:200px ;">
                  <div class="panel-heading">聚美后台登陆</div>
                  <div class="panel-body">
    
                    <form action="<?php echo url('admin','Login','check') ?>" method="post" class="form-horizontal">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-10">
                          <input type="text" name="auser" id="auser" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                          <input type="password" name="apass" id="apass" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">登陆</button>
                          超级管理员：admin 222222。
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="panel-footer text-right">非管理员请勿尝试登陆</div>
                </div>  
            </div>              
                
         </div>
    </body>
</html>
