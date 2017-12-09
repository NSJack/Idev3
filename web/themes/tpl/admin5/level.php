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

		<!-- <div class="map">
			管理员等级首页 &gt;&gt; 管理员等级管理 &gt;&gt; <strong id="title"><?php echo $title; ?></strong>
		</div> -->

		<ol class="breadcrumb">
			<li><a href="<?php echo url('admin5','adminuser','index'); ?>">后台首页</a></li>
			<li><a href="<?php echo url('admin5','level','level_list'); ?>">角色管理</a></li>
			<li class="active"><?php echo $title; ?></li>
		</ol>

		<ol class="breadcrumb">
			<li><a href="<?php echo url('admin5','level','level_list'); ?>" class="selected">管理员等级列表</a></li>
			<li><a href="<?php echo url('admin5','level','level_add'); ?>">新增管理员等级</a></li>
			<?php if(isset($update)) : ?>
			<li><a href="<?php echo url('admin5','level','level_update'); ?>">修改管理员等级</a></li>
			<?php endif; ?>
		</ol>

		<?php if(isset($show)) : ?>
			<div class="col-md-10">
				<table class="table table-bordered">
					<tr><th>编号</th><th>等级名称</th><th>等级说明</th><th>等级包含权限</th><th>操作</th></tr>
					<?php if(isset($level_list)) : ?>
						<?php foreach ($level_list as $key=>$value) : ?>
							<tr>
								<td><?php echo $value['lid']; ?></td>
								<td><?php echo $value['level_name']; ?></td>
								<td><?php echo $value['level_info']; ?></td>
								<td><?php echo $value['permission']; ?></td>
								<td><a href="<?php echo url('admin5','level','level_update',array('lid'=>$value['lid'])); ?>">修改</a> | 
								    <a href="<?php echo url('admin5','level','level_delete',array('lid'=>$value['lid'])); ?>" onclick="return confirm('你真的要删除这个管理员等级吗？') ? true : false">删除</a></td>
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
				<form class="form-horizontal" action="<?php echo url('admin5','level','level_insert'); ?>" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">等级名称：</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" name="level_name">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">等级说明：</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" name="level_info">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">包含权限：</label>
						<div class="col-sm-10">
							<?php foreach ($permission as $key=>$value) : ?>
								<div class="panel panel-info">
									<div class="panel-heading">
										<h3 class="panel-title">
											<input type="checkbox" name="permission[<?php echo $value['class'] ?>][pid]" value="<?php echo $value['pid'] ?>" />&nbsp<?php echo $value['name'] ?>
										</h3>
									</div>
									<div class="panel-body">
										<?php foreach ($value['methods'] as $key1=>$value1) : ?>
											<input type="checkbox" name="permission[<?php echo $value['class'] ?>][]" value="<?php echo $value1 ?>" />&nbsp<?php echo $value1 ?>
										<?php endforeach; ?>
									</div>
								</div>
					 		<?php endforeach; ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="send" class="btn btn-default">新增管理员等级</button>
						</div>
					</div>
				</form>
			</div>
		<?php endif; ?>

		<?php if(isset($update)) : ?>
			<div class="col-md-8">
				<form class="form-horizontal" action="<?php echo url('admin5','level','level_revise'); ?>" method="post">
					<input type="hidden" value="<?php echo $lid; ?>" name="id" />
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">等级名称：</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" name="level_name" value="<?php echo $level_name; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">等级说明：</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" name="level_info" value="<?php echo $level_info; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">包含权限：</label>
						<div class="col-sm-10">

							<?php foreach ($permission as $key=>$value) : ?>
								<div class="panel panel-info">
									<div class="panel-heading">
										<h3 class="panel-title">
											<input type="checkbox" name="permission[<?php echo $value['class'] ?>][pid]" value="<?php echo $value['pid'] ?>" />&nbsp<?php echo $value['name'] ?>
										</h3>
									</div>
									<div class="panel-body">
										<?php foreach ($value['methods'] as $key1=>$value1) : ?>
											
											<?php $str = "<input type='checkbox' name='permission[".$value['class']."][]' value='".$value1."'"; ?>
											<?php if(is_array($level_per) && array_key_exists($value['class'], $level_per) && in_array($value1,$level_per[$value['class']])) $str.= " checked='checked'" ?>
											<?php $str .= " />&nbsp".$value1; ?>
											<?php echo $str; ?>

										<?php endforeach; ?>
									</div>
								</div>
					 		<?php endforeach; ?>

						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="send" class="btn btn-default">修改管理员等级</button>
						</div>
					</div>
				</form>
			</div>
		<?php endif; ?>

	</div>

</body>
</html>