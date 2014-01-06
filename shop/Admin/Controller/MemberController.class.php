<?php 
namespace Admin\Controller;
Class MemberController extends CommonController{
	
	    
	public function index(){
		  $arr=fenye(2);
//		  for($i=0;$i < $arr['count']-1;$i++){
//		  	$arr['list'][$i]['grade']=5;
//		  	}
		  //$arr['list']['grade']=5;
		  var_dump($arr['count']);
		  $this->assign('page',$arr['show']);// 赋值分页输出
		  $this->assign('user',$arr['list']);// 赋值数据集
	    $this->display();
	}
	
	public function addUser(){
      $data=$_POST;
      $data['password']=md5($data['password']);
	    if(M('user')->add($data)){
	    	
	    	$this->success('添加成功',U(MODULE_NAME.'/Member/index'));
	    }else{
	    	$this->error('添加失败');
	    	}
//$this->display('add');
	
	}
	
	public function detail(){
		  $id=I('id');
		  $user=M('user');
		  $data=$user->where("id=%d",$id)->find();
		  $this->assign('user',$data);
		  $this->display();
		
		}
		
	public function save(){
      $data=$_POST;
		  $user=M('user');
      if($user->save($data) > 0){
		  
		   $this->success('保存成功',U(MODULE_NAME.'/Member/index'));
		}else{
			$this->error('保存失败');
    }
	   // $this->display('detail');
   }
   
   public function search(){
   	$username=I('users_name');
   	$where['username']=array('like',"%$username%");
    $arr=fenye(2,array('users_name' => $username),$where);
		$this->assign('page',$arr['show']);// 赋值分页输出
   	$this->assign('user',$arr['list']);
   	$this->display();
   	}
   
   
  public function delUser(){
      $id=I('id');
      $user=M('user');
      if($user->where('id=%d',$id)->delete()>0){
      	$this->success('删除成功',U(MODULE_NAME.'/Member/index'));
      }else{
      	$this->error('删除失败');
      }
      //$this->display('index');
  	}
  	
  	public function setField(){//修改单个字段
  		$rank_points=I('rank_points');
  		$id=I('id');
  		$user=M('user');
  		if($user->where('id=%d',$id)->setField('rank_points',$rank_points)>0){
  			$this->success('修改成功',U(MODULE_NAME.'/Member/index'));
  		}else{
  			$this->error('修改失败');
  			}
  		//$this->display('index');
  		}
  	public function grade(){
  		$grade=M('grade')->select();
  			$this->assign('grade',$grade);
  			$this->display();
  		}
  		
  	public function addGrade(){
  		$data=$_POST;
  		if(M('grade')-> add($data)){
  			$this->success('添加成功',U(MODULE_NAME.'/Member/grade'));
	    }else{
	    	$this->error('添加失败');
	    }
       //$this->display();
  		}
  		
  		
 }
?>