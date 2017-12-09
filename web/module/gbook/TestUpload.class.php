<?php
namespace module\gbook;
/**
 * 测试文件上传功能--溜溜写20161224
 */
class TestUpload extends \core\Controller
{
    /**
     * [index 将上传的图片实时显示在html页面中]
     * @return 
     */
    function index()
    {
        //parent:: __construct();
        $sql = "SELECT * FROM imgTest";
        $result = $this->model()->gets($sql);
        //dump($result);exit;

        $data = array();
        $data['imgpath'] = $result;
        $this->view('/gbook/upload_index',$data);
    }

    /**
     * [upload 执行文件上传操作，将图片路径更新到数据表中]
     * @return 
     */
    function upload()
    {
        $upload = new\core\lib\UpLoad();
        $imginfo = $upload->upload_img('file',22);
        if(!$imginfo['error'])
        {
            //die(dump($imginfo));
            $sql="INSERT INTO imgTest (`img_path`) values ('{$imginfo['path']}')";
            $this->model()->update($sql);

            $this->output()->redirect( "/?m=gbook&c=TestUpload");
        }

        echo $imginfo['error'];exit;
    }

    /**
     * [delete 执行图片删除操作]
     * @return [type] [description]
     */
    function delete()
    {
        $id = $this->input()->get('imgid');
        $sql = "DELETE FROM imgTest WHERE imgid ='{$id}'";
        $this->model()->query($sql);

        $this->output()->redirect( "/?m=gbook&c=TestUpload");
    }
}