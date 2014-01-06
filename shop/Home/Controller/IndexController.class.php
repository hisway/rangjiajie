<?php 
namespace Home\Controller;
use \Think\Controller;
Class IndexController extends Controller{
	public function index(){
	    $this->display();
	}

	public function request(){
		$db = M('goods');
		$page = isset($_GET['page'])?(int)$_GET['page']:0;
		$num = isset($_GET['requestNum'])?(int)$_GET['requestNum']:5;
		$startNum = $page*$num;
		$rows = mysql_query('select * from demo limit '.$startNum.','.$num.'');
		$data = array();
		while($row = mysql_fetch_assoc($rows)){
		$data[] = $row;
		}
		echo json_encode($data);
	}





	
}
?>