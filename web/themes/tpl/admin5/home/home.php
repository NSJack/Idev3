<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>聚美优品后台管理系统</title>
	<link rel="stylesheet" href="<?php echo THEMES; ?>/bootstrap-3.3.0/css/bootstrap.min.css">
	<script src="<?php echo THEMES; ?>/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo THEMES; ?>/bootstrap-3.3.0/js/bootstrap.min.js"></script>
</head>
<frameset rows="85px,*" border="0">
	<frame src="<?php echo url('admin5','home','top'); ?>" noresize="true" scrolling="no" />
	<frameset cols="165px,*" border="0">
		<frame src="<?php echo url('admin5','home','sidebar'); ?>" name="sidebar" noresize="true" scrolling="no" />
		<frame src="<?php echo url('admin5','home','main'); ?>" name="main" noresize="true" />
	</frameset>
</frameset>
</html>