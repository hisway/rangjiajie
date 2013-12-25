<?php 
namespace Admin\Controller;
use Think\Controller;
Class CommonController extends Controller{
	Public function _initialize(){
		if (!isset($_SESSION['username'])) {		
			$this->redirect(MODULE_NAME.'/Login/index');
			//$this->error('请登录后再操作',MODULE_NAME.'/Login/index');
		}


        $auth=new \Think\Auth();
        if( !$auth->check(CONTROLLER_NAME.'-'.ACTION_NAME,session('uid')) && !in_array(session('uid'), explode(',', C('AUTH_CONFIG.SuperAdmin'))) && !in_array(CONTROLLER_NAME.'-'.ACTION_NAME, explode(',', C('AUTH_CONFIG.NOT_AUTH_ACTION'))) ){
            $this->error('您没有权限');
        }

		$this->username = $_SESSION['username'];
	}
}
?>