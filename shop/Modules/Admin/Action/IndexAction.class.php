<?php 

Class IndexAction extends Action{
	public function index(){
	    $this->display();
	}

	public function loginout(){
		session_unset();
		session_destroy();
		$this->redirect('Admin/Login/index');
	}

	
}
?>