<?php
namespace core;

/**
 * 网址控制器，大家编写的模块都应该继承该类
 *
 * 该模块会将部分 SoDevel 类的核心常用方法复制过来，以便于大家操作。
 */
class Controller{
    function __construct(){
        $this->sd = &\core\SoDevel::getInstance();
    }

    /**
     * 获取系统配置项
     * @param  boolean $item [description]
     * @return [type]        [description]
     */
    function config( $item = false ){
        return $this->sd->config( $item );
    }

    /**
     * 获得输入对象
     * @return [type] [description]
     */
    function input(){
        return $this->sd->input();
    }

    /**
     * 获得输出对象
     * @return [type] [description]
     */
    function output(){
        return $this->sd->output();
    }

    /**
     * 获得数据模型对象，暂时就直接提供SQL的标准写入吧
     * @return [type] [description]
     */
    function model(){
        return $this->sd->model();
    }
    /**
     * 输出网页模板，该方法来自于sodevel->output
     * @param  [type]  $tplFileName [description]
     * @param  [type]  $data        [description]
     * @param  boolean $return      [description]
     * @return [type]               [description]
     */
    function view( $tplFileName, $data, $return = false  ){
        return $this->output()->view( $tplFileName, $data, $return );
    }

    /**
     * 带框架的加载模板方法
     * @param  [type]  $tplFileName [description]
     * @param  array   $data        [description]
     * @param  boolean $return      [description]
     * @return [type]               [description]
     */
    function fw( $tplFileName, $data = array(), $return = false ){
        $fw_data = array();
        //输出框架头部的代码
        $header_data = array();
        $fw_data['header']   = $this->view( '/glob/header', $header_data, true );
        //输出每个子模板特有的代码
        $fw_data['body']     = $this->view( $tplFileName, $data, true );

        //输出框架底部的代码
        $footer_data = array();
        $footer_data['sqls'] = $this->model()->getSql();
        $fw_data['footer']   = $this->view( '/glob/footer', $footer_data, true );
        return $this->view( '/glob/fw', $fw_data, $return );
    }



}