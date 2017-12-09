<!--设置账户信息-->
<script>

    //性别
$(document).ready(function(){
        <?php if ($row['sex'] == "1") { ?>
            $("#sex1").attr("checked",true);
        <? }else{?>
            $("#sex2").attr("checked",true);
        <?php } ?>

    //爱好

    $("#hobby").val("<?echo $row['hobby'];?>").add("selected",true);

    });
    
</script>







<div class='row vick_bg'>
    <div class="col-sm-10 col-sm-offset-1 vick_main">

    <?php include ('user_glob.php'); ?>

        <div class="col-sm-10">
            <div id="myTabContent" class="tab-content">
                <h3>设置账户信息</h3>

                <form class="form-horizontal col-sm-9 col-sm-offset-2" role="form" action="?m=user&c=UserInfo&f=save" method="post">
                    <div class="row">
                    <div class="col-sm-8"  style="padding-top:20px;">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label" style="line-height:31px;" >用户名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>"  readonly = "readonly">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tel" class="col-sm-2 control-label" style="line-height:31px;">电话号</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $row['tel']; ?>" readonly = "readonly">
                            </div>
                        </div>


                        <div class="radio" style="margin: 5px 0px;">
                            <div class="col-sm-2">
                                <span style="padding-left: 30px;"><b>性别</b></span>
                            </div>
                            <div class="col-sm-10">
                                <label>
                                    <input type="radio" name="sex" id="sex1" value="1"> 男
                                </label>
                　　
                                <label>
                                    <input type="radio" name="sex" id="sex2" value="2" >女
                                </label>
                            </div>
                        </div>

                        <div class="form-group">    
                            <label for="hobby" class="checkbox-inline col-sm-2 control-label"><b>爱好</b></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="hobby" id="hobby" value="hobby">
                                    <option value="1">羽毛球</option>
                                    <option value="2">抽烟</option>
                                    <option value="3">喝酒</option>
                                    <option value="4">烫头</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center" style="width: 28%;">
                        <div class="thumbnail"  style="width:120px;height: 120px;margin-bottom: 5%;">
                           <img src="<?php  echo $row['thumbfile']; ?>" alt="用户头像"  style="max-width: 100%;max-height:100%;padding:5px;position: relative;top: 50%;transform: translateY(-50%);">
                        </div>
                        <a href="?m=user&c=UploadFile" class="btn btn-primary" role="button" style="color:#fff;">修改头像</a>
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2" style="padding-left: 40px;">
                            <label for="message" class="  control-label"><b>其他信息</b></label>
                        </div>
                        <div class="col-sm-10"  style="padding-left: 10px;">
                            <textarea class="form-control " id="message" name="message" rows="3"><?php echo $row['message']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group"  style="margin-top:10px;">
                        <div class="col-sm-5 col-sm-offset-4  text-center">
                            <button type="submit" id="submit" class="btn btn-primary btn-lg btn-block">确认确定</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
    </div>
</div>

