<?php
/**
 * @author: 小诺心
 * @time: 2017-2-15 06:58:55
 * 缓存测试代码
 */

namespace module\gbook;

class TestCache extends \core\Controller{

    public $data = false;

    function caches( $isRefresh = false ){
        if( $this->data === false || $isRefresh === true ){
            $this->data = $this->abc();
        }
        return $this->data;
    }

    function rows(){
        echo '1';
        //读写数据库的代码
        return '数据结果,';
    }

    function abc(){
        $sql = "SELECT * FROM webset";
        $set = $this->model()->get($sql);
        return $set;
        //dump($set);
    }

    function index(){
        /*echo $this->cache();
        echo $this->cache();
        echo $this->cache();
        echo $this->cache( true );
        echo $this->cache();
        echo $this->cache();
        echo $this->cache();
        echo $this->cache();
        echo $this->cache();

        echo "<br/><br/><br/><br/><br/>";*/

        $bbb = $this->abc();
        echo $bbb['webname'];
        echo "<br/><br/><br/><br/><br/>";
        echo $bbb['urlset'];

        echo "<br/><br/><br/><br/><br/>";

        //$data = $this->caches();

        //$res = &\core\Cache::getInstance();

        $config = array(
            'name' => 'xiaochun',
            'qq' => '123456',
            'age' => '17',
            'aaa' => '111',
        );

        $test = array(
            'name' => 'nuoxin',
            'qq' => '522859830',
            'age' => '17',
            'aaa' => '666',
        );
         
        //$res = &\core\lib\Cache::getInstance();
        //dump($this->cache('set'));
        //exit;
        $res = $this->cache();
        $load = $res->load('set');
        if ($load == false) {
            //生成缓存文件第一次使用
            $data = array(
                'name' => 'nuoxin',
                'qq' => '522859830',
                'age' => '17',
                'aaa' => '666',
            );
            //$data = $this->caches();
            echo "我是动态数据";
            dump($data);
            $res->save($data, 'set', 60);
        }else{
            //调用缓存文件里面的数据
            echo "我是缓存数据";
            dump($load);
        }
        exit;
        //$res->save($config, 'config', 0);
        //$res->save($test, 'test', 60);
        //$res->save($data, 'set', 60);

        //$res->del('set');
        //$res->clear();
        //exit;

        $my = $res->load('test'); //过期后显示false
        echo $my['name'];
        echo "<br/>";
        echo $my['qq'];
        echo "<br/><br/><br/>";
        dump($my);
        dump($my);

        $set = $res->load('set');
        echo "<br/><br/><br/>";
        echo $set['webname'];
        echo "<br/>";
        echo $set['urlset'];
        echo "<br/><br/><br/>";
        dump($set);
        dump($set);
    }
}