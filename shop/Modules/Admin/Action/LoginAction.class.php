<?php  
Class LoginAction extends Action{
	public function index(){
	    $this->display();
	}

	public function login(){
		if (!$_POST) halt('页面不存在');
		if(I('code','','md5') !=session('verify')) $this->error('验证码错误');
		$username = I('username');
 		$pwd = I('password');
 		$user = M('admin')->where(array('username'=>$username))->find();
 		if (!$user||$user['password']!=$pwd) {//md5($pwd)
 		$this->error('密码与账户不匹配');
 		}

 		$data = array(
 		'id'=>$user['id'],
 		'last_login'=>time(),
 		'last_ip'=>get_client_ip(),
 		);
	 	M('admin')->save($data);

		//$_SESSION['uid']=$user['id']
	 	session('uid',$user['id']);
	 	session('username',$user['username']);
	 	session('time',date('y-m-d H:i',$user['last_login']));
	 	session('loginip',$user['last_ip']);
	 	redirect(__GROUP__);
	}

	public function verify(){
 	    import('ORG.Util.Image');
 	    Image::buildImageVerify(4,1,'png');
 	}

 	public function checkusername(){
 		$username = I('username');
 		if (M('admin')->where(array('username'=>$username))->find()) {
 			echo 1;//正常
 		}
 	}

 	public function checkcode(){
 		$code = I('code','','md5');
 		if ($code==session('verify')) {
 			echo 1;//正常
 		}
 	}
	

}
?>