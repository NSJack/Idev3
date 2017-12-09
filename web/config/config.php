<?php

// 关于系统的配置放这里

# 数据库配置信息
$config['db'] = array(
        'host'  => '139.196.185.79',
        'user'  => 'dev3_sodevel',
        'pass'  => 'dev3_0509',
        'dbname'=> 'dev3_sodevel',
    );

//默认控制器指向的模块、类、方法
$config['cmf'] = array(
        'c' => 'plc',
        'm' => 'Home',
        'f' => 'index'
    );


return $config;