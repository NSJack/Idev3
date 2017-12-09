<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>dev3后台</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel='stylesheet' href='<?php echo THEMES; ?>/bootstrap-3.3.0/css/bootstrap.css'/>
	<link rel='stylesheet' href='<?php echo THEMES; ?>/css/base.css?t=<?php echo time(); ?>'/>
	<script src="<?php echo THEMES; ?>/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo THEMES; ?>/bootstrap-3.3.0/js/bootstrap.js"></script>  
	<script src="<?php echo THEMES; ?>/tpl/admin/afw.js"></script>
	
  
</head>
<body>
<div class="container-fluid">
	<!--引入顶部导航条-->
	<?php echo $top; ?>
	<!--另起一行，放左侧面板。和主面板-->
	<div class="row">
		<div class="col-md-3"> <!--左侧面板，占3格-->
			<div class="list-group" id="left">

			</div>
		</div>	
			
		<!--主面板为9格宽度-->
		<div class="col-md-9">
			<div class="panel panel-default">
			  <div class="panel-body">
			  	<!--引入主面板-->
			    <?php echo $main; ?>
			  </div>
			</div>
		</div> <!--主面板结束-->

	
	</div> <!--row结束-->
</div><!-- /.container-fluid -->
</body>
</html>