<link rel='stylesheet' href='<?php echo THEMES; ?>/bootstrap-3.3.0/css/bootstrap.css'/>
<link rel='stylesheet' href='<?php echo THEMES; ?>/css/base.css?t=<?php echo time(); ?>'/>
<script src="<?php echo THEMES; ?>/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo THEMES; ?>/bootstrap-3.3.0/js/bootstrap.js"></script>

<?php foreach ($this->getCss() as $file => $is): ?>
    <link rel='stylesheet' href='<?php echo THEMES . $file; ?>'/>
<?php endforeach; ?>
<?php foreach ($this->getJs() as $file => $is): ?>
    <script src="<?php echo THEMES . $file; ?>"></script>
<?php endforeach; ?>
<div class="header">
    <!--header 顶部区域-->
    <div class="header_top">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/?m=plc&c=Home">欢迎来到聚美</a></li>
                        <?php

                        $u_id = @$_SESSION['id'];
                        $username = @$_SESSION['username'];
                        //如果用户登录了，显示用户名
                        if ($u_id != '') {
                            echo "<li><a href=\"/?m=user&c=User&f=index\">您好，{$username}</a></li>
<li><a href='#'>退出</a></li>";
                        } else {
                            //如果用户未登录，显示登录和注册链接
                            echo "<li><a href=\"/?m=user&c=Login\">请登录</a></li>
                                  <li><a href=\"/?m=user&c=Register\">快速注册</a></li>";
                        } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">正品保证</a></li>
                        <li><a href="#">订单查询</a></li>
                        <li><a href="#">收藏的品牌</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">我的聚美<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">我的订单</a></li>
                                <li><a href="#">我的现金券</a></li>
                                <li><a href="#">我的红包</a></li>
                                <li><a href="#">我的余额</a></li>
                                <li><a href="#">我的提现退款</a></li>
                                <li><a href="#">我的收藏</a></li>
                                <li><a href="#">我的心愿单</a></li>
                                <li><a href="#">会员中心</a></li>
                                <li><a href="#">礼品卡兑换</a></li>
                            </ul>
                        </li>
                        <li><a href="#">手机聚美</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">更多<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">邀请好友</a></li>
                                <li><a href="#">加入收藏</a></li>
                                <li><a href="#">新浪微博</a></li>
                                <li><a href="#">聚美微信</a></li>
                                <li><a href="#">百度贴吧</a></li>
                                <li><a href="#">腾讯微博</a></li>
                                <li><a href="#">人人公众主页</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!--header 中部区域-->
    <div class="col-lg-offset-3 header_center">
        <div class="logo"><a href="/?m=plc&c=Home"><img src="/themes/img/logo.jpg"/></a></div>
        <div class="header_searchbox">
            <form action="#" method="get">
                <input name="search" type="text" class="header_search_input" id="header_search_input">
                <button type="submit" class="header_search_btn">搜索</button>
            </form>
            <ul class="hot_word">
                <li><a href="#" target="_blank">保湿</a><s class="line"></s></li>
                <li><a href="#" target="_blank">面膜</a><s class="line"></s></li>
                <li><a href="#" target="_blank">洗面奶</a><s class="line"></s></li>
                <li><a href="#" target="_blank">补水</a><s class="line"></s></li>
                <li><a href="#" target="_blank">香水</a><s class="line"></s></li>
                <li><a href="#" target="_blank">眼霜</a><s class="line"></s></li>
                <li><a href="#" target="_blank">口红</a><s class="line"></s></li>
                <li><a href="#" target="_blank">护肤套装</a><s class="line"></s></li>
                <li><a href="#" target="_blank">BB霜</a></li>
            </ul>
        </div>
        <div id="cart_box" class="cart_box">
            <a id="cart" class="cart_link" href="/?m=cart&c=Cart&f=index" rel="nofollow">
                <img src="/themes/img/cart.gif" width="28" height="28" class="cart_gif">
                <span class="text">去购物车结算</span>
                <span class="num" style="display: none;"></span>
                <s class="icon_arrow_right"></s>
            </a>
        </div>
    </div>

    <!--header 底部区域-->
    <div class="header_bottom">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid  col-lg-offset-3">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">首页</a></li>
                        <li><a href="#">极速免税店</a></li>
                        <li><a href="#">母婴特卖</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">美妆商城<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                        <li><a href="#">国际轻奢</a></li>
                        <li><a href="#">服装运动</a></li>
                        <li><a href="#">鞋包服饰</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

</div>


