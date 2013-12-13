<?php 

Class GoodsAction extends CommonAction{
	public function index(){
		import('ORG.Util.Page');
		$goods=M('Goods');
			$count      = $goods->count();// 查询满足要求的总记录数

    $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

    $show       = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

    $list = $goods->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign('page',$show);// 赋值分页输出

      $this->assign('list',$list);
	    $this->display();
	}
	
	
	public function detail(){
		
		
		$this->display();
		
	}
	
	
	public function add(){
		
$goods=D('Goods');

	
		
	}
	

	
	
	

	
}
?>