<?php 

Class UserAction extends Action{
	public function index(){
		$user = M('admin')->select();
		$db = M('auth_group');
		foreach ($user  as $key => $v) {
			$role = $db->find($v['role_id']);
			$user[$key]['role'] = $role['title'];
		}
		$this->user = $user;
	    $this->display();
	}

	public function add(){
		$this->role = M('auth_group')->select();
	    $this->display();
	}

	public function addUser(){
		$data = $_POST;
		if (M('admin')->add($data)) {
			$this->success('添加成功',U(GROUP_NAME.'/User/index'));
		}else{
			$this->error('添加失败');
		}	    
	}

	public function edit(){
		$id = I('id');
		$user = M('admin')->find($id);
		$db = M('auth_group');
		$role = $db->find($user['role_id']);

		$this->user = $user;
		$this->role =$role;
		$this->roles = $db->select();
	    $this->display();
	}

	public function editUser(){
		$id = I('id');
		$data = $_POST;
		if (M('admin')->save($data)) {
			$this->success('修改成功',U(GROUP_NAME.'/User/index'));
		}else{
			$this->error('内容无修改');
		}	    
	}



	
}
?>