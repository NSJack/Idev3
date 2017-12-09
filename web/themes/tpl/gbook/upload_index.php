<!DOCTYPE html>
<html>
<head>
    <title>测试文件上传功能</title>
</head>
<body>
    <div>
    <form enctype="multipart/form-data" method="post" action="/?m=gbook&c=TestUpload&f=upload">
        <input type="file" name="file" />
        <input type="submit" name="submit" value="上传" class='img_submit'/>
    </form>
    <div/>

    <div style="width:600px;">
        <h3>上传的图像如下(鼠标停在图像显示路径，单击图片可删除)：</h3>
        <br/>
        <?php foreach($imgpath as $value){?>

        <a href="/?m=gbook&c=TestUpload&f=delete&imgid=<?php echo $value['imgid'] ?>"><img src="<?php echo $value['img_path'];?>" width=150px height=150 alt=<?php echo $value['img_path']?> /></a>

        <?php } ?>
    </div>
</body>
</html>