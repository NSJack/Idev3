

<div class="container" style="margin-top: 60px">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">欢迎您，请先登录</h3>
				</div>
					<div class="panel-body">

					<form action="/?m=wpk_user&c=Inuser&f=login" method="post" name="useradd">

						<div class="form-group">
							<label for="exampleInputPassword1">用户名</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
						</div>
							
						<div class="form-group">
							<label for="exampleInputPassword1">密码</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
						</div>

						<div class = "pull-right">
							<div class="col-md-offset-2">
								<a class="btn btn-info" href="/?m=wpk_user&c=Inuser&f=reg">注册</a>
							
								<form action="/?m=wpk_user&c=Inuser&f=login" method="post" name="useradd">
									<button type="submit" class="btn btn-primary">登录</button>
								</form>

							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>