<?php 

Class MemberAction extends Action{
	public function index(){
		  $user=M('user');
		  $res=$user->select();
		  //var_dump($res);
		  $this->assign('user',$res);
	    $this->display();
	}
	
	public function addUser(){
	    $username=$this->_post("users_name");
	    $password=$this->_post("users_password");
	    $sex=$this->_post("users_sex");
	    $birthday=$this->_post("users_birthday");
	    $email=$this->_post("users_email");
	    $qq=$this->_post("users_qq");
	    $mobile_phone=$this->_post("users_phone");
	    $home_phone=$this->_post("users_homeNo");
	    $office_phone=$this->_post("users_officeNo");
	    
	    $data=array(
	    'username' => $username,
	    'password' => md5($password),
	    'sex' => $sex,
	    'birthday' => $birthday,
	    'email' => $email,
	    'qq' => $qq,
	    'mobile_phone' => $mobile_phone,
	    'home_phone' => $home_phone,
	    'office_phone' => $office_phone
	    );
	    
	    var_dump($data);
	    
	    	
	    if(M('user')->add($data)){
	    	
	    	$this->success('添加成功',U(GROUP_NAME.'/Member/index'));
	    }else{
	    	$this->error('添加失败');
	    	}
//$this->display('add');
	
	}

	
}
?>