<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>聚美优品后台管理系统</title>
	<link rel="stylesheet" href="<?php echo THEMES; ?>/bootstrap-3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo THEMES; ?>/css/admin5/admin.css">
	<script src="<?php echo THEMES; ?>/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo THEMES; ?>/bootstrap-3.3.0/js/bootstrap.min.js"></script>
</head>
<body id=top>
	
<h1><img src="<?php echo THEMES; ?>/img/logo.jpg" /></h1>

<span>
<ul class="list-inline text-center">
	<li><a href="<?php echo url('admin5','home','sidebar',array('select'=>'index')); ?>" target="sidebar" id="nav1" onclick="admin_top_nav(1)">首页</a></li>
	<li><a href="<?php echo url('admin5','home','sidebar',array('select'=>'goods')); ?>" target="sidebar" id="nav2" onclick="admin_top_nav(2)">商品</a></li>
	<li><a href="<?php echo url('admin5','home','sidebar',array('select'=>'member')); ?>" target="sidebar" id="nav3" onclick="admin_top_nav(3)">会员</a></li>
	<li><a href="<?php echo url('admin5','home','sidebar',array('select'=>'order')); ?>" target="sidebar" id="nav4" onclick="admin_top_nav(4)">订单</a></li>
	<li><a href="<?php echo url('admin5','home','sidebar',array('select'=>'config')); ?>" target="sidebar" id="nav5" onclick="admin_top_nav(4)">系统</a></li>
</ul>
</span>

<p>
	您好，<strong><?php isset($username) ? $username = $username : $username = "未知管理员"; echo $username; ?></strong> 
	[ <?php isset($level_name) ? $level_name = $level_name : $level_name = "未知等级"; echo $level_name; ?> ] 
	[ <a href="<?php echo url('admin5','home','index'); ?>" target="_parent">去首页</a> ] 
	[ <a href="<?php echo url('admin5','login','logout'); ?>" target="_parent">退出</a> ]
</p>

</body>
</html>