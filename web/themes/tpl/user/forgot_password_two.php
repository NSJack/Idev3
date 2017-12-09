<style>
    /*忘记密码  必要样式*/
    .clears{ clear:both;}
    .for-liucheng{width:640px;margin:30px auto; height:50px;padding:20px 0 0 0; position:relative;}
    .liulist{float:left;width:25%; height:7px; background:#ccc;}
    .liutextbox{ position:absolute;width:100%;left:0;top:10px;}
    .liutextbox .liutext{float:left;width:50%; text-align:center;}
    .liutextbox .liutext em{ display:inline-block;width:24px; height:24px;-moz-border-radius: 24px; -webkit-border-radius: 24px;border-radius:24px; background:#ccc; text-align:center; font-size:14px; line-height:24px; font-style:normal; font-weight:bold;color:#fff;}
    .liutextbox .liutext strong{ display:inline-block;height:26px; line-height:26px; font-weight:400;}
    .liulist.for-cur{ background:#77b852;}
    .liutextbox .for-cur em{ background:#77b852;}
    .liutextbox .for-cur strong{color:#77b852;}

    .forget-pwd{width:500px;margin:20px auto;min-height:280px;}
    .forget-pwd input,.forget-pwd select,.forget-pwd button{border:0;margin:0;padding:0; background:none;}
    .forget-pwd dl{margin-bottom:20px;}
    .forget-pwd dt{float:left;padding-right:10px;width:100px; height:30px; line-height:30px; text-align:right; font-size:14px;}
    .forget-pwd dd{float:left;width:380px; height:30px; position:relative;}
    .forget-pwd dd input{width:190px; height:28px;border:#ccc 1px solid;}
    .forget-pwd dd select{width:190px; height:30px;border:#ccc 1px solid;}
    .forget-pwd dd button{width:120px; height:30px; line-height:30px;border:#ddd 1px solid; background:#f1f1f1; text-align:center; cursor:pointer; font-size:14px;color:#666;}
    .forget-pwd .yanzma{ position:absolute;left:200px;top:2px; height:30px; line-height:30px;width:180px;}
    .subtijiao{padding:0 0 0 110px;}
    .subtijiao input{width:85px; height:32px; background:#f60;color:#fff; font-size:14px; cursor:pointer;}
    .successs{ text-align:center;padding: 20px 0 60px 0;}
    .successs h3{padding:20px; font-size:25px;color:#A0CD4E;}
    
</style>
<script>

//修改成功3秒后跳转到登录页面
    $(document).ready(function() {
        function jump() {
            window.setTimeout(function(){
                    location.href="?m=User";
            }, 3000);
        }
       jump();
    }); 



</script>
<div class="content" style="padding-top:5%;">
    <div class="for-liucheng">
        <div class="liulist for-cur"></div>
        <div class="liulist for-cur"></div>
        <div class="liulist for-cur"></div>
        <div class="liulist for-cur"></div>
    <div class="liutextbox">
        <div class="liutext for-cur"><em>1</em><br /><strong>设置新密码</strong></div>
        <div class="liutext for-cur"><em>2</em><br /><strong>完成</strong></div>
    </div>
    </div><!--for-liucheng/-->
    <div class="successs">
        <h3><b>恭喜您，修改成功！</b></h3>
    </div>
</div><!--web-width/-->