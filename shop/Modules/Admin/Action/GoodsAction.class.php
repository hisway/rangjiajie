<?php 

Class GoodsAction extends Action{
	public function index(){
		$goods=M('goods');
		$result=$goods->select();
		 
      $this->assign('list',$result);
		
	    $this->display();
	}

	
}
?>