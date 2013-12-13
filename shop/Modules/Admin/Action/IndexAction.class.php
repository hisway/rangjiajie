<?php 

Class IndexAction extends CommonAction{
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