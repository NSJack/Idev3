</script>

<div class='row vick_bg'>
    <div class="col-sm-10 col-sm-offset-1 vick_main">
        
 <?php include ('user_glob.php'); ?>
        
        <div class="col-sm-10">
            
            <div id="myTabContent" class="tab-content">
                <!---管理收货地址-->

				<h3>管理收货地址</h3>
				
				<div class="panel-group" id="accordion">
				<?php 
				
				if( !empty($address_row) ){
					foreach($address_row as $item){ 
				?>
				
					<div class="panel panel-default" id="panellala">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $item['id']; ?>">
									<?php echo $item['province_name']."省&nbsp;"; echo $item['city_name']."市&nbsp;"; echo $item['district_name']."区&nbsp;&nbsp;&nbsp;"; echo $item['txt']; ?>
								</a>
							</h4>
						</div>
						<div id="<?php echo $item['id']; ?>" class="panel-collapse collapse ">
							<div class="panel-body">
								收货人:<?php echo $item['name']; ?><br />
								手机号码:<?php echo $item['tel']; ?><br />
								地址：<?php echo $item['province_name']."省&nbsp;"; echo $item['city_name']."市&nbsp;"; echo $item['district_name']."区&nbsp;&nbsp;&nbsp;"; echo $item['txt']; ?>
							</div>
						</div>
					</div>
				
				<?php 
					} 
				}else{ echo "请添加收货地址";}
				?>
				</div>	


            </div>
        </div>
        
    </div>
</div>