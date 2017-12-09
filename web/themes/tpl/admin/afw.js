	$(function () {
	
		//配置左侧功能列表显示
		var leftObj =
		{
			["liAuser"]:[//中括号，表示它是个个数组，取值也用方括号
				{"cname":"新增管理员","url":"/?m=admin&c=Auser&f=showAdd"}, //大括号，表示它是个对象，取值用 .
				{"cname":"管理员管理","url":"/?m=admin&c=Auser&f=showList"},
				{"cname":"登陆日志","url":"/?m=admin&c=Auser&f=showLog"},
			],
			
			["liOption"]:[
				{"cname":"系统设置","url":"/?m=admin&c=Option&f=index"}, 

			],	
					
			["liGoods"]:[
				{"cname":"商品列表","url":"/?m=admin&c=Goods&f=listGoods"},
				{"cname":"商品分类","url":"/?m=admin&c=Goods&f=category"}, 

			],
			
			["liUser"]:[
				{"cname":"新增用户","url":"/?m=admin&c=User&f=addUser"}, 
				{"cname":"用户管理","url":"/?m=admin&c=User&f=listUser"},

			],									
		}
		
		//页面刷新后，显示上次的左侧列表
		var lastMenu=getCookie('btnId');
		if (lastMenu != ''){
			var s="#" + lastMenu;
			$(s).attr('class','active');;
			for(i in leftObj[lastMenu]){	
				var taga="<a href=' "+ leftObj[lastMenu][i].url + " ' class='list-group-item list-group-item-info'>"+leftObj[lastMenu][i].cname+"</a>";
				$("#left").append(taga);
			}			
		}		
		
		//当点击顶部导航按钮时
		$("#ulNav li").click(function () {

			//当前按钮选中的效果
			$("#ulNav li").attr('class','');
			$(this).attr('class','active');
			
			//获得当前按钮的id值
			var btnId= $(this).attr('id');
			
			setCookie('btnId',btnId);
			//先清空左侧列表
			$("#left").html('');

			//循环输出左侧列表	id值正好和json的值一一对应
			for(i in leftObj[btnId]){	
				var taga="<a href=' "+ leftObj[btnId][i].url + " ' class='list-group-item list-group-item-info'>"+leftObj[btnId][i].cname+"</a>";
				$("#left").append(taga);

			}
		})
		
		
	function setCookie(cname,cvalue,exdays){
		var d = new Date();
		d.setTime(d.getTime()+(exdays*24*60*60*1000));
		var expires = "expires="+d.toGMTString();
		document.cookie = cname+"="+cvalue+"; "+expires;
	}
	function getCookie(cname){
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i].trim();
			if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		}
		return "";
	}
		
	})