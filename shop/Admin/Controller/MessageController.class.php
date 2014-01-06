<?php
namespace Admin\Controller;
class MessageController extends CommonController {
public function index(){
  import('ORG.Util.Page');
  
  $mess=M('Message');
  
  $count      = $mess->count();// 

    $Page = new \Org\Mrc\Page($count,10);// 

  $show       = $Page->show();// 

// 





  $list = $mess->limit($Page->firstRow.','.$Page->listRows)->select();
  
  
  /*   
  //
  
  foreach ($list as $l=> $v){
  	
  	$id=$v['goods_id'];
  	$good=M('Goods');
  	$res=$good->where("id=$id")->find();  
    $v['goods_name']=$res['goods_name'];
    $list[$l]=$v;
  } 
  
*/
 // 

  $lists=array();
  foreach ($list as $l){

  	$id=$l['goods_id'];
  	$uid=$l['user_id'];
  	$good=M('Goods');
  	$res=$good->where("id=$id")->find(); 
  	$l['goods_name']=$res['goods_name'];

    $user=M('User');
    $res=$user->where("id=$uid")->find(); 
    $l['username']=$res['username'];
    
  	//$lists[]=$l;  
  	array_push($lists,$l);
  	
  }
  
  $this->assign('page',$show);// 

  $this->assign('list',$lists);
	
	$this->display();
	
}


public function  detail(){
	
$id=$_GET['id'];

$mess=M('Message');
  
$list=$mess->where("id=$id")->find();  
 
$goods_id=$list['goods_id'];

$user_id=$list['user_id'];

$good=M('Goods');

$res=$good->where("id=$goods_id")->find();

$list['goods_name']=$res['goods_name'];


$user=M('User');
$res=$user->where("id=$user_id")->find();
$list['username']=$res['username'];


$this->assign('list',$list);
	
$this->display();
	
	
}
public function  modify(){
	
	$data['is_show']=$_POST['is_show'];
	$id=$_POST['id'];
	$mess=M('Message');	
	if($mess->where("id=$id")->save($data)){
 
	$this->redirect('Message/index',1);
}
else{
	echo $mess->getLastsql();
	$this->error();
		
	
}

}

 public function search(){


		$terms=$_GET['terms'];
	  $mess=M('Message');
		$count = $mess->where("content like"." "."'%".$terms."%'")->count();// 查询满足要求的总记录数
	  $Page = new \Org\Mrc\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数
	  $show = $Page->show();// 分页显示输出
    $list = $mess->limit($Page->firstRow.','.$Page->listRows)->where("content like"." "."'%".$terms."%'")->select();
    $lists=array();
    
    foreach ($list as $l){
    $attr=$l['content'];  
    $l['content']=highlight($attr,$terms);

  	$id=$l['goods_id'];
  	$uid=$l['user_id'];
  	$good=M('Goods');
  	$res=$good->where("id=$id")->find(); 
  	$l['goods_name']=$res['goods_name'];

    $user=M('User');
    $res=$user->where("id=$uid")->find(); 
    $l['username']=$res['username'];
    
  	//$lists[]=$l;  
  	array_push($lists,$l);
  	
  }
    
    $this->assign('page',$show);// 赋值分页输出
    $this->assign('list',$lists);
	  $this->display(index);
	}



}
?>