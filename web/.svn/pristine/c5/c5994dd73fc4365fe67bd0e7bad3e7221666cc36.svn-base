<!--添加收货地址-->

<script>

 $(document).ready(function() {  
 
    //获取市的AJAX
    $("#provinces").change(function() { 

        $.ajax({  
            type: "get",  
            url: "?m=user&c=UserAddress&f=address", 
            data: {"father_id": $(this).val()}, 
            success: function(data) { 

                //var arr = eval("("+ data+")");
                var arr = JSON.parse(data);

                var str = "<option value=''>请选择市</option>"; 

                for(var i in arr)
                {
                    str += "<option value='"+arr[i].id+"'>"+arr[i].name+"</option>";
                }
                $("#citys").html(str);

            }    
        });

    });  

    //获取区的AJAX
    $("#citys").change(function() { 

        $.ajax({  
            type: "post",  
            url: "?m=user&c=UserAddress&f=city",  
            data: {"father_id": $(this).val()}, 
            success: function(data) {

                //var arr = eval("("+ data+")");
                var arr = JSON.parse(data);
                var str = ""; 
                for(var i in arr)
                {
                    str += "<option value='"+arr[i].id+"'>"+arr[i].name+"</option>";
                }
                $("#countys").html(str);

            }    
        });  

    });  

    $("#vick_btn").click(function(){

        if( $("#addres_name").val() == " "  || $("#addres_tel").val() == " "  )
        {
            
            return false;
        }

    });


 }); 
</script>





<div class='row vick_bg'>
    <div class="col-sm-10 col-sm-offset-1 vick_main">
        
 <?php include ('user_glob.php'); ?>
        
        <div class="col-sm-10">
            
            <div id="myTabContent" class="tab-content">
                <h3>添加收货地址</h3> 
                <form action="?m=user&c=UserAddress&f=save" method="post">
                    <div class="row col-sm-11 col-sm-offset-1" style="padding-top: 5%;">
                        <div class="form-group ">
                            <label for="addres_name" class="col-sm-2 control-label">名字</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " id="addres_name" name="addres_name" placeholder="请输入名字">
                            </div>
                        </div>
                    </div>  

                    <div class="row col-sm-11 col-sm-offset-1"  style="padding-top: 2%;">
                        <div class="form-group ">
                            <label for="addres_tel" class="col-sm-2 control-label">手机号码</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " id="addres_tel" name="addres_tel" placeholder="请输入手机号码">
                            </div>
                        </div>
                    </div>  
                    <div class="docs-methods col-sm-11 col-sm-offset-1" style="padding-top: 2%;">
                    <div class="col-sm-2"><b>收货地址</b></div>
                        <div id="distpicker" class="form-inline col-sm-10">
                            
                            <div>  
                          
                                <select id="provinces" name="provinces">  
                                    <option>请选择省</option> 
                                    <?php foreach ($region_row as $val) {?>
                                        <option name="provinces" value="<?php echo $val['id'] ;?>">
                                            <?php echo $val['name'] ;?>
                                        </option>
                                    <?php }?>

                                </select>  
                                 
                                <select id="citys" name="citys">  
                                    <option value="">请选择市</option>  
                                </select>  
                                
                               
                                <select id="countys" name="countys">  
                                    <option value="">请选择县</option>  
                                </select> 

                            </div> 
                        </div>
                    </div>
                    <div class="row col-sm-10 col-sm-offset-1" style="padding-top: 2%;">
                        <div class="form-group col-sm-2" >
                            <label for="add_message" class="  control-label"><b>详细地址</b></label>
                        </div>
                        <div class="col-sm-9" >
                            <textarea class="form-control " id="add_message" name="add_message" rows="3"></textarea>
                        </div>
                    </div>
                    <div class=" col-sm-6 col-sm-offset-3" style="padding-top: 2%; padding-left:160px;">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="vick_btn">确定</button>
                    </div>
                </form>


            </div>
        </div>
        
    </div>
</div>