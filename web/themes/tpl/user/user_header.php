

<div class='row vick_bg'>
    <div class="col-sm-10 col-sm-offset-1 vick_main">
        
 <?php include ('user_glob.php'); ?>
        
        <div class="col-sm-10">
            
            <div id="myTabContent" class="tab-content">
                <h3>上传头像</h3>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-3">
                        <div class="thumbnail "  style="width:200px;height:200px;padding: 2px;">
                            <img src="<?php echo $row['thumbfile'] ?>" alt="用户头像"  style="max-width: 100%;max-height: 100%;position: relative;top: 50%;transform: translateY(-50%);">
                        </div>
                    
                        <form action="?m=user&c=UploadFile&f=uploadHead" method="post" enctype="multipart/form-data">
                        <label for="file">上传头像:</label>
                        <input  type="file" name="photo" id="file" /> 
                        <br />
                        <input class="btn btn-primary" type="submit" name="submit" value="提交" />
                        </form>
                    </div>
                </div>


            </div>
        </div>
        
    </div>
</div>