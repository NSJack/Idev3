
			<div class="page-header">
				<h1>
					系统设置
				</h1>
			</div>

				<form action="<?php echo url('admin','Option','save') ?>" method="post" class="form-horizontal">
					<?php
						//转成两个一维数组，分别是键=>值，和键=>中文名称
						$key_value=array();
						$key_cname=array();
						foreach ($data as $row) {
							$key_value[$row['key']]=$row['value'];
							$key_cname[$row['key']]=$row['cname'];
						}

						//在radio中显示网站是开启还是关闭的状态
						if($key_value['on_off']=='true'){
							$web_on=' checked="checked" ';
							$web_off="";
						}else{
							$web_on='';
							$web_off=' checked="checked" ';
						}


					 ?>
					 <!-- 单独显示网站开启或关闭的状态，因为这是个单选框 -->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label"><?php echo $key_cname['on_off'] ?></label>
						<div class="col-sm-10">
							<label class="radio-inline">
							  <input type="radio" name="on_off" <?php echo $web_on ?>  value="true"> 开启
							</label>
							<label class="radio-inline">
							  <input type="radio" name="on_off" <?php echo $web_off ?> value="false"> 关闭
							</label>
						</div>	
					</div>	

				<!-- 循环显示其它设置项，因为都是 input type="text"类型 -->
				<?php foreach( $key_value as $key=>$value ) {
						if($key == 'on_off') continue;	 
				?>
					
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $key_cname[$key] ?></label>
				    <div class="col-sm-10">
				      <input type="text" name="<?php echo $key ?>" class="form-control" value="<?php echo $value ?>">
				    </div>

				    
				  </div>

				  <?php } ?>

				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">提交</button>
				    </div>
				  </div>
				</form>		
