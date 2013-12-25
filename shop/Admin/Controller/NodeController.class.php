<?php 
namespace Admin\Controller;
Class NodeController extends CommonController{
	public function index(){
		$rule = M('auth_rule')->select();
		foreach ($rule as $key => $v) {
			$arr = explode('-', $v['name']) ;
			$rule[$key]['model'] = $arr[0];
			$rule[$key]['action'] = $arr[1];
		}
		$this->rule = $rule;
	    $this->display();
	}

	public function add(){
	    $this->display();
	}

	public function addNode(){
		$data = $_POST;
		$data['name'] = $data['model'].'-'.$data['action'];
		if (M('auth_rule')->add($data)) {
			$this->success('添加成功',U(MODULE_NAME.'/Node/index'));
		}else{
			$this->error('添加失败');
		}	    
	}

	public function edit(){
		$rule = M('auth_rule')->find(I('id'));
		$rule['name'] = split('-', $rule['name']);
		$this->rule = $rule;
	    $this->display();
	}

	public function editNode(){
		$data = $_POST;
		$data['name'] = $data['model'].'-'.$data['action'];
		if (M('auth_rule')->save($data)) {
			$this->success('修改成功',U(MODULE_NAME.'/Node/index'));
		}else{
			$this->error('内容无修改');
		}	    
	}

	public function del(){
		if (M('auth_rule')->delete(I('id'))) {
			$this->success('删除成功',U(MODULE_NAME.'/Node/index'));
		}else{
			$this->error('删除失败');
		}	    
	}

	

	
}
?>