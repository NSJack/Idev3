<?php
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style type="text/css">
	#outDiv{
		width:500px;
		margin: 10px auto;
	}
	
	#urlP{
		font-size: 14px;
		color: grey;
	}
	
	span{
		color: dodgerblue;
		font-size: 16px;
	}
</style>
<body>
	<div id="outDiv">
	    <h1><?php echo $data['info']; ?></h1>
	    <p id='infoP'>&nbsp;</p>
	    <p id='urlP'></p>
    </div>
    
    
</body>
</html>

<script type="text/javascript">
	var p=document.getElementById('infoP');
	var urlP=document.getElementById('urlP');
	urlP.innerHTML="如果你的浏览器没有自动跳转，请<a href='<?php echo $data['url'] ?>'>点击这里</a>手动跳转";
	var time=5;
	var timer=setInterval(
		function(){
			p.innerHTML=time + "秒后，将跳转到<span><?php echo $data['pageName']?></span>" ;
			
			if(time==0){
				clearInterval(timer);
				location.replace("<?php echo $data['url'] ?>")
			}
			time--;
		}
		,1000
	)
	
	
</script>