<?php

namespace module\admin;

Class Goods extends admin{

	function listGoods(){
		$data=array();
		 $this->afw('/admin/goods/listGoods',$data);
	}

	function category(){
		$sql="select * from jj_category ";
		$res=$this->model()->query($sql);

		$items=array();
		while ($row= $res->fetch_assoc()) {
			//以每条记录的id，作为数组的键
			$items[$row['id']]=$row;
		}
		
		//转成多维数组
		$tree=array();
		foreach ($items as $key => $row) {
			$items[$row['parentId']]['son'][$row['id']]=&$items[$row['id']];
		}
		$tree=$items[0]['son'];


		//多维数组转一维
		$line=$this->tree2line($tree);
		$data=$line;
		$this->afw('/admin/goods/category',$data);
	}
	
		//多维数组转一维
		function tree2line($tree,&$result=array(),&$level=0){
			if(is_array($tree)){
				$level++;
				foreach ($tree as $id => $data) {
					$data['level']=$level;
					$result[$id]=$data;
					if(isset($data['son'])){//探测是否还有下级
						//如果还有下级，就调用自身
						$this->tree2line($data['son'],$result,$level);

						unset($result[$id]['son']);
					}
				}
				$level--;
			}
			return $result;
		}//tree2line 结束

}




	