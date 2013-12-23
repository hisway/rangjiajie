<?php
class MessageAction extends Action {
public function index(){
  import('ORG.Util.Page');
  
  $mess=M('Message');
  
  $count      = $mess->count();// 查询满足要求的总记录数

  $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

  $show       = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性





  $list = $mess->limit($Page->firstRow.','.$Page->listRows)->select();
  
  
  /*   
  //1种方法
  
  foreach ($list as $l=> $v){
  	
  	$id=$v['goods_id'];
  	$good=M('Goods');
  	$res=$good->where("id=$id")->find();  
    $v['goods_name']=$res['goods_name'];
    $list[$l]=$v;
  } 
  
*/
 //  2种方法

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
  
  $this->assign('page',$show);// 赋值分页输出

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
	$id=$_POST['goods_id'];
	$mess=M('Message');	
	if($mess->where("id=$id")->save($data)){
 
	$this->redirect('Message/index',1);
}
else{
	echo $mess->getLastsql();
	$this->error();
		
	
}

}



}
?>