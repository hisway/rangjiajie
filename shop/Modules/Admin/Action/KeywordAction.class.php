<?php
class KeywordAction extends Action {
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

array('name','require','���������룡'), // ������Ҫ������Ŀ������֤

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


}
?>