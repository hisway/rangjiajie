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
		$search_cate=$_GET['search_cate'];
		
	  $mess=M('Message');
	  if($search_cate==1){
		$count = $mess->where("content like"." "."'%".$terms."%'")->count();// ��ѯ����Ҫ����ܼ�¼��
	 
	  $Page = new \Org\Mrc\Page($count,10);// ʵ������ҳ�� �����ܼ�¼����ÿҳ��ʾ�ļ�¼��
	  $show = $Page->show();// ��ҳ��ʾ���
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
  }elseif($search_cate==2){
  	$count=$mess->join('ws_user ON ws_message.user_id=ws_user.id')->where("username like"." "."'%".$terms."%'")->count();
    $Page = new \Org\Mrc\Page($count,10);
    $show = $Page->show();// ��ҳ��ʾ���
    $list = $mess->limit($Page->firstRow.','.$Page->listRows)->join('ws_user ON ws_message.user_id=ws_user.id')->where("username like"." "."'%".$terms."%'")->select();  
    $lists=array();   
    foreach ($list as $l){
    $attr=$l['username'];  
    $l['username']=highlight($attr,$terms);
  	$id=$l['goods_id']; 	
  	$good=M('Goods');
  	$res=$good->where("id=$id")->find(); 
  	$l['goods_name']=$res['goods_name'];
   	//$lists[]=$l;  
  	array_push($lists,$l);
  	}
   }else{
  	$count=$mess->join('ws_goods ON ws_message.goods_id=ws_goods.id')->where("goods_name like"." "."'%".$terms."%'")->count();
    $Page = new \Org\Mrc\Page($count,10);
    $show = $Page->show();// ��ҳ��ʾ���
    $list = $mess->limit($Page->firstRow.','.$Page->listRows)->join('ws_goods ON ws_message.goods_id=ws_goods.id')->where("goods_name like"." "."'%".$terms."%'")->select();  
    $lists=array();   
    foreach ($list as $l){
    $attr=$l['goods_name'];  
    $l['goods_name']=highlight($attr,$terms);
  	$uid=$l['user_id'];	
  	$user=M('User');
    $res=$user->where("id=$uid")->find(); 
    $l['username']=$res['username'];
   	//$lists[]=$l;  
  	array_push($lists,$l);
  	
  }
  
  
  }
  	
  
  
  
  
    
    $this->assign('page',$show);// ��ֵ��ҳ���
    $this->assign('list',$lists);
	  $this->display(index);
	}



}
?>