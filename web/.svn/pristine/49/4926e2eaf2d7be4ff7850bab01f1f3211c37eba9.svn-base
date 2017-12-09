<?php
	namespace core\lib;
	//分页工具类
	
	class Page{

		public $total;//数据总记录
		public $length;//每页显示多少条
		public $page;//当前页数
		public $pagenum;//最大页数
		public $offset;//偏移量
		public $prevpage;//上一页
		public $nextpage;//下一页
		public $lastPage;//最后一页
		public $limit;//
		public $url;
		//构造方法
		function __construct($total,$length){
			$this->total = $total;//总记录数

			$this->length = $length;//每页显示多少条

			$this->page = isset($_GET['page']) ? intval($_GET['page']) : 1;//当前页数
			
			$this->pagenum = ceil($this->total / $this->length); //总记录数除以每页显示的条数得到总页数

			$this->offset = ($this->page-1)*($this->length); //偏移量等于当前页减一 乘以每页显示数据条数。

			$this->limit = "limit $this->offset,$this->length";//限制输出

			$this->prevpage = ($this->page - 1 <= 0) ? 1 : $this->page - 1  ;//上一页

			$this->nextpage();//下一页

			$this->lastPage = $this->pagenum ? $this->pagenum : 1;//最后一页

			$this->url = $this->getUrl();//得到当前的url地址

		}

    	//下一页处理
		function nextpage(){
			if ($this->page >= $this->pagenum) {
				$this->nextpage = $this->pagenum ? $this->pagenum : 1;
			}else{
				$this->nextpage = $this->page + 1;
			}
		}
		//url设置 
		function getUrl() {    
         $_url = $_SERVER["REQUEST_URI"];//获得当前地址后缀 /?m=cate&c=Pagetest&f=index&page=1
          
         $_par = parse_url($_url); 
         if (isset($_par['query'])) {  
                parse_str($_par['query'],$_query); 
                unset($_query['page']); 
                $_url = 'http://'.$_SERVER['HTTP_HOST'].$_par['path'].'?'.http_build_query($_query);      
         		}  
         	return $_url;  
      	}        
		function showPage(){
			$html = '';
  			$html .= "<li><a href='$this->url&page=1' class='page'>首页</a></li>";
  			$html .= "<li><a href='$this->url&page=$this->prevpage' class='page'>上一页</a></li>";
  			$html .= "<li><a href='$this->url&page=$this->nextpage' class='page'>下一页</a></li>";
			for ($i=1; $i <= $this->pagenum; $i++) { 
				if ($this->page == $i) {
					$html .= "<li><a href='$this->url&page=$i' style='color:#F0F0F0;background-color:#428BCA;' class='page'>$i</a></li>";
				}else{
					$html .= "<li><a href='$this->url&page=$i' class='page'>$i</a></li>";
				}
			}
			$html .= "<li><a href='$this->url&page=$this->lastPage' class='page'>最后一页</a></li>";
			return $html;
		}
	}



