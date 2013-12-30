<?php
namespace Admin\Controller;
class KeywordController extends CommonController {
public function  index(){

$this->display();

}


public function getKeyword(){
	
$cat_id=$_GET['cat_id'];

$keyword=M('Keyword');

$list=$keyword->field("id,name,pid,path,concat(path,'-',id)as newpath")->order('newpath')->where("cat_id=$cat_id")->select();	

foreach($list as $key=> $value){
	
$value['count']=count(explode('-',$value['newpath']));	
$list[$key]['count'] =$value['count'];
}

$list=json_encode($list);	

echo $list;
}




public function add(){
$keyword= D('Keyword');
$validate    =    array(

array('name','require','属性名必须！'), // 仅仅需要进行栏目名的验证

);

$keyword-> setProperty("_validate",$validate);	
if ($vo=$keyword->create()){


if($keyword->add()){
	
$this->success();	
	
}else{
	echo $keyword->getLastsql();
	
}
		
	

 
}else{
	$this->error($keyword->getError());
	
}	
		
	
	
}


		public function getKeybyid(){
			
		$id=$_GET['id'];
		
		$good=M('Goods');		
		$list=$good->where("id=$id")->find();
		$kid=$list['keyword_id'];
	  //$kid=explode(",",$kid);
	  
	  
	  $cat_id=$_GET['cat_id'];

    $keyword=M('Keyword');

    $list=$keyword->field("id,name,pid,path,concat(path,'-',id)as newpath")->order('newpath')->where("cat_id=$cat_id")->select();	

    foreach($list as $key=> $value){
	
    	$value['count']=count(explode('-',$value['newpath']));	
			$list[$key]['count'] =$value['count'];
			$list[$key]['kid']=$kid;
			}
		

		$list=json_encode($list);	
	  
	  echo $list;
	  
	 /* $rs=array();//结果集
	  foreach($kid as $value){
		
		$id= $value;  //每一个keyword id   然后去keyword表里取数据
		
		$keyword=M('Keyword');
		
		$ls=$keyword->where("id=$id")->find();
		
		print_r($ls);
		
		
	  
	  
	  }
		*/	
			
			
		}

}
?>