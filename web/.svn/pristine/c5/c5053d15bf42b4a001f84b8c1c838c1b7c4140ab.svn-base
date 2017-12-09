<?php
namespace core\lib;
/**
 * 文件上传功能
 * 2017年5月30日   我怀念
 * @param  string  $name    表单中的name值
 * @param  string  $path    图片保存的文件夹名字  data/upfile/下面新创建的文件夹名
 * 
 */
class UpLoadDev3
{
    public $upload = array();
    public $image;


    public function __construct($name,$path,$imgname=NULL)
    {

        $file   =   $_FILES[$name];
        
        if($file['error'] > 0)
        {
            $this->upload['message'] =  $file['error'];
            exit("上传失败");
        }
        
        //判断字节是否符合要求
        $this->maxSize( $file );

        //获取上传图片的后缀名
        $ext = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));

        //判断后缀名是否允许
        $this->allowExt( $ext );
       
        //图片保存目录
        $new_path = "data/upfile/" . $path . "/";
        
        //生成新的图片名字，可选自定义
        $this->imgName($imgname,$new_path,$ext);

        //文件夹是否存在，不存在则创建
        $this->myMkdir($file,$new_path);

        //图片GD库的相关信息
        $this->imgGd();
        
        //return $this->upload;
    }



    //上传图片最大字节判断
    protected function maxSize($file)
    {

        //设置最大字节
        $upload_size = 1024000;
        
        //获取上传图片的字节
        $file_size = $file['size'];
        $this->upload['size'] = $file_size;

        if( $this->upload['size'] > (int) $upload_size )
        {
            $this->upload['message'] = "上传图片超过限制";
            exit("上传图片超过限制");
        }

    }



    //允许的后缀名
    protected function allowExt($ext)
    {
        
        $allow_ext = array('png','gif','jpg');

        $this->upload['allow_ext'] = $allow_ext;

        if( !in_array( $ext,$this->upload['allow_ext'] ))
        {
            $this->upload['message'] = " 后缀名不允许上传,请联系管理员 ";
            exit(" 后缀名不允许上传,请联系管理员! ");
            //return 

        }

    }



    //上传图片的名字
    protected function imgName($imgname,$new_path,$ext)
    {

        //图片的名字
        if( $imgname == NULL ){
            //随机4位数字
            $rand = rand(1000,9999);
            //时间戳微秒数MD5加密
            $t    = md5(microtime());
            $new_name = $rand . $t;
            
        }else
        {
            //图片的名字
            $new_name = $imgname;
            
        }
        $this->upload['new_name'] = $new_name;

        //拼接的完整路径 路径+图片名
        $new_loc = $new_path . $this->upload['new_name'] .".". $ext;
        $this->upload['new_loc'] = $new_loc;

    }



    //判断文件夹是否存在，不存在则创建并移动图片到指定目录下
    protected function myMkdir($file,$thumb_path)
    {
        
        if(!file_exists($thumb_path))
        {  
            mkdir($thumb_path,0777); 
        }

        //移动图片
        $is = move_uploaded_file($file["tmp_name"],$this->upload['new_loc']);
        if( $is )
        {
            $this->upload['message'] = "上传成功";
        }else
        {
            $this->upload['message'] = $file['error'];
            exit("创建目录失败");
        }

    }



    //图片 GD 库相关信息
    protected function imgGd()
    {

        //GD库 查看图片的信息
        @$info = getimagesize($this->upload['new_loc']);
        
        //判断上传的是否是图片
        if( !is_array($info) )
        {

            $this->upload['message']   = "上传的不是图片";
            exit("上传的不是图片");
            
        }else
        {
            //保存图片相关GD库信息
            $this->upload['origwidth']     =  $info[0];
            $this->upload['origheight']    =  $info[1];
            $this->upload['mime']          =  $info['mime'];
            $this->upload['ext']           =  image_type_to_extension($info[2],false);

            $fun = "imagecreatefrom{$this->upload['ext']}";
            
            $this->image = $fun($this->upload['new_loc']);
        }

    }

   

    /**
     * 缩略图
     * string  $width   缩略图宽度
     * string  $height  缩略图高度
     */
    public function thumb($width,$height)
    {

        $ratio_orig = $this->upload['origwidth']/$this->upload['origheight'];

        if ($width/$height > $ratio_orig) {
           $width = $height*$ratio_orig;
        } else {
           $height = $width/$ratio_orig;
        }

        //创建真色彩图片,相当于创建画布
        $image_thumb = imagecreatetruecolor($width,$height);

        //等比缩放  imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )
        imagecopyresampled($image_thumb,$this->image,0,0,0,0,$width,$height,$this->upload['origwidth'],$this->upload['origheight']);
        //销毁内存中创建的图片
        imagedestroy($this->image);
        $this->image = $image_thumb;

    }


    
    /**
     * 保存缩略图到指定文件夹下
     * string  $path   缩略图保存的文件夹名字  data/upfile/下面新创建的文件夹名
     */
    public function save($path)
    {

        $thumb_loc = "data/upfile/" . $path ."/".$this->upload['new_name'] ."_thumb.".$this->upload['ext'] ;
        
        $this->upload['thumb_name'] = $this->upload['new_name'] ."_thumb";
        $this->upload['thumb_loc'] = $thumb_loc;

        $thumb_path = "data/upfile/" . $path ."/";

        $func = "image{$this->upload['ext']}";
        //保存图片
        $func($this->image, $this->upload['thumb_loc']);

    }

    

    /**
     * 文字水印
     * string  $fontsize    字体的大小
     * string  $x           距左面的距离
     * string  $y           距上面的距离
     * array   $col         文字的颜色  rgb三原色
     * string  $mesg        水印的内容
     * string  $opac        透明度
     */
    public function txtMark($fontsize,$x,$y,$col,$mesg,$opac)
    {

        //图片处理
        $font = PATH . "/themes/js/msyh.ttf";

        //$col = imagecolorallocatealpha($this->image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255), 50);
        $col = imagecolorallocatealpha($this->image, $col[0], $col[1], $col[2], $opac);

        imagettftext($this->image, $fontsize, 0, $x, $y, $col, $font, $mesg);

    }

    

    /**
     * 图片水印
     * string  $src         水印图片
     * string  $x           距左面的距离
     * string  $y           距上面的距离
     * array   $opac        透明度
     */
    public function imgMark($src,$x,$y,$opac)
    {

        $info = getimagesize($src);

        $type = image_type_to_extension($info[2],false);

        $fun  = "imagecreatefrom{$type}";
        $image2 = $fun($src);

        imagecopymerge($this->image,$image2,$x,$y,0,0,$info[0],$info[1],$opac);

        imagedestroy($image2);

    }



    //页面显示上传的图片
    public function show()
    {

        header("Content-type:" . $this->upload['mime']);
        $func = "image{$this->upload['ext']}";
        $func($this->image);

    }


    
    //销毁图片
    public function __destrcut()
    {

        imagedestroy($this->image);

    }


}