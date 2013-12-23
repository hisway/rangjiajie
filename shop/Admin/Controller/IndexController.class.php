<?php 
namespace Admin\Controller;
use Think\Controller;
Class IndexController extends Controller{
	public function index(){
	    $this->display();
	}

	public function loginout(){
		session_unset();
		session_destroy();
		$this->redirect('Login/index');
	}

	
}
?>