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
		管理首页 &gt;&gt; 管理员管理 &gt;&gt; <strong id="title"><?php echo $title; ?></strong>
	</div> -->

		<ol class="breadcrumb">
			<li><a href="<?php echo url('admin5','adminuser','index'); ?>">后台首页</a></li>
			<li><a href="<?php echo url('admin5','adminuser','user_list'); ?>">管理员管理</a></li>
			<li class="active"><?php echo $title; ?></li>
		</ol>

		<ol class="breadcrumb">
			<li><a href="<?php echo url('admin5','adminuser','user_list'); ?>" class="selected">管理员列表</a></li>
			<li><a href="<?php echo url('admin5','adminuser','user_add'); ?>">新增管理员</a></li>
			<?php if(isset($update)) : ?>
			<li><a href="<?php echo url('admin5','adminuser','user_update'); ?>">修改管理员</a></li>
			<?php endif; ?>
		</ol>

		<?php if(isset($show)) : ?>
			<div class="col-md-10">
				<table class="table table-bordered">
					<tr><th>编号</th><th>用户名</th><th>等级</th><th>登录次数</th><th>最近登录ip</th><th>最近登录时间</th><th>操作</th></tr>
					<?php if(isset($manage_list)) : ?>
						<?php foreach ($manage_list as $key=>$value) : ?>
							<tr>
								<td><?php echo $value['mid']; ?></td>
								<td><?php echo $value['username']; ?></td>
								<td><?php echo $value['level_name']; ?></td>
								<td><?php echo $value['login_count']; ?></td>
								<td><?php echo $value['last_ip']; ?></td>
								<td><?php echo $value['last_time']; ?></td>
								<td><a href="<?php echo url('admin5','adminuser','user_update',array('mid'=>$value['mid'])); ?>">修改</a> | 
								    <a href="<?php echo url('admin5','adminuser','user_delete',array('mid'=>$value['mid'])); ?>" onclick="return confirm('你真的要删除这个管理员吗？') ? true : false">删除</a></td>
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
				<form class="form-horizontal" action="<?php echo url('admin5','adminuser','user_insert'); ?>" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">用 户 名：</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" name="admin_user">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">密　　码：</label>
						<div class="col-sm-10">
						<input type="password" class="form-control" name="admin_pass">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">密码确认：</label>
						<div class="col-sm-10">
						<input type="password" class="form-control" name="admin_pass_rep">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">等    级：</label>
						<div class="col-sm-3">
							<select class="form-control" name="level">
								<option value="0">请选择等级</option>
								<?php foreach ($level_list as $key=>$value) : ?>
									<option value="<?php echo $value['lid'] ?>"><?php echo $value['level_name'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="send" class="btn btn-default">新增管理员</button>
						</div>
					</div>
				</form>
			</div>
		<?php endif; ?>

		<?php if(isset($update)) : ?>
			<div class="col-md-8">
				<form class="form-horizontal" action="<?php echo url('admin5','adminuser','user_revise'); ?>" method="post">
					<input type="hidden" value="<?php echo $mid; ?>" name="id" />
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">用 户 名：</label>
						<div class="col-sm-10">
						<input type="text" class="form-control" name="admin_user" value="<?php echo $username; ?>" readonly="readonly">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">密　　码：</label>
						<div class="col-sm-10">
						<input type="password" class="form-control" name="admin_pass">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">等    级：</label>
						<div class="col-sm-3">
							<select class="form-control" name="level">
								<option value="0">请选择等级</option>
								<?php foreach ($level_list as $key=>$value) : ?>
									<option value="<?php echo $value['lid'] ?>" <?php if($value['lid'] == $level): ?>selected="selected"<?php endif; ?> ><?php echo $value['level_name'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="send" class="btn btn-default">修改管理员</button>
						</div>
					</div>
				</form>
			</div>
		<?php endif; ?>

	</div>

</body>
</html>