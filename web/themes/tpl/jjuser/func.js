function info (id,icon,msg,show) {
	//拼接选择器，不先拼接的话会出错。
	str=id+" p";		
	//设置提示信息
	$("#regForm ."+str).html(msg);
	
	if(icon=='green'){//绿色通过图标
		str=id+" span";
		$("#regForm ."+str).html("√");
		$("#regForm ."+str).css({'background':'green'});
	}else{//红色不通过图标
		str=id+" span";
		$("#regForm ."+str).html("!");
		$("#regForm ."+str).css({'background':'#f83450'});				
	}

	//显示还是隐藏
	if(show){
		$("#regForm ."+id).css({'visibility':'visible'});
		//显示时加个动画效果
		$("#regForm ."+str).stop().animate({'width':'40px'},300,function () {
			$(this).animate({'width':'20px'},100)
		});
	}else{
		$("#regForm ."+id).css({'visibility':'hidden'});
	}
}//info函数结束