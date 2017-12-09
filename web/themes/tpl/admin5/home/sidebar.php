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

<body id="sidebar">

	<?php if($select == "index" || $select == ""): ?>
	<dl>
		<dt>管理首页</dt>
		<dd><a target="main" href="<?php echo url('admin5','adminuser','index'); ?>">后台首页</a></dd>
		<dd><a target="main" href="<?php echo url('admin5','adminuser','user_list'); ?>">管理员管理</a></dd>
		<dd><a target="main" href="<?php echo url('admin5','level','level_list'); ?>">等级管理</a></dd>
		<dd><a target="main" href="<?php echo url('admin5','permission','permission_list'); ?>">权限设定</a></dd>
	</dl>
	<?php endif; ?>

	<?php if($select == "goods"): ?>
	<dl>
		<dt>商品管理</dt>
		<dd><a target="main" href="../admin/user.php?action=show">查看商品列表</a></dd>
	</dl>
	<?php endif; ?>

	<?php if($select == "member"): ?>
	<dl>
		<dt>会员管理</dt>
		<dd><a target="main" href="../admin/user.php?action=show">查看会员列表</a></dd>
	</dl>
	<?php endif; ?>

	<?php if($select == "order"): ?>
	<dl>
		<dt>订单管理</dt>
		<dd><a target="main" href="../admin/user.php?action=show">查看订单列表</a></dd>
	</dl>
	<?php endif; ?>

	<?php if($select == "config"): ?>
	<dl>
		<dt>系统管理</dt>
		<dd><a target="main" href="../admin/system.php">系统配置文件</a></dd>
	</dl>
	<?php endif; ?>

</body>

</html>