<?php
class CategoryModel extends Model{
	
	
protected  $_auto=array(
array('unit','tclm',3,'callback'),
);

 function tclm(){
$parent_id=isset($_POST['parent_id']) ? $_POST['parent_id']:0;
if($parent_id==0){	
$unit=0;
return $unit;	 
}
	$list=$this->where("cat_id=$parent_id")->find();
	
  $data=$list['unit'].'-'.$list['cat_id'];
 
	return  $data;
	
	
}

}
?>