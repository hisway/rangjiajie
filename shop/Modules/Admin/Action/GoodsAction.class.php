<?php 

Class GoodsAction extends CommonAction{
	public function index(){
		
		$goods=M('goods');
		$result=$goods->select();
      $this->assign('list',$result);
	    $this->display();
	}
	
	
	public function detail(){
		
		
		$this->display();
		
	}

	
}
?>