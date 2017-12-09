<div class='row vick_bg'>
    <div class="col-sm-10 col-sm-offset-1 vick_main">
        
 <?php include ('user_glob.php'); ?>
        
        <div class="col-sm-10">
            
            <div id="myTabContent" class="tab-content">
                <!--我的订单-->
                <h3>我的订单</h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#all_order" data-toggle="tab">全部订单</a>
                    </li>
                    <li>
                        <a href="#waitpayment" data-toggle="tab">等待付款</a>
                    </li>
                    <li>
                        <a href="#Paid" data-toggle="tab">已付款</a>
                    </li>
                    <li>
                        <a href="#transaction_completed" data-toggle="tab">交易完成</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="vick_order_main tab-pane fade in active" id="all_order">
                            <span>全部订单</span>
                    </div>
                    <div class="vick_order_main tab-pane fade" id="waitpayment">
                            <span>等待付款</span>
                    </div>
                        <div class="vick_order_main tab-pane fade" id="Paid">
                            <span>已付款</span>
                    </div>
                        <div class="vick_order_main tab-pane fade" id="transaction_completed">
                            <span>交易完成</span>
                    </div>
                    
                </div>


            </div>
        </div>
        
    </div>
</div>