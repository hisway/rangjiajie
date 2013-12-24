<?php
namespace Admin\Controller;
class BrandController extends CommonController {
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
	$cat_id=$_GET['cat_id'];
	$good=M('Goods');
	$ls=$good->where("id=$id")->find();
	$bid=$ls['brand_id'];
	$brand=M('Brand');
  $list=$brand->where("id=$bid")->find(); 	 
	$b=$list['id'];
	$list=$brand->where("cat_id=$cat_id")->select();

 foreach($list as $key => $l){  
$list[$key]['b_id']=$b;
}
	$list=json_encode($list);
	echo $list;

}






}
?>