<!DOCTYPE html>
<html>
<head>
	<title>留言板</title>
</head>
<body>
	<form  action="/?m=gbook&c=home&f=save&do=checking" method="post">
		<textarea name="content" style="width: 300px; height: 100px"></textarea>
		<input type="submit" value="提交留言">

	</form>

	<?php 
		foreach ($rows as $row):
	?>
	<div>

		第<?php echo $row['gid']; ?>条留言：
		<?php echo $row['content']; ?>

	</div>


		<?php
	endforeach;

	;?>


</body>
</html>