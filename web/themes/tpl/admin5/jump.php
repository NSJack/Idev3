<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>聚美优品后台管理系统</title>
	<link rel="stylesheet" href="<?php echo THEMES; ?>/bootstrap-3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo THEMES; ?>/css/admin4/admin.css">
	<script src="<?php echo THEMES; ?>/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo THEMES; ?>/bootstrap-3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="container" style="margin-top: 200px" >
		<div class="col-md-6 col-md-offset-3">
			<div class="jumbotron">
				<h1> <?php echo $info; ?> </h1><br/>
				<p><span id="sec" style="color:red">5</span>&nbsp秒后，将跳转到<?php echo $page_name; ?></p>
				<p>如果你的浏览器没有自动跳转，请<a class="btn btn-primary btn-sm" href="<?php echo $url; ?>" role="button">点击这里</a>手动跳转</p>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	
	var time=5;
	var timer=setInterval(function(){
			time--;
			$("#sec").text(time);
			if(time <= 0){
				clearInterval(timer);
				location.href="<?php echo $url; ?>";
			}
		},1000);

</script>