<!-- 附加样式 -->
<style type="text/css">
	.msg{ font-size: 13px; }
	.onError{ color: red; }
    .onSuccess{ color: green; }
</style>

<!-- jQuery验证 -->

<script type="text/javascript">

$(document).ready(function(){

    $("#send").click(function(){

        //定义两个变量接收用户和密码；       
        var username = $("#username").val();
        var password = $("#password").val();

        //如果用户名或密码任意有空，登录按钮失效
        if (username =="" || password == "") {
            return false;
         }

         //ajax验证用户名和密码是否正确
        $.ajax({
            cache:false,
            url:"/?m=tuser&c=Login&f=checklogin",
            type:"post",
            data:{'username':username,'password':password},
            // dataType:"json",
            success:function(d){
                if (d == 1) {
                    window.location.href='http://ldev3.sodevel.com/'
                }
                if (d == 2) {

                    $("#user_err").text("用户名或密码错误");
                    
                }

             }
            
        }); 

    });

});

</script>

<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-danger">
                <div class="panel-heading">聚美优品登录</div>
                <div class="panel-body">
                	<!-- 用户注册表单信息 -->
                    <form class="form-horizontal" action="?m=tuser&c=Login&f=chacklogin" method="post">
				
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名</label>
                            <div id="col-sm-10" class="col-sm-10">
                                <input type="text" class="form-control" name="username" id="username" placeholder="请输入用户名">
                                <span id="user_err" class="msg onError"></span>
                            </div>
                        </div>

                    
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password" placeholder="请输入密码">
                            </div>
                        </div>
                    
                                          
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="button" id="send" class="btn btn-success">登录</button>
                             
                            
                                <input type="button" class="btn btn-warning" style="margin-left: 10px"  value="去注册" onClick="location.href='http://ldev3.sodevel.com/?m=tuser&c=Register&f=register'"> 
                                
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>	
    </div>
</div>