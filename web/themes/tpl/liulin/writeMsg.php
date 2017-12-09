
<div class="container" style="margin-top: 20px">
	<div class="row">
		<div class="col-md-1" style="border: 2px;
		"></div>

		<div class="col-md-10" style="border: 2px;background: #f7f7f7;">

			<div style="width: 75%;height: 180px;border: 2px solid black;margin: 10px 105px;">
				<div style="width: 30%;height: 100%;border: 2px solid black;float: left;padding: 20px;">
					<p>用户头像</p>
					<p>用户名称</p>		
				</div>
				<div style="width: 70%;height: 100%;border: 2px solid black;float: left;padding: 20px;">
					
				</div>
			</div>

			
			<div id="msg">
				
				<div style="width: 100%;padding: 20px;">
					
					<div style="width: 75%;height: 180px;border: 2px solid black;margin: 10px 105px;">
						<div style="width: 30%;height: 100%;border: 2px solid black;float: left;padding: 20px;">
								<p>商品图片</p>
								<p>商品名称</p>

						</div>
						<div style="width: 70%;height: 100%;border: 2px solid black;float: left;padding: 20px;">
								
						</div>
					</div>

					<div style="width: 75%;margin: 10px 105px;">

					
						<div class="panel panel-default" style="width: 75%;margin: 10px 85px;" >
							
							<form  id="msg" action="/?m=liulin&c=WaresPage&f=writemsg" method="post" style="margin-top: 20px;">
								
									<p>可以评价的商品星星</p>  
									<div>  
								        <a href="javascript:click(1)"><img src="/themes/tpl/liulin/img/star.png" id="star1" onMouseOver="over(1)" onMouseOut="out(1)"/></a>  
								        <a href="javascript:click(2)"><img src="/themes/tpl/liulin/img/star.png" id="star2" onMouseOver="over(2)" onMouseOut="out(2)" /></a>  
								        <a href="javascript:click(3)"><img src="/themes/tpl/liulin/img/star.png" id="star3" onMouseOver="over(3)" onMouseOut="out(3)" /></a>  
								        <a href="javascript:click(4)"><img src="/themes/tpl/liulin/img/star.png" id="star4" onMouseOver="over(4)" onMouseOut="out(4)"/></a>  
								        <a href="javascript:click(5)"><img src="/themes/tpl/liulin/img/star.png" id="star5" onMouseOver="over(5)" onMouseOut="out(5)"/></a>  
								        <span id="message"></span>  
								    </div>	
																
								<textarea class="form-control" rows="3" name="content" style="height: 100px"></textarea>
								<input type="submit" value="提交留言" style="background: pink;width: 92px;height: 43px;margin: 10px;">
							</form>

						</div>
					</div>
					
				</div>
			</div>
			

		</div>

		<div class="col-md-1" style=""></div>
	</div>
</div>
<script type="text/javascript">  
var check = 0;//该变量是记录当前选择的评分  
var time = 0;//该变量是统计用户评价的次数，这个是我的业务要求统计的（改变评分不超过三次），可以忽略  
  
/*over()是鼠标移过事件的处理方法*/  
function over(param){  
    if(param == 1){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");//第一颗星星亮起来，下面以此类推  
        $("#message").html("很差");//设置提示语，下面以此类推  
    }else if(param == 2){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#message").html("比较差");  
    }else if(param == 3){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#message").html("一般");  
    }else if(param == 4){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star4").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#message").html("比较好");  
    }else if(param == 5){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star4").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star5").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#message").html("很好");  
    }  
}  
/*out 方法是鼠标移除事件的处理方法，当鼠标移出时，恢复到我的打分情况*/  
function out(){  
    if(check == 1){//打分是1，设置第一颗星星亮，其他星星暗，其他情况以此类推  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star4").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star5").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#message").html("");  
    }else if(check == 2){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star4").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star5").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#message").html("");  
    }else if(check == 3){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star4").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star5").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#message").html("");  
    }else if(check == 4){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star4").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star5").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#message").html("");  
    }else if(check == 5){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star4").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#star5").attr("src","/themes/tpl/liulin/img/star_red.png");  
        $("#message").html("");  
    }else if(check == 0){  
        $("#star1").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star2").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star3").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star4").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#star5").attr("src","/themes/tpl/liulin/img/star.png");  
        $("#message").html("");  
    }  
}  
/*click()点击事件处理，记录打分*/  
function click(param){  
    time++;//记录打分次数  
    var check = param;//记录当前打分  
    out();//设置星星数  
    $.ajax({
					//请求的URL
					url:"?m=liulin&c=WaresPage&f=writemsg",
					//请求的类型
					type:'post',
					//同步或异步
					async:true,
					//执行之前先执行
					beforeSend:function(){
						console.log("准备发起请求");
					},
					//是否缓存此页面
					cache:false,
					//请求完成后执行
					complete:function(){
						console.log("请求完成");
					},
					//向服务器端发送数据
					data:{'check':check},
					//服务器返回的数据类型
					//dataType:'json',
					//错误执行
					error:function(obj,err,errobj){
						//console.log(check);
						console.log("error:",err);
					},
					//成功执行
					success:function( data ){	
						console.log(check);
					},
					timeout:5000,
				});
}  
</script>  