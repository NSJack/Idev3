<?php
/**
 * 商品详细页
 */
namespace module\liulin;
session_start();

class WaresPage extends \core\Controller{
    
    function index(){
        
    }
    //商品详细页显示
    function warespage(){
        $data = array();
        $gid  = $this->input()->get('gid');
        $sql  = "select * from goods where gid = '{$gid}' ";
        $rows = $this->model()->get($sql);
        $data['rows'] = $rows;
        
        $sql            = "select * from goods_msg order by mid desc limit 3";
        $re             = $this->model()->gets($sql);
        //$data['rows']   = $rows;//通过data数组就可以在模板里面调用*/
        $data['re']     =$re;

       // $gid        =$this->input()->get();
        $sql            ="select * from goods_imgs where gimg_id='{$gid}' ";
        $imgs           =$this->model()->get($sql);
        $data['imgs']   =$imgs;

        $WaresPage = $this->fw("/liulin/waresPage", $data);
        $_SESSION['WaresPage']=$WaresPage;
    }

    //商品评价
/*    function msg(){
        $WaresPage = "/liulin/waresPage";
        $id = $_SESSION['id'];
        if( $id ){
            $this->fw($WaresPage);

            $content = $this->input()->post('content');
            if( !empty($content) ){
                $sql = "INSERT INTO goods_msg(content) values ('{$content}')";
            }else{
                echo "content not empty";
            }
            
            $gid = $this->model()->insert($sql);

            header("location:/?m=liulin&c=WaresPage&f=waresPage&gid='{$gid}' ");
        }else{
            return $this->output()->redirect('/?m=user&c=Login');
       }
       

    }
*/
    function writemsg(){
        $data = array();
        $sql            = "select * from goods_msg order by mid desc limit 3";
        $re             = $this->model()->gets($sql);
        //AJAX star
        $check  = $this->input()->post('check');
        var_dump($check);
        $data['check']   = $check;//通过data数组就可以在模板里面调用*/
        $data['re']     =$re;
        $content = $this->input()->post('content');
            if( !empty($content) ){
                $sql = "INSERT INTO goods_msg(content) values ('{$content}')";
            }else{
                echo "content not empty";
            }
            
            $gid = $this->model()->insert($sql);

        //echo json_encode($data);

        $this->fw('/liulin/writeMsg', $data);
    }

}
