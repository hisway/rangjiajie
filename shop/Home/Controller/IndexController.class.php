<?php 
namespace Home\Controller;
use \Think\Controller;
Class IndexController extends Controller{
	public function index(){
		$db = M('goods');
		$data = M('goods')->limit($startNum,$num)->select();
		$this->data = $data;
	    $this->display(index2);
	}

	public function request(){
		$db = M('goods');
		$page = isset($_GET['page'])?(int)$_GET['page']:0;
		$num = isset($_GET['requestNum'])?(int)$_GET['requestNum']:10;
		$startNum = $page*$num;
		$data = M('goods')->limit($startNum,$num)->select();
		echo json_encode($data);
	}





	
}
?>