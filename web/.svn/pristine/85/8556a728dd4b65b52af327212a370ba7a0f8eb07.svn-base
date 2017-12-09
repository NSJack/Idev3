<?php
namespace core;
/**
 * 输出管理类
 */
class Output{

    public $js = array();
    public $css = array();

    function __construct(){
        $this->sd = &\core\SoDevel::getInstance();
    }
    
    /**
     * 获得一个模板文件的完整路径
     * @param  [type] $tplFileName [description]
     * @return [type]              [description]
     */
    function getFile( $tplFileName ){
        return TPL . $tplFileName . '.php';
    }

    /**
     * 输出一个网页
     * @param  [type]  $tplFileName [description]
     * @param  array   $data        [description]
     * @param  boolean $return      [description]
     * @return [type]               [description]
     */
    function view( $tplFileName, $data = array(), $return = false ){
        $file = $this->getFile( $tplFileName );
        if( file_exists( $file ) === false ){
            die("模板文件不存在：{$file}");
        }
        ob_start();
        extract( $data );
        include( $file );
        $content = ob_get_contents();
        ob_clean();
        if( $return ){
            return $content;
        }
        echo $content;
    }   

    /**
     * 跳转到指定网页，暂时只是简单的实现。
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    function redirect( $url, $code = '301' ){
        header("location: {$url}", true, $code);
        exit;
    }

    /**
     * 在当前网页加载自己的CSS文件
     * @param [type] $file [description]
     */
    function addCss( $file ){
        $this->css[ $file ] = true;
    }
    function getCss(){ return $this->css;}
    /**
     * 在当前网页加载自己的JS文件
     * @param [type] $file [description]
     */
    function addJs( $file ){
        $this->js[ $file ] = true;
    }
    function getJs(){ return $this->js;}

    // js alert提示框 
    function msg($text,$url){
        return "<script>alert('$text'),location.href='$url'</script>";
    }    
}