<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>购物车 - 聚美优品</title>
    <link typy="text/css" rel="stylesheet" href="/themes/css/base.css?t=<?php echo time(); ?>'">
    <link typy="text/css" rel="stylesheet" href="/themes/css/bootstrap.min.css'">
    <script type="text/javascript" src="/themes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/themes/js/jquery-3.1.1.min.js"></script>
</head>
<body>
<!--购物车头部-->
<div style="background: white">
    <div class="cart_top">
        <div class="user_box" id="JS_user_box">
            <div>聚美优品欢迎您，
                <?php
                session_start();
                $u_id = @$_SESSION['id'];
                $username = @$_SESSION['username'];
                //判断用户是否登录，未登录显示登录注册链接
                if ($u_id == '') {
                    echo "<a href=\"/?m=user&c=Login\">登录</a><i class=\"tips\">|</i>
                          <a href=\"/?m=user&c=Register\">免费注册</a>";
                } else {
                    echo "<a href=\"/?m=user&c=User&f=index\">您好，{$username}</a><i class=\"tips\">|</i>
                          <a href=\"#\">退出</a>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="cart_header_box">
        <div class="cart_header">
            <h1 class="logo_box">
                <a href="/?m=plc&c=Home&f=index" target="_blank" id="home">
                    <img src="/themes/img/cart_logo.jpg" alt="化妆品团购">
                </a>
            </h1>
            <div class="order_path order_path_1">
            </div>
        </div>
    </div>
</div>

<!--购物车主体-->
<div id="container" style="width: auto;">
    <link rel="stylesheet" href="/themes/css/show.css">
    <?php
    $u_id = @$_SESSION['id'];
    $username = @$_SESSION['username'];
    //判断用户是否登录，未登录显示登录注册链接
    if ($u_id == '') {
        echo "<div id=\"group_show\">您还没有登录，请登录后再试！<a href=\"/?m=user&c=Login\">登录</a></div>";
    } else {
        echo "<div id=\"group_show\">
        <div class=\"\">
            <table class=\"cart_group_item\">
                <thead>
                <tr>
                    <th class=\"cart_overview\">
                        <div class=\"cart_group_header\">
                            <input type=\"checkbox\" class=\"cart_group_selector\" checked=\"checked\">
                            <h2> 聚美优品发货 </h2>
                        </div>
                    </th>
                    <th class=\"cart_price\">聚美价（元）</th>
                    <th class=\"cart_num\">数量</th>
                    <th class=\"cart_total\">小计（元）</th>
                    <th class=\"cart_option\">操作</th>
                </tr>
                </thead>
                <tbody>
                <tr class=\"cart_item \">
                    <td valign=\"top\">
                        <div class=\"cart_item_desc\">
                            <input type=\"checkbox\" class=\"cart_item_selector\" checked=\"\">
                            <div class=\"cart_item_desc_wrapper\">
                                <a class=\"cart_item_pic\" href=\"#\" target=\"_blank\">
                                    <img src=\"http://p3.jmstatic.com/product/000/587/587453_std/587453_60_60.jpg\"
                                         alt=\"膜玉（Candy Moyo）缤纷花都系列指甲油  8ml\">
                                    <span class=\"sold_out_pic\"></span>
                                </a>
                                <a class=\"cart_item_link\" title=\"膜玉（Candy Moyo）缤纷花都系列指甲油  8ml\" href=\"#\" target=\"_blank\">膜玉（Candy
                                    Moyo）缤纷花都系列指甲油 8ml
                                </a>
                                <p class=\"sku_info\"> 容量：<span class=\"cart_item_capacity\">正红CMN25</span></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class=\"cart_item_price\"><p class=\"jumei_price\">35.00</p>
                            <p class=\"market_price \">66.00</p></div>
                    </td>
                    <td>
                        <div class=\"cart_item_num \">
                            <div class=\"item_quantity_editer clearfix\">
                                <span class=\"decrease_one\">-</span>
                                <input class=\"item_quantity\" type=\"text\" value=\"2\">
                                <span class=\"increase_one\">+</span>
                            </div>
                            <div class=\"item_shortage_tip\"></div>
                        </div>
                    </td>
                    <td>
                        <div class=\"cart_item_total\"><p class=\"item_total_price\">70.00</p>
                            <p>省 <span class=\"item_saved_price\">62.00</span></p></div>
                    </td>
                    <td>
                        <div class=\"cart_item_option\">
                            <a class=\"icon_small delete_item png\" data-item-key=\"1048317_\"
                               href=\"javascript:void(0)\" title=\"删除\"></a>
                        </div>
                    </td>
                </tr>
                </tbody>

                <tfoot>
                <tr>
                    <td colspan=\"\"> 商品金额： <span class=\"group_total_price\">¥140.00</span></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class=\"common_handler\">
            <div class=\"right_handler\"> 共 <span class=\"total_amount\"> 4 </span> &nbsp;件商品 &nbsp;&nbsp; 商品应付总额：<span
                        class=\"total_price\">¥140.00</span> <a id=\"go_to_order\" class=\"button\" href=\"#\">去结算</a></div>
            <label for=\"js_all_selector\" class=\"cart_all_selector_wrapper\">
                <input type=\"checkbox\" id=\"js_all_selector\" class=\"js_all_selector all_selector\">全选 </label> <a
                    class=\"go_back_shopping\" href=\"#\">继续购物</a> <span
                    class=\"seperate_line\">|</span> <a class=\"clear_cart_all\" href=\"\">清空选中商品</a>
        </div>
    </div>";
    }
    ?>


</div>

<!--购物车底部-->
<div id="footer_container">
    <div id="footer_textarea">
        <div class="footer_con" id="footer_copyright">
            <p class="footer_copy_con">
                © 2013 北京创锐文化传媒有限公司 Jumei.com 保留一切权利。客服热线：400-123-8888 <br>
                京公网安备 11010102001226 | <a href="#" target="_blank"
                                          rel="nofollow">京ICP证111033号</a> | 食品流通许可证 SP1101051110165515（1-1）
                | <a href="#" target="_blank">营业执照</a>
            </p>
            <p>
                <img src="/themes/img/footer_btm_icon.png" alt="">
            </p>
        </div>
    </div>
</div>
</body>
</html>
