
<div class="container" style="margin-top: 20px">
	<div class="row">
		<div class="col-md-1" style="border: 2px;
		"></div>

		<div class="col-md-10" style="border: 2px;background: #f7f7f7;">
			<div id="left" style="width: 67%;height: 550px;float: left;">
				<div id="description" class="description" style="font-size: 20px;font-weight: 500;margin: 15px 20px" value="">
					商品描述（description）<?php echo $rows['description'];?>
				</div>
				<div class="image" id="fimage" style="width: 67%;" >

					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="<?php echo $imgs['bimg'];?>" alt="...">
							</div>
							<div class="item">
								<img src="<?php echo $imgs['bimg'];?>" alt="...">
							</div>
							<div class="item">
								<img src="<?php echo $imgs['bimg'];?>" alt="...">								
							</div>
							<div class="item">
								<img src="<?php echo $imgs['bimg'];?>" alt="...">	
							</div>
						</div>
						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						</a>
					</div>
				</div>
			</div>
			<div id="right" style="width: 33%;height: 550px;float: left;">
				
				<div>
					<h1><span class="glyphicon glyphicon-jpy" style="margin-left: 50px;" value="">￥<?php echo $rows['price'] ?></span></h1>
					<p style="margin-left: 60px;">剩余<?php echo $rows['gnumber']; ?>件</p>
				</div>
				<button type="button" class="btn btn-info" style="margin: 60px;width: 200px;height: 50px;">
					<span style="font-size: 20px;">加入购物车</span>
				</button>
			</div>
			<div style="height: 150px;margin: 10px 0 10px 0;clear: both;">
				<div style="height: 25px;"></div>
				<div style="height: 100px;width: 25%;margin: 0px;float: left;"></div>
				<div style="height: 100px;width: 25%;margin: 0px;float: left;"></div>
				<div style="height: 100px;width: 25%;margin: 0px;float: left;"></div>
				<div style="height: 100px;width: 25%;margin: 0px;float: left;"></div>
				<div style="height: 25px;clear: both;"></div>
			</div>
            <div>
                <ul class="nav nav-tabs" style="margin: 10px;">
				  <li role="presentation" class="active"><a href="#information">商品信息</a></li>
				  <li role="presentation"><a href="#msg">用户口碑</a></li>
				</ul>
            </div>
			<div style="height: 80px;"></div>
			<div id="information">
				<div style="height: 50px;padding-left: 30%;">
					<div style="width: 50%;height: 46px;text-align: center;background: black;color: white;font-size: 28px;">商品信息</div>
				</div>
				<div style="height: 400px;width: 100%;padding-top: 40px;padding-left: 100px;">
					<table style="width: 400px;float: left; ">
						<tbody>
							<tr >
								<td style="width: 100px;height: 33px;text-align: center;margin-top: 10px;font-weight: bold;">商品名称：</td>
								<td style=""><?php echo $rows['gname'] ?></td>
							</tr>
							<tr>
								<td style="width: 100px;height: 33px;text-align: center;margin-top: 10px;font-weight: bold;">商品型号：</td>
								<td style=""><?php echo $rows['gmodel'] ?></td>
							</tr>
							<tr>
								<td style="width: 100px;height: 33px;text-align: center;margin-top: 10px;font-weight: bold;">分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类：</td>
								<td style=""><?php echo $rows['gclass'] ?></td>
							</tr>
							<tr>
								<td style="width: 100px;height: 33px;text-align: center;margin-top: 10px;font-weight: bold;">品&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牌：</td>
								<td style=""><?php echo $rows['gbrand'] ?></td>
							</tr>
							<tr>
								<td style="width: 100px;height: 33px;text-align: center;margin-top: 10px;font-weight: bold;">功&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;效：</td>
								<td style=""><?php echo $rows['geffect'] ?></td>
							</tr>
							<tr>
								<td style="width: 100px;height: 35px;text-align: center;margin-top: 10px;font-weight: bold;">温馨提示：</td>
								<td style=""><?php echo $rows['gtips'] ?></td>
							</tr>
						</tbody>
					</table>
					<div style="width: 200px;height: 200px;float: right;margin-bottom: 50px;margin-right: 30px;">
						<img src="<?php echo $imgs['simg'];?>" style="width: 200px;height: 200px;margin-bottom: 50px;margin-right: 30px;" >
					</div>

				</div>
			</div>
			
			<div id="msg">
				<div style="height: 50px;padding-left: 30%;">
					<div style="width: 50%;height: 46px;text-align: center;background: black;color: white;font-size: 28px;">商品口碑</div>
				</div>
				<div style="width: 100%;padding: 20px;">
					
					<div style="width: 75%;height: 180px;border: 2px solid black;margin: 10px 105px;">
						<div style="width: 75%;height: 100%;border: 2px solid black;float: left;padding: 20px;">
							
						</div>
						<div style="width: 25%;height: 100%;border: 2px solid black;float: left;padding: 20px;">
							<a href='/?m=liulin&c=WaresPage&f=writemsg' class="btn btn-success" >我要写口碑</a>
						</div>
					</div>

					<div style="width: 75%;margin: 10px 105px;">
						<div class="panel panel-default" style="width: 75%;margin: 10px 85px;" >
							<?php 
								foreach($re as $row):
							?>
							<div class="panel-body" style="border: 1px solid pink">
								第<?php echo $row['mid']; ?>条口碑：
							</div>
							<div class="panel-footer" style="border: 1px solid pink">
								<?php echo $row['content']; ?>
							</div>
							<?php
								endforeach;
							;?>
							<form  id="msg" action="/?m=liulin&c=WaresPage&f=msg" method="post" style="margin-top: 20px;">
								<textarea class="form-control" rows="3" name="content" style="height: 100px"></textarea>
								<input type="submit" value="提交留言" style="background: pink;width: 92px;height: 43px;margin: 10px;">
							</form>
						</div>
					</div>
					
				</div>
			</div>
			

		</div>

		<div class="col-md-1" style=""></div>
	</div>
</div>