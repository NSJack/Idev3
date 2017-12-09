<?php

# 强制显示所有错误
error_reporting(E_ALL);

# 定义时区
date_default_timezone_set('PRC');

# 定义HTTP传输字符集
header('Content-Type: text/html; charset=utf-8');

# 调试模式
define("DEBUG", true);

# 定义程序的硬盘路径常量
define('PATH', dirname(__FILE__));

# 定义URL前缀（域名部分）
define('HOST', 'http://'. $_SERVER['HTTP_HOST']);

# 前端UI文件的网址路径
define('THEMES', HOST . '/themes');

# UI模板的路径
define( 'TPL', PATH . '/themes/tpl' );

# 加载系统核心类
include( PATH . '/core/SoDevel.class.php' );

# 启动系统
$sd = \core\SoDevel::getInstance();
$sd->init();