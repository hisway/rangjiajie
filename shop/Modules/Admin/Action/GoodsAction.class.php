<?php 

Class GoodsAction extends CommonAction{
	public function index(){
		import('ORG.Util.Page');
		$goods=M('Goods');
			$count      = $goods->count();// 查询满足要求的总记录数

    $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

    $show       = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

    $list = $goods->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign('page',$show);// 赋值分页输出

      $this->assign('list',$list);
	    $this->display();
	}
	
	
	public function detail(){
		
		
		$this->display();
		
	}	
	public function add(){
	if(empty($_FILES)){
		
		$this->error("请选择要上传的文件");
	}else{
	$file=$this->up();
if ($this->c($file)){
	
$this->success('写入数据库成功');	
	
}else{
	
echo $good->getLastsql();

	
}
	}
	
	
	
}

private function up(){
	import('ORG.Net.UploadFile');
	$upload=new UploadFile();
	$upload->maxSize="1000000";   //1M  默认为-1  无限制上传
	$upload->savePath='./Public/images/';//上传保存的路径 与主入口文件平级   
  $upload->saveRule=time;//上传文件名 保存规则
  $upload->uoloadReplace=true;  //同名文件进行覆盖
  $upload->allowExts=array('jpg','jpeg','png','gif');
  $upload->allowTypes=array('image/png','image/jpg','image/pjpeg','image/gif','image/jpeg');
  $upload->autoSub=true;
  $upload->subType=date;  
  $upload->dateFormat='Y/M/D';
  
if($upload->upload()){
$info =  $upload->getUploadFileInfo();   //获取上传的信息  
return $info;
}
else{	
	$this->error($upload->getErrorMsg());
	
}
}


private function c($file){
	
$good=M('Goods');
$data['goods_img']	= $file[0]['savename'];
$data['goods_name']	= $_POST['goods_name'];
$data['goods_sn']	= $_POST['goods_sn'];
$data['cat_id']	= $_POST['cat_id'];
$data['brand_id']	= $_POST['brand_id'];
$data['keyword_id']	= $_POST['kid'];
$data['is_on_sale']	= $_POST['is_on_sale'];
$data['is_best']	= $_POST['is_best'];
$data['is_promote']	= $_POST['is_promote'];
$data['market_price']	= $_POST['market_price'];
$data['promote_price']	= $_POST['promote_price'];
$data['promote_start_date']	= $_POST['promote_start_date'];
$data['promote_end_date']	= $_POST['promote_end_date'];
$data['goods_desc']	= $_POST['goods_desc'];
$data['create_time']=date("Y-m-d H:i:s");	
if ($good->data($data)->add())
{
	return true;
	}else{
		return false;
	}
	
}



public function edit(){
	
	$good=M("Goods");
	
	$id=$_GET['id'];
	
	$list=$good->where("id=$id")->find();
	
  $this->assign('list',$list);
	
  $this->display();
	
}

	

	
}
?>