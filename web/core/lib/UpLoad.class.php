<?php
namespace core\lib;
/**
 * 文件上传功能，本地调试OK,远程调试报错，待解决--溜溜编写20161225
 */
class UpLoad extends \core\Controller
{

    /**
     * [文件上传功能]
     * @param  [type]  $file [通过POST传的file名称]
     * @param  integer $num  [特殊数字编号，解释见67行代码]
     * @return [type]返回信息如下：
     *   ["path"] => string(43) "文件保存路径"

     *   ["name"] => string(15) "上传成功的文件名"

     *   ["size"] => int(文件大小)

     *   ["error"] => int(错误代码信息)如果上传成功错误代码返回0；
     */
    
    /**
     * 生成随机数函数
     * @param  [type] $length [设置的随机数长度
     * @return [type] 返回随机数         
     */
    function random($length)
    {
        $captchaSource = "0123456789abcdefghijklmnopqrstuvwxyz这是一个随机打印输出字符串的例子";
        $captchaResult = "random"; // 随机数返回值

        for($i=0;$i<$length;$i++)
        {
            $n = rand(0, 35); #strlen($captchaSource));
            if($n >= 36)
            {
                $n = 36 + ceil(($n-36)/3) * 3;
                $captchaResult .= substr($captchaSource, $n, 3);
            }else{
                $captchaResult .= substr($captchaSource, $n, 1);
            }
        }
        return $captchaResult;
    }

    function upload_img($file,$num=21)
    {
        $upload_size = 1000000;//图像上传尺寸最大1MB；
        $upload_type = array(
            'image/jpg',
            'image/jpeg',
            'image/png',
            'image/gif',); //允许上传文件的类型
        $file = 
        $fi = $_FILES["$file"];
        $upload = array();
        //$upload = $fi;
        //return $upload;

        $file_tmppath = $fi['tmp_name'];
        $file_type = $fi['type'];
        $file_name = $fi['name'];
        $file_size = $fi['size'];
        $userid = $this->user['rid'];

        if($fi['error']>0)
        {            
            $upload['error'] = ("请重新上传，错误代码为：" . $fi['error']);
            return $upload;
        }

        $mi = new  \finfo(FILEINFO_MIME_TYPE);//本地调试OK,远程调试会报错，错误信息：/home/wwwroot/dev.sodevel.com/finfo.class.php 文件不存在
        $mime_type = $mi->file("$file_tmppath");
        //dump($mime_type);

        if(!in_array($file_type,$upload_type)||!in_array($mime_type,$upload_type))
        {
            $upload['error'] = "不支持此文件类型，请重新选择";
            return $upload;
        }

        if($file_size > $upload_size)
        {
            $upload['error'] = "上传文件不能超过1MB,请重新选择";
            return $upload;
        }

        $fn = explode(".",$file_name);
        $randomName = $this->random(10);
        //die(dump($fn));
        switch($num)
        {   //$num=11表示：文件保存在/data/upfile/header/imgTest/下，使用用户id作为文件名
            //$num=12表示：文件保存在/data/upfile/header/imgTest/下，使用文件本来的文件名
            //$num=21表示：文件保存在/data/upfile/header/imgUserUpload/下，使用用户id作为文件名
            //$num=22表示：文件保存在/data/upfile/header/imgUserUpload/下，使用文件本来的文件名
            //$num=31表示：文件保存在/data/upfile/header/other/下，使用用户id作为文件名
            //$num=32表示：文件保存在/data/upfile/header/other/下，使用文件本来的文件名

            case 11 : $file_path = '/data/upfile/header/other/'.$userid.".".$fn[1];break;
            case 12 : $file_path = '/data/upfile/header/other/'.$randomName.".".$fn[1];break;
            case 21 : $file_path = '/data/upfile/article_file/'.$userid.".".$fn[1];break;
            case 22 : $file_path = '/data/upfile/article_file/'.$randomName.".".$fn[1];break;
            case 31 : $file_path = '/data/upfile/header/'.$userid.".".$fn[1];break;
            case 32 : $file_path = '/data/upfile/header/'.$randomName.".".$fn[1];break;
            case 66 : $file_path = '/data/upfile/advert/'.$randomName.".".$fn[1];break;
            case 42 : $file_path = '/data/upfile/courier/'.$randomName.".".$fn[1];break;//小师弟(m)
        }
        //die(dump($file_path));

        if(!move_uploaded_file($file_tmppath,PATH .$file_path))
        {
            $upload['error'] = "上传失败，请重新选择";
            return $upload;
        }

        $upload['path'] = $file_path;
        $upload['name'] = $file_name;
        $upload['size'] = $file_size;
        $upload['error'] = 0;
        return $upload;
    }

}