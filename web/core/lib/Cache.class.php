<?php
/**
 * @author: 小诺心
 * @time: 2017-2-12 20:23:05
 * 缓存类, 一次生成多次调用
 */

namespace core\lib;

class Cache{

    const FILE_LIFE_KEY = 'FILE_LIFE_KEY';
    const CLEAR_ALL_KEY = 'CLEAR_ALL';
    static $_instance = null;
    protected $_options = array(
        'cache_dir'        => './data/cache',
        'file_locking'     => true,
        'file_name_prefix' => 'php',
        'cache_file_umask' => 0777,
        'file_life'        => 100000
    );
   
    static function &getInstance($options = array()){
        if(self::$_instance === null){
            self::$_instance = new self($options);
        } 
        return self::$_instance;
    }
   
    /**
     * 设置参数
     * @param array $options 缓存参数
     * @return void
     */
    static function &setOptions($options = array()){
        return self::getInstance($options);
    }
   
    /**
     * 构造函数
     * @param array $options 缓存参数
     * @return void
     */
    private function __construct($options = array()){  
        if ($this->_options['cache_dir'] !== null) {
            $dir = rtrim($this->_options['cache_dir'],'/') . '/';
            $this->_options['cache_dir'] = $dir;

            if (!is_dir($this->_options['cache_dir'])) {
                mkdir($this->_options['cache_dir'],0777,TRUE);
            }
            if (!is_writable($this->_options['cache_dir'])) {
                exit('file_cache: 路径 "'. $this->_options['cache_dir'] .'" 不可写');
            }
        } else {
            exit('file_cache: "options" cache_dir 不能为空 ');
        }
    }
  
    /**
     * 设置缓存路径
     * @param string $value
     * @return void
     */
    static function setCacheDir($value){
        $self = & self::getInstance();

        if (!is_dir($value)) {
            exit('file_cache: ' . $value.' 不是一个有效路径 ');
        }
        if (!is_writable($value)) {
            exit('file_cache: 路径 "'.$value.'" 不可写');
        }

        $value = rtrim($this->_options['cache_dir'],'/') . '/';

        $self->_options['cache_dir'] = $value;
    }
   
    /**
     * 存入缓存数据
     * @param array $data   放入缓存的数据
     * @param string $id   缓存id(又名缓存识别码)
     * @param cache_life   缓存时间
     * @return boolean True if no problem
     */
    static function save($data, $id = null, $cache_life = null){
        $self = & self::getInstance();
        if (!$id) {
            if ($self->_id) {
                $id = $self->_id;
            } else {
                exit('file_cache:save() id 不能为空!');
            }
        }
        $time = time();

        if($cache_life) {
            $data[self::FILE_LIFE_KEY] = $time + $cache_life;
        }
        elseif($cache_life != 0){
            $data[self::FILE_LIFE_KEY] = $time + $self->_options['file_life'];
        }

        $file = $self->_file($id);

        $data = "<?php\n".
            " // time: ". $time. "\n".
            " return ".
            var_export($data, true).
            "\n?>"
        ;

        $res = $self->_filePutContents($file, $data);
        return $res;
    }
   
   
    /**
     * 得到缓存信息
     *
     * @param string $id 缓存id
     * @return string|array 缓存数据
     */
    static function load($id){
        $self = & self::getInstance();
        $time = time();
        //检测缓存是否存在
        if (!$self->test($id)) {
            // The cache is not hit !
            return false;
        }

        //全部清空识别文件
        $clearFile = $self->_file(self::CLEAR_ALL_KEY);

        $file = $self->_file($id);

        //判断缓存是否已被全部清除
        if(is_file($clearFile) && filemtime($clearFile) > filemtime($file)){
            return false;
        }

        $data = $self->_fileGetContents($file);
        if(empty($data[self::FILE_LIFE_KEY]) || $time < $data[self::FILE_LIFE_KEY]) {
            unset($data[self::FILE_LIFE_KEY]); 
            return $data;   
        }
        return false;
    } 
   
    /**
     * 写入缓存文件
     *
     * @param string $file 缓存路径
     * @param string $string 缓存信息
     * @return boolean true 成功
     */
    protected function _filePutContents($file, $string){
        $self = & self::getInstance();
        $result = false;
        $f = @fopen($file, 'ab+');
        if ($f) {
            if ($self->_options['file_locking']) @flock($f, LOCK_EX);
                fseek($f, 0);
                ftruncate($f, 0);
                $tmp = @fwrite($f, $string);
            if (!($tmp === false)) {
                $result = true;
            }
            @fclose($f);
        }
        @chmod($file, $self->_options['cache_file_umask']);
        return $result;
    }
   
    /**
     * 格式化后的缓存文件路径
     *
     * @param string $id 缓存id
     * @return string 缓存文件名(包括路径)
     */
    protected function _file($id){
        $self = & self::getInstance();
        $fileName = $self->_idToFileName($id);
        return $self->_options['cache_dir'] . $fileName;
    } 
   
    /**
     * 格式化后的缓存文件名字
     *
     * @param string $id 缓存id
     * @return string 缓存文件名
     */
    protected function _idToFileName($id){
        $self = & self::getInstance();
        $self->_id = $id;
        $prefix = $self->_options['file_name_prefix'];
        //$result = $prefix . '---' . $id; //定义缓存文件名 cache---config
        $result = $id . '.' . $prefix;
        return $result;
    } 
   
    /**
     * 判断缓存是否存在
     *
     * @param string $id Cache id
     * @return boolean True 缓存存在 False 缓存不存在
     */
    static function test($id){
        $self = & self::getInstance();
        $file = $self->_file($id);

        if (!is_file($file)) {
            return false;
        }

        return true;
    }
   
    /**
     * 得到缓存信息
     *
     * @param string $file 缓存路径
     * @return string 缓存内容
     */
    protected function _fileGetContents($file){
        if (!is_file($file)) {
            return false;
        }
        return include $file;
    }  
   
    /**
     * 清除所有缓存
     * 
     * @return void
     */
    static function clear(){
        $self = & self::getInstance();
        $self->save('CLEAR_ALL',self::CLEAR_ALL_KEY); 
    } 
   
    /**
     * 清除一条缓存
     * 
     * @param string cache id 
     * @return void
     */
    static function del($id){
        $self = & self::getInstance();
        if(!$self->test($id)){
            // 该缓存不存在
            return false;
        }
        $file = $self->_file($id);
        return unlink($file);
    } 
}