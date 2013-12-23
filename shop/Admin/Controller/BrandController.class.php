<?php
namespace Home\Controller;
use Think\Controller;
class BrandController extends Controller {
public function index(){
$this->display();

}

public function add(){
	
$brand=M('Brand');
$data['brand_name']=$_POST['brand_name'];
$data['cat_id']=$_POST['cat_id'];
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
public function getBrandbyid(){
	$id=$_GET['id'];
	
	$good=M('Goods');
	
	$ls=$good->where("id=$id")->find();
	$id=$ls['brand_id'];

	$brand=M('Brand');
	$list=$brand->where("id=$id")->find(); 
	
	$list=json_encode($list);
	echo $list;

}





}
?>