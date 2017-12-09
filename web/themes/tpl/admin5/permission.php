<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>main</title>
<link rel="stylesheet" href="<?php echo THEMES; ?>/bootstrap-3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo THEMES; ?>/css/admin5/admin.css">
<script src="<?php echo THEMES; ?>/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo THEMES; ?>/bootstrap-3.3.0/js/bootstrap.min.js"></script>
</head>
<body id="main">

<div class="container-fluid" style="margin-top: 20px">

<!-- <div class="row"> -->
<!-- <div class="map">
	<h2>管理首页 &gt;&gt; 管理员管理 &gt;&gt; <strong id="title"><?php echo $title; ?></strong></h2>
</div> -->
	<ol class="breadcrumb">
		<li><a href="<?php echo url('admin5','adminuser','index'); ?>">管理首页</a></li>
		<li><a href="<?php echo url('admin5','permission','permission_list'); ?>">权限管理</a></li>
		<li class="active"><?php echo $title; ?></li>
	</ol>
<!-- </div> -->

<ol class="breadcrumb">
	<li><a href="<?php echo url('admin5','permission','permission_list'); ?>">管理权限列表</a></li>
	<li><a href="<?php echo url('admin5','permission','permission_add'); ?>">新增管理权限</a></li>
	<?php if(isset($update)) : ?>
	<li><a href="<?php echo url('admin5','permission','permission_update'); ?>">修改管理权限</a></li>
	<?php endif; ?>
</ol>




<?php if(isset($show)) : ?>
	<div class="col-md-10">
		<table class="table table-bordered">
			<tr><th>编号</th><th>权限名称</th><th>权限说明</th><th>对应类</th><th>类方法</th><th>操作</th></tr>
			<?php if(isset($permission_list)) : ?>
				<?php foreach ($permission_list as $key=>$value) : ?>
					<tr>
						<td><?php echo $value['pid']; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['info']; ?></td>
						<td><?php echo $value['class']; ?></td>
						<td><?php echo $value['method']; ?></td>
						<td><a href="<?php echo url('admin5','permission','permission_update',array('pid'=>$value['pid'])); ?>">修改</a> | 
						    <a href="<?php echo url('admin5','permission','permission_delete',array('pid'=>$value['pid'])); ?>" onclick="return confirm('你真的要删除这个管理权限吗？')">删除</a></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan="7">对不起，没有任何数据</td></tr>
			<?php endif; ?>
		</table>
	</div>
<?php endif; ?>


<?php if(isset($add)) : ?>
	<div class="col-md-8">

		<form class="form-horizontal" action="<?php echo url('admin5','permission','permission_insert'); ?>" method="post">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">权限名称：</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="permission_name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">权限说明：</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="permission_info">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">对应类  ：</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="permission_class">
				</div>
			</div>
			<!-- <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">类方法  ：</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="permission_method">
				</div>
			</div> -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="send" class="btn btn-default">新增管理权限</button>
				</div>
			</div>
		</form>
	</div>
<?php endif; ?>

<?php if(isset($update)) : ?>

	<div class="col-md-8">

		<form class="form-horizontal" action="<?php echo url('admin5','permission','permission_revise'); ?>" method="post">
			<input type="hidden" value="<?php echo $pid; ?>" name="id" />
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">权限名称：</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="permission_name" value="<?php echo $name; ?>" readonly="readonly" >
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">权限说明：</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="permission_info" value="<?php echo $info; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">对应类  ：</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="permission_class" value="<?php echo $class; ?>">
				</div>
			</div>
			<!-- <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">类方法  ：</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="permission_method">
				</div>
			</div> -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="send" class="btn btn-default">修改管理权限</button>
				</div>
			</div>
		</form>

	</div>

<?php endif; ?>



</div>

</body>
</html>