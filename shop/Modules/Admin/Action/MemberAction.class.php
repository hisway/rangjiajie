<?php 
import("ORG.Util.Page");// 导入分页类
Class MemberAction extends Action{
	
	    
	public function index(){
		  
		  $user =M('user');
		  $count= $user->count();// 查询满足要求的总记录数
		  $Page = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
		  $list = $user->limit($Page->firstRow.','.$Page->listRows)->select();
			$show = $Page->show();// 分页显示输出
			$this->assign('page',$show);// 赋值分页输出
		  $this->assign('user',$list);// 赋值数据集
		   //var_dump($list);
	    $this->display();
	}
	
	public function addUser(){
      $data=array(
      'username' => $this->_post('username'),
      'password' => md5($this->_post('password')),
      'sex' => $this->_post('sex'),
      'birthday' => $this->_post('birthday'),
      'email' => $this->_post('email'),
      'qq' => $this->_post('qq'),
      'mobile_phone' => $this->_post('mobile_phone'),
      'home_phone' => $this->_post('home_phone'),
      'office_phone' => $this->_post('office_phone')
      );
	        //var_dump($data);
	    if(M('user')->add($data)){
	    	
	    	$this->success('添加成功',U(GROUP_NAME.'/Member/index'));
	    }else{
	    	$this->error('添加失败');
	    	}
//$this->display('add');
	
	}
	
	public function detail(){
		  $id=$this->_get('id');
		  $user=M('user');
		  $data=$user->where("id=%d",$id)->find();
		  $this->assign('user',$data);
		  $this->display();
		
		}
		
	public function save(){
	    //var_dump($_POST);
      $data=array(
      'id' => $this->_post('id'),
      'username' => $this->_post('username'),
      'sex' => $this->_post('sex'),
      'birthday' => $this->_post('birthday'),
      'email' => $this->_post('email'),
      'qq' => $this->_post('qq'),
      'mobile_phone' => $this->_post('mobile_phone'),
      'home_phone' => $this->_post('home_phone'),
      'office_phone' => $this->_post('office_phone')
      );
	    var_dump($data);
		  $user=M('user');
      if($user->save($data) > 0){
		  
		   $this->success('保存成功',U(GROUP_NAME.'/Member/index'));
		}else{
			$this->error('保存失败');
    }
	   // $this->display('detail');
   }
   
   public function search(){
   	$username=I('users_name');
   	$user = M('user');
   	$count= $user->where("username like '%$username%' ")->count();// 查询满足要求的总记录数
		$Page = new Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
   	$list = $user->where("username like '%$username%' ")->limit($Page->firstRow.','.$Page->listRows)->select();
   	//$list = $user->where("username like '%$username%' ")->page($_GET['p'].',2')->select();
   	$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
   	$this->assign('user',$list);
   	//var_dump($list);
   	$this->display();
   	}
   
   
  public function delUser(){
      $id=$this->_get('id');
      $user=M('user');
      if($user->where('id=%d',$id)->delete()>0){
      	$this->success('删除成功',U(GROUP_NAME.'/Member/index'));
      }else{
      	$this->error('删除失败');
      }
      //$this->display('index');
  	}
  	
  	public function setField(){
  		$rank_points=$this->_post('rank_points');
  		$id=$this->_post('id');
  		var_dump($_POST);
  		$user=M('user');
  		if($user->where('id=%d',$id)->setField('rank_points',$rank_points)>0){
  			$this->success('修改成功',U(GROUP_NAME.'/Member/index'));
  		}else{
  			$this->error('修改失败');
  			}
  		//$this->display('index');
  		}
 }
?>