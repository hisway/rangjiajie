<?php 
namespace Admin\Controller;
Class CategoryController extends CommonController{
public function index(){
$cate=M('Category');
$list=$cate->field("cat_id,cat_name,parent_id,unit,concat(unit,'-',cat_id)as newpath")->order('newpath')->select();
foreach($list as $ls=>$value){
	
	$rs['count']=count(explode('-',$value['newpath']));

  $list[$ls]['count']=$rs['count'];	 
}
$this->assign('alist',$list);
$this->display(detail);		
}
		

		
public function add(){
	
$cate=D('Category');  
$validate    =    array(

array('cat_name','require','栏目名必须！'), // 仅仅需要进行栏目名的验证

);



$rs=$cate-> setProperty("_validate",$validate);
 
if ($vo=$cate->create()){
	 
	if($cate->add()){	
	$this->success('success');	
	}else{		
	$this->error($cate->getLastsql());			
}

 
}else{
	$this->error($cate->getError());
	
}	
	
	

		
		
	}
	

 
	
	
	

	
}
?>