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
   	$username=$this->_post('users_name');
   	$user=M('user');
   	$res=$user->where("username like '%$username%' ")->select();
   	//var_dump($username);
   	$this->assign('user',$res);
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