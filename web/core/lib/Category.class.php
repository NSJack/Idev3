<?php
	
namespace core\lib;
	
class Category  {
	
	//定义一个方法，对给定的数组，递归形成树，可用于后台分类数据输出管理
	/**
	 * 根据传递的父类ID获取所有的子级分类
	 * 组合一维数组
	 * @param [type] $arr 分类数组
	 * @param integer $pid 父类id
	 * @param integer $level 父类所属层级
	 * @return [type] 格式化后的数组信息
	 */
 	function tree($arr,$pid = 0,$level = 0) {
		static $tree = array();
		foreach ($arr as $v) {
			if ($v['pid'] == $pid) {
				//说明找到，保存
				$v['level'] = $level; //保存当前分类的所在层级
				$tree[] = $v;
				//继续找
				$this->tree($arr,$v['id'],$level + 1);
			}
		}
		return $tree;
	}

	//定义一个方法，构造嵌套结构的多维数组,可用于首页分类信息输出
	/**
	 * 根据传递的父类ID获取所有的子级分类
	 * 组合多维数组
	 * @param [type] $arr 分类数组
	 * @param integer $pid 父类id
	 * @return [type] 格式化后的数组信息
	 */
	function childList($arr,$pid = 0) {
		$res = array();
		foreach ($arr as $v) {
			if ($v['pid'] == $pid) {
				//找到节点，接着继续找当前节点的所有子孙节点
				$v['child'] = $this->childList($arr,$v['id']);
				$res[] = $v;
			}
		}
		return $res;
	}


	/**可用于前台首页分类路径导航
	 * 根据传递子类ID获取所有的父级分类
	 * @param [type] $res 分类数组
	 * @param integer $id 子类id
	 * @return [type] 父类数组信息
	 */
	function getParent($arr, $id) {		
		$res = array();

		foreach($arr as $v) {
			if($v['id'] == $id) {
				$res[] = $v;
				
				//$res[] = $v['id'];
				$res = array_merge(self::getParent($arr, $v['pid']), $res);
			}
		}
		return $res;
	}
	/**
	 * 根据传递的父类ID获取所有的子级分类ID
	 * 注意返回值中不包括传递进来的父类ID
	 * @param [type] $arr 分类数组
	 * @param [type] $pid 父类id
	 * @return [type] 子类id数组
	 */

	function getChilds($arr,$pid='0'){
		$res = array();
		foreach ($arr as $v) {
			if($v['pid'] == $pid){
				$res[] = $v;
				$this->getChilds($arr,$v['id']);
			}
		}
		return $arr;
	}

	/**
	 * 权限递归
	 * @param  [type] $data [处理的数组]
	 * @param  string $pid  [父ID]
	 * @return [type]       [description]
	 */
    function recur($data,$pid='0'){
		$row = array();
		foreach( $data as $value ){
			if( $value['pid'] == $pid ){
				$value['rightsdata'] = $this->recur($data,$value['rightsid']);
				$row[] = $value;
			}
		}
		return $row;
	}
	
}