<?php
class BrandAction extends Action {
public function index(){
$this->display();

}

public function add(){
	
$brand=M('Brand');
$data['brand_name']=$_POST['brand_name'];
$data['cat_id']=$_POST['category'];
$data['is_show']=$_POST['is_show']; 
if($brand->add($data)){
$this->success();	
}
else{	
echo $brand->getLastsql();	
}

}


public function getbrand(){
	$cat_id=$_GET['cat_id'];	 
	$brand=M('Brand');
	$list=$brand->where("cat_id=$cat_id")->select();
	$list=json_encode($list);
	echo $list;

}



}
?>