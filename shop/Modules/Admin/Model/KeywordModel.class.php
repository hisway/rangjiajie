<?php
class KeywordModel extends Model{
	
protected  $_auto=array(
array('path','tclm',3,'callback'),
);



 function tclm(){

	$kid=isset($_POST['kid']) ? $_POST['kid']:0;

if($kid==0){ 
	
$path=0;
return $path;	
}
	$list=$this->where("id=$kid")->find();
	
  $data=$list['path'].'-'.$list['id'];

	return  $data;
	
	
}

}
?>