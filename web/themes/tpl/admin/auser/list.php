			<div class="page-header">
				<h1>
					管理员管理
				</h1>
			</div>

			<table class="table table-striped">
			      <thead>
			        <tr>
			          <th>aid</th>
			          <th>用户名</th>
			          <th>创建时间</th>
			          <th>上次登陆时间</th>
			          <th>上次登陆IP</th>
			          <th>登陆次数</th>
			          <th>管理</th>
			        </tr>
			      </thead>
			      <tbody>

			      <?php foreach ($data as $row){
			      		$nowId=$_SESSION['aid'];
			      		if( $row['id']==1 && $nowId!=1){
			      			continue;	//不显示超级管理员
			      		} 
			      		
			      		$createTime=date("Y-m-d H:i",$row['createTime']);
			      		$lastLoginTime=date("Y-m-d H:i",$row['lastLoginTime']);
			      ?>
			        <tr>
					  <td><?php echo $row['id']; ?></td>	
			          <td><?php echo $row['auser']; ?></td>
			          <td><?php echo $createTime; ?>	</td>
			          <td><?php echo $lastLoginTime; ?></td>
			          <td><?php echo $row['lastLoginIp']; ?></td>
			          <td><?php echo $row['loginCount']; ?></td>
			          <td>
			          	<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#mt1" editid="<?php echo $row['id']; ?>" editname="<?php echo $row['auser']; ?>">改密码</button>
			     		<!--如果是自己，则不显示删除-->
			     		<?php if($row['id']!=$nowId){ ?>
			     			<button type="button" class="btn del btn-danger btn-xs" delid="<?php echo $row['id']; ?>" delname="<?php echo $row['auser']; ?>">删除</button>
			          		
			          	<?php } ?>
			          </td>
			        </tr>
			      <?php } ?>
			        
			      </tbody>
			    </table>			


<!--修改密码的模态框-->
<div class="modal fade" id="mt1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="margin-top: 150px;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">修改管理员密码</h3>
		  </div>
		  <div class="panel-body">
				<form class="form-horizontal" action="<?php echo url('admin','Auser','editAuser') ?>" method="post">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">管理员账号</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="editAusername" disabled="disabled" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">原密码</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="请输入原密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="newPass" name="newPass" placeholder="请输入新密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">确认新密码</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="请再次输入新密码">
				    </div>
				  </div>				  
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">确认</button>
				    </div>
				  </div>
				  
				  <input type="hidden" id="editId" name="editId" />
				</form>
		  </div>
		</div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(function  () {
	//点删除按钮，弹出确认框
	$('.del').click(function () {
		var id=$(this).attr('delid');
		var name=$(this).attr('delname');
		var re=confirm("确定要删除管理员:"+name+"吗？");
		if(re){
			location.replace("/?m=Admin&c=Auser&f=delAuser&id="+id);
		}
	})

var editId=0;	
	$('#mt1').on('show.bs.modal', function (e) {
		var name=e.relatedTarget.getAttribute('editname');
		editId=e.relatedTarget.getAttribute('editid');
		
		$("#editAusername").val(name);//模态框中，显示要修改的用户名
		$("#editId").val(editId);
	  	
	})	
	
	//修改密码时点提交按钮
	$("form").submit(function () {
		var oldPass=$("#oldPass").val();
		var newPass=$("#newPass").val();
		var confirmPass=$("#confirmPass").val();
		
		patt=/^[\w~!@#$%^&*()_+`\-={}:";'<>?,.\/]{6,16}$/;
 		if(!patt.test(oldPass) || !patt.test(newPass)){
 			alert("密码必须是6到16位字母数字或特殊字符");
 			return false;
 		} ;
 		
 		if(oldPass==newPass){
  			alert("原密码不能和新密码相同");
 			return false;			
 		}

 		if(newPass != confirmPass){
 			alert("新密码的两次输入不一致");
 			return false;	 			
 		} 			
	})	
})

</script>		