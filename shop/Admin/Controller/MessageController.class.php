<?php
namespace Admin\Controller;
use Think\Controller;
class MessageController extends Controller {
public function index(){
  import('ORG.Util.Page');
  
  $mess=M('Message');
  
  $count      = $mess->count();// ²éÑ¯Âú×ãÒªÇóµÄ×Ü¼ÇÂ¼Êý

  $Page       = new Page($count,10);// ÊµÀý»¯·ÖÒ³Àà ´«Èë×Ü¼ÇÂ¼ÊýºÍÃ¿Ò³ÏÔÊ¾µÄ¼ÇÂ¼Êý

  $show       = $Page->show();// ·ÖÒ³ÏÔÊ¾Êä³ö

// ½øÐÐ·ÖÒ³Êý¾Ý²éÑ¯ ×¢Òâlimit·½·¨µÄ²ÎÊýÒªÊ¹ÓÃPageÀàµÄÊôÐÔ





  $list = $mess->limit($Page->firstRow.','.$Page->listRows)->select();
  
  
  /*   
  //1ÖÖ·½·¨
  
  foreach ($list as $l=> $v){
  	
  	$id=$v['goods_id'];
  	$good=M('Goods');
  	$res=$good->where("id=$id")->find();  
    $v['goods_name']=$res['goods_name'];
    $list[$l]=$v;
  } 
  
*/
 //  2ÖÖ·½·¨

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
  
  $this->assign('page',$show);// ¸³Öµ·ÖÒ³Êä³ö

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