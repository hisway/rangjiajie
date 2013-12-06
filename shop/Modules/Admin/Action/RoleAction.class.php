<?php 

Class RoleAction extends Action{
	//角色管理
	public function index(){
		$this->rule = M('auth_group')->select();
	    $this->display();
	}

	public function add(){
	    $this->display();
	}

	public function addRole(){
		if (M('auth_group')->add($_POST)) {
			$this->success('添加成功',U(GROUP_NAME.'/Role/index'));
		}else{
			$this->error('添加失败');
		}	    
	}

	public function edit(){
	    $group = M('auth_group')->find(I('id'));
		$this->group = $group;
	    $this->display();
	}

	public function editRole(){
		if (M('auth_group')->save($_POST)) {
			$this->success('修改成功',U(GROUP_NAME.'/Role/index'));
		}else{
			$this->error('内容无修改');
		}	    
	}

	//角色权限管理
	public function roleRules(){
		$id = I('id');
		
		$group = M('auth_group')->find($id);
		$this->group = $group;

		$this->rule = M('auth_rule')->select();
	    $this->display();
	}

	public function editRoleRules(){
		$id = I('id');
		$data = $_POST;
		$data['rules'] = implode(',',$data['rules']);
		if (M('auth_group')->save($data)) {
			$this->success('设置成功',U(GROUP_NAME.'/Role/index'));
		}else{
			$this->error('设置未修改');
		}
	}

	
}
?>