			<div class="page-header">
				<h1>管理员登陆日志</h1>
			</div>

			<table class="table table-striped">
			      <thead>
			        <tr>
			          <th>记录号</th>
			          <th>用户名</th>
			          <th>IP地址</th>
			          <th>登陆时间</th>
			          <th>浏览器</th>
			          <th>操作系统</th>
			        </tr>
			      </thead>
			      <tbody>

			      <?php foreach ($data as $row){			      		
			      			$loginTime=date("Y-m-d H:i",$row['loginTime']);			    
			      ?>
			        <tr>
					  <td><?php echo $row['id']; ?></td>	
			          <td><?php echo $row['auser']; ?></td>
			          <td><?php echo $row['ip']; ?>	</td>
			          <td><?php echo $loginTime; ?></td>
			          <td><?php echo $row['broswer']; ?></td>
			          <td><?php echo $row['os']; ?></td>
			        </tr>
			      <?php } ?>
			        
			      </tbody>
			    </table>