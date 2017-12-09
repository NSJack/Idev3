<!--用户中心-->
<style>
    .vick_bg{
        padding:10% 0;background-color: #ede7e1;
    }
    .vick_bg .vick_main{
        border:1px solid #b7b2ae; 
        padding-left: 0;
        background-color:#fff; 
    }
    .vick_bg .col-sm-10 .col-sm-2{
        padding:0px;
    }
    .nav a{
        color:#666;
    }
    .nav > li > a:hover {
        text-decoration: none;
        background-color: #fff;
        color: #ec1a5b;
        
    }
    
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{
        color: #ec1a5b;
        
    }
    
    #myTab{
        background-color: #ede7e1;
    }
    #myTab li{
        border:1px solid #dbd6d0;
        padding:0px;
        margin:0px;
    }
    #myTab li a{
        color:#666;
    }
    .vick_nav{
        height: 42px;
        line-height: 44px;
        background-color: #ede7e1;
        border-bottom: 2px solid #ccc;
    }
    .vick_nav span{
        font-size: 18px;
        font-color:#333;
    }
    .vick_nav span img{
        margin-left: -7px;
        position: absolute;
        vertical-align: top;
        width: 40px;
    }
    #myTabContent .tab-pane p{
        border: 1px solid #ccc;
        margin: 2%;
        min-height:250px;
    }
    #myTabContent h3{
        border-bottom:1px solid #ccc;
        line-height:30px;
    }
    .vick_order_main{
        border:1px solid #ccc;
        min-height: 260px;
        border-top:none;
        border-radius:0px 0px 8px 8px;
    }
    .thumbnail{
        margin: 10px;
    }
</style>


<script>
    
  

</script>




<div class='row vick_bg'>
    <div class="col-sm-10 col-sm-offset-1 vick_main">
        
        <div class="col-sm-2">
            <div class="thumbnail" style="width:130px;margin: auto;margin-top: 10px;">
                <img src=" <?php echo $row['file']; ?> " alt="用户头像" style="width: 130px;height: 120px;padding:10px;">
            </div>
            <ul id="myTab" class="nav nav-stacked">
                <div class="caption text-center" style='background-color:#fff;padding:2%;'>
                    <p>您好：<?php echo $row['name'];?>  </p>
                    <p>
                        <a href="?m=user&c=User#vick_heade" data-toggle="tab" class="btn btn-primary" role="button" style="color:#fff;">修改</a>
                    </p>
                    
                </div>
                <div  class='vick_nav'><span><img  src="/themes/img/nav_title_bg.png" alt="聚美优品"></span>　　　<span>我的聚美优品</span></div>

                    <li class="active">
                        <a href="#vick_order" data-toggle="tab"><span class=" 	glyphicon glyphicon-list-alt">　我的订单</span></a>
                    </li>
                    <li>
                        <a href="#vick_info" data-toggle="tab"><span class="glyphicon glyphicon-user">　设置账户信息</span></a>
                    </li>
                    <li>
                        <a href="#vick_password" data-toggle="tab"><span class="glyphicon glyphicon-pencil">　修改密码</span></a>
                    </li>
                    <li>
                        <a href="#vick_address" data-toggle="tab"><span class="glyphicon glyphicon-th-list">　添加收货地址</span></a>
                    </li>
                    <li>
                        <a href="#vick_address_info" data-toggle="tab"><span class="glyphicon glyphicon-th-list">　管理收货地址</span></a>
                    </li>
            </ul>
        </div>
        
        <div class="col-sm-10">
            
            <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade" id="vick_heade">
                        <!--修改头像-->
                        <?php include ('user_header.php'); ?>
                    </div>
                    <div class="tab-pane fade in active" id="vick_order">
                        <!---我的订单-->
                        <?php include ('user_order.php'); ?>
                    </div>
                    <div class="tab-pane fade" id="vick_info">
                        <!---设置账户信息-->
                        <?php include ('user_info.php'); ?>
                    </div>
                    <div class="tab-pane fade" id="vick_password">
                        <!---修改密码-->
                        <?php include ('user_resetpassword.php'); ?>
                    </div>
                    <div class="tab-pane fade" id="vick_address">
                        <!---添加收货地址-->
                        <?php include ('user_address.php'); ?>
                    </div>
                    <div class="tab-pane fade" id="vick_address_info">
                        <!---管理收货地址-->
                        <?php include ('user_address_info.php'); ?>
                    </div>
            </div>
        </div>
        
    </div>
</div>
