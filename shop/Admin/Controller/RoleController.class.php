<?php 
namespace Admin\Controller;
use Think\Controller;
Class RoleController extends Controller{
	//角色管理
	public function index(){
		$this->role = M('auth_group')->select();
	    $this->display();
	}

	public function add(){
		$this->rule = M('auth_rule')->select();
	    $this->display();
	}

	public function addRole(){
		$data = $_POST;
		$data['rules'] = implode(',',$data['rules']);
		if (M('auth_group')->add($data)) {
			$this->success('添加成功',U(GROUP_NAME.'/Role/index'));
		}else{
			$this->error('添加失败');
		}	    
	}

	public function edit(){
	    $role = M('auth_group')->find(I('id'));
	    $this->rule = M('auth_rule')->select();
		$this->role = $role;
	    $this->display();
	}

	public function editRole(){
		$id = I('id');
		$data = $_POST;
		$data['rules'] = implode(',',$data['rules']);
		if (M('auth_group')->save($data)) {
			$this->success('修改成功',U(GROUP_NAME.'/Role/index'));
		}else{
			$this->error('内容无修改');
		}	    
	}

	

	
}
?>