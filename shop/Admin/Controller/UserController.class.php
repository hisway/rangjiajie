<?php 
namespace Admin\Controller;
Class UserController extends CommonController{
	public function index(){
		$user = M('admin')->select();
		$db = M('auth_group_access');
		/*$auth = new Auth();
		foreach ($user  as $key => $v) {
			$group = $auth->getGroups($v['id']);
			$user[$key]['role'] = $group[0]['title'];
		}*/
		$this->user = $user;
	    $this->display();
	}

	public function add(){
		$this->role = M('auth_group')->select();
	    $this->display();
	}

	public function addUser(){
		$data = $_POST;
		$db = M('auth_group_access');
		if ($id=M('admin')->add($data)) {
			foreach ($data['role'] as $key => $v) {
				$db->add(array('uid'=>$id,'group_id'=>$v));
			}			
			$this->success('添加成功',U(MODULE_NAME.'/User/index'));
		}else{
			$this->error('添加失败');
		}	    
	}

	public function edit(){
		$id = I('id');
		$user = M('admin')->find($id);
		$auth = new \Think\Auth();
		$role = $auth->getGroups($id); //前台需更改
		$this->user = $user;
		$this->role = $role;
		$this->role_all = M('auth_group')->select();
	    $this->display();
	}

	public function editUser(){
		$id = I('id');
		$data = $_POST;
		$a = M('admin')->save($data);
		$db = M('auth_group_access');
		$b = $db->where(array('uid'=>$id))->delete();
		if ($data['role']) {
			foreach ($data['role'] as $key => $v) {
				$c = $db->add(array('uid'=>$id,'group_id'=>$v));
			}
		}
		if ($a||$b||$c) { //原来有权限未做更改，也提示已更新
			$this->success('信息已更新',U(MODULE_NAME.'/User/index'));
		}else{
			$this->error('信息无修改');
		}	    
	}



	
}
?>