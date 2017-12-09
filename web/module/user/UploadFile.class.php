<?php

/*
 * 上传图片
 */

namespace module\user;


class UploadFile extends \core\Controller{
    function index()
    {
        $data = array();
        $id = $this->input()->session('id');
        $row = $this->model()->get("SELECT * FROM user_info WHERE user_id = '{$id}'");
        $data['row'] = $row;

        $this-> fw("/user/user_header",$data);

    }
    function uploadHead()
    {
        $id  = $this->input()->session('id');

        $obj = new \core\lib\UpLoadDev3("photo","header",$id);
        
        //使用缩略图
        $obj->thumb(200,200);

        //使用文字水印
        //$col = array(0,255,0);
        //$obj->txtMark("20","10","50",$col,"聚美优品","50");

        //使用图片水印
        //$obj->imgMark("themes/img/logo.png","30","80","20");
        
        //保存缩略图
        $obj->save('header');
        
        $upload = $obj->upload;

        //$obj->show();exit;
        //var_dump($upload);exit;


      
        //上传成功跟新数据库用户头像
        if( $upload["message"] == 0 )
        {
            $newloc = $upload["new_loc"];
            $thumbloc = $upload["thumb_loc"];
            $sql = "UPDATE `user_info` SET `file`='{$newloc}', `thumbfile`='{$thumbloc}' WHERE (`user_id`='{$id}') LIMIT 1";
            $insert_id = $this->model()->update($sql);
            $this -> output()->redirect("?m=user&c=UploadFile");
        }

       
    }
}
