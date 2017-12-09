<?php
/**
 *
 * 什么是缓存，有什么用。
 * 
 * 变量缓存
 * 文件缓存
 * 内存缓存
 * 分布式缓存
 *
 * 其他：浏览器缓存
 *
 * 特点：非实时
 */

namespace module\gbook;

class Cache extends \core\Controller{

    public $data = false;

    function cache( $isRefresh = false ){
        if( $this->data === false || $isRefresh === true ){
            $this->data = $this->rows();
        }
        return $this->data;
    }

    function rows(){
        echo '1';
        //读写数据库的代码
        return '数据结果,';
    }

    function index(){
        echo $this->cache();
        echo $this->cache();
        echo $this->cache();
        echo $this->cache( true );
        echo $this->cache();
        echo $this->cache();
        echo $this->cache();
        echo $this->cache();
        echo $this->cache();
    }
}