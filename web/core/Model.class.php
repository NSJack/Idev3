<?php
namespace core;

/**
 * 数据模型类，它还非常不完善，但是功能足够使用。
 * 更多的功能需要交给同学们去完善。
 *
 * @author wll <20161129>
 */
class Model{

    # 当前链接状态，默认为false
    protected $mysqli;
    protected $sqls = array();

    function __construct( $config ){
        $this->config = & $config;
        if( !$this->mysqli ){
            $this->connect();
        }
    }

    /**
     * 链接数据库
     * @return [type] [description]
     */
    function connect(){
        $this->mysqli = new \mysqli( $this->config['host'] , $this->config['user'], $this->config['pass'], $this->config['dbname']);

        /*
         * This is the "official" OO way to do it,
         * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
         */
        if ($this->mysqli->connect_error) {
            die('Connect Error (' . $this->mysqli->connect_errno . ') '
                    . $this->mysqli->connect_error);
        }
        //20170103 wll
        $this->query("SET NAMES UTF8");
    }

    /**
     * 执行一条SQL语句
     * @param  [type] $sql [description]
     * @return [type]      [description]
     */
    function query( $sql ){
        $result = $this->mysqli->query( $sql );
        $this->sqls[] = $sql;
        return $result;
    }

    /**
     * 执行一条更新的SQL语句，其实和query() 方法没有任何区别
     * @param  [type] $sql [description]
     * @return [type]      [description]
     */
    function update( $sql ){
        return $this->query( $sql );
    }

    /**
     * 执行一条SQL语句，并且返回插入数据的自增值
     * @param  [type] $sql [description]
     * @return [type]      [description]
     */
    function insert($sql){
        $result = $this->query( $sql );
        if( !$result ){
            return false;
        }
        return $this->mysqli->insert_id;
    }

    /**
     * 执行SQL，获得一条数据
     * @param  [type] $sql [description]
     * @return [type]      [成功返回ARRAY 失败返回FALSE]
     */
    function get( $sql ){
        $rows = $this->gets( $sql );
        return isset($rows[0]) ? $rows[0] : false;
    }

    /**
     * 执行SQL语句并获取多条数据
     * @param  [type] $sql [description]
     * @return [type]      [永远返回ARRAY]
     */
    function gets( $sql ){
        $result = $this->query( $sql );
        if( $result ===false ){
            die("无效的SQL语句：{$sql}");
        }
        $rows = array();
        while( $row = $result->fetch_array(MYSQLI_ASSOC) ){
            $rows[] = $row;
        }
        return $rows;
    }

    
    
    /**
     * [执行一条删除的SQL语句，其实和query() 方法没有任何区别]
     * @param  [type] $sql [description]
     * @return [type]      [description]
     */
    function delete($sql){
        return $this->query( $sql );
    }

    function getSql(){
        return $this->sqls;
    }

    /**
     * @author 僵尸 2016-12-24
     * [获取受数据库的删除影响行数,用于判断是否删除成功]
     * @return [int] 0 [0行受影响]
     * @return [int] n [n行受影响]
     */
    function affRows(){
        return $this->mysqli->affected_rows;
    }
    
    /**
     * [getMysqli description]
     * @author 计算机
     * @DateTime  2017-02-22T20:22:02+0800
     * @return    [type] mysqli对象 [description]
     */
    function getMysqli(){
        return $mysqli = &$this->mysqli;
    }

    /**
     *xk添加获取用户登陆ip
     *调用方法$ip = $this->model()->GETip();
     */
    function GetIp(){
        $realip = '';
        $unknown = 'unknown';
        if (isset($_SERVER)){
            if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                foreach($arr as $ip){
                    $ip = trim($ip);
                    if ($ip != 'unknown'){
                        $realip = $ip;
                        break;
                    }
                }
            }else{ 
                if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){
                    $realip = $_SERVER['HTTP_CLIENT_IP'];
                }else{ 
                    if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){
                        $realip = $_SERVER['REMOTE_ADDR'];
                    }else{
                        $realip = $unknown;
                    }
                }
            }
        }else{
            if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){
                $realip = getenv("HTTP_X_FORWARDED_FOR");
            }else{ 
                if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){
                    $realip = getenv("HTTP_CLIENT_IP");
                }else{ 
                    if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){
                        $realip = getenv("REMOTE_ADDR");
                    }else{
                        $realip = $unknown;
                    }
                }
            }
        }
        $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
        return $realip;
    }
    function GetIpLookup($ip = ''){
        if(empty($ip)){
            $ip = GetIp();
        }
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
        if(empty($res)){ return false; }
        $jsonMatches = array();
        preg_match('#\{.+?\}#', $res, $jsonMatches);
        if(!isset($jsonMatches[0])){ return false; }
        $json = json_decode($jsonMatches[0], true);
        if(isset($json['ret']) && $json['ret'] == 1){
            $json['ip'] = $ip;
            unset($json['ret']);
        }else{
            return false;
        }
        return $json;
    }
}