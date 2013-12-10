<?php 

Class UserAction extends Action{
	public function index(){
		$user = M('admin')->select();
		$db = M('auth_group_access');
		foreach ($user  as $key => $v) {//需修改
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
		if ($id=M('admin')->add($data)) {
			M('auth_group_access')->add(array('uid'=>$id,'group_id'=>$data['role_id']));
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
			M('auth_group_access')->where(array('uid'=>$id))->save(array('group_id'=>$data['role_id']));
			$this->success('修改成功',U(GROUP_NAME.'/User/index'));
		}else{
			$this->error('内容无修改');
		}	    
	}



	
}
?>