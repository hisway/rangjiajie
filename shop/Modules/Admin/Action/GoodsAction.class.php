<?php 

Class GoodsAction extends Action{
	public function index(){
		
		$goods=M('Goods');
		$result=$goods->select();
      $this->assign('list',$result);
	    $this->display();
	}
	
	
	public function detail(){
		
		
		$this->display();
		
	}
	
	
	public function add(){
		

		
		
	}
	

	
	
	

	
}
?>