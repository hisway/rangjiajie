<?php 
//订单管理
Class OrderAction extends Action{
	public function index(){
		
		$order=M('order');
		$list=$order->select();
		//dump($list);


		//var_dump($list);
		$count=100;
		$this->assign('list',$list);
		$this->assign('count',$count);
		
	  $this->display();
	}
  // 订单列表
	public function all(){
		$order=M('order');
		$res=$order->where("")->select();
		
		echo "<pre>";
		print_r($res);
		echo "</pre>";
		
		}
		
	//订单修改
	public function modify(){
		echo "订单修改";
		}
	//订单删除
	public function del(){
		echo "订单删除";
		}
	//订单查询
	public function query(){
		
		echo "订单查询";
		}
	
}
?>