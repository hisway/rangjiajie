<?php 
namespace Admin\Controller;

Class GoodsController extends CommonController{

	public function index(){
		$goods=M('Goods');
		$count = $goods->count();// 查询满足要求的总记录数

	  $Page = new \Org\Mrc\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

	  $show = $Page->show();// 分页显示输出

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
		
		
		$kid=$_POST['kid'];
		$kid=implode(",",$kid);
		$good=M('Goods');
	 //$data['goods_img']	= $_POST['g_image']; 图片及时显示
    $front=$_POST['myFilePath'];
    $front=implode(',',$front);
    $data['goods_img']=$front.","; 
 
		$data['goods_name']	= $_POST['goods_name'];
		if(!empty($_POST['sn_image'])){
	  $data['goods_sn']	= $_POST['sn_image'];
	   }
		
		$data['cat_id']	= $_POST['cat_id'];
		$data['brand_id']	= $_POST['brand_id'];
		$data['keyword_id']	= $kid;
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
			$this->success('写入数据库成功');	
		}else{
			echo $good->getLastsql();
		}
	
	}



  public function edit(){
  	$good=M("Goods");	
		$id=$_GET['id'];	
		$list=$good->where("id=$id")->find();	
  	$this->assign('list',$list);	
  	$this->display();
	}



	public  function modify(){
	
		$id=$_POST['id'];
		$kid=$_POST['kid'];
		$kid=implode(",",$kid);
	  $good=M('Goods');
	  if(!empty($_POST['add_img'])){
		//新增的图片
		$add_img=$_POST['add_img'];
		$add_img=implode(",",$add_img);
	 
	 
	  $res=$rs=$good->where("id= $id")->find();
		$goods_img=$res['goods_img'];
		$goods_img=$goods_img.$add_img.",";
		
	  $data['goods_img']=$goods_img;
	}
		$data['goods_name']=$_POST['goods_name'];
    $data['cat_id']	= $_POST['cat_id'];
		$data['brand_id']	= $_POST['brand_id'];
		$data['keyword_id']	= $kid;
		$data['is_on_sale']	= $_POST['is_on_sale'];
		$data['is_best']	= $_POST['is_best'];
		$data['is_promote']	= $_POST['is_promote'];
		$data['market_price']	= $_POST['market_price'];
		$data['promote_price']	= $_POST['promote_price'];
		$data['promote_start_date']	= $_POST['promote_start_date'];
		$data['promote_end_date']	= $_POST['promote_end_date'];
		$data['goods_desc']	= $_POST['goods_desc'];	
		$rs=$good->where("id= $id")->data($data)->save();
		
		if($rs){
		  	$this->success('更新成功');		
			}else{
		    $this->success('更新成功'); 
			}
}


	public function search(){


		$terms=$_GET['terms'];
	  $goods=M('Goods');
		$count = $goods->where("goods_name like"." "."'%".$terms."%'")->count();// 查询满足要求的总记录数
	  $Page = new \Org\Mrc\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
	  $show = $Page->show();// 分页显示输出
    $list = $goods->limit($Page->firstRow.','.$Page->listRows)->where("goods_name like"." "."'%".$terms."%'")->select();
   
    
    foreach($list as $key=> $value){
    	$attr=$value['goods_name'];
    	$value['goods_name']=highlight($attr,$terms);
    	$list[$key]=$value;   		   	
    }
    
    
    $this->assign('page',$show);// 赋值分页输出
    $this->assign('list',$list);
	  $this->display(index);
	
	}
	
	
	
//生成二维码
	public function get_goods_sn(){
  vendor('phpqrcode.phpqrcode');
  $id=$_GET['id'];   
  $c =$_GET['content'];
  if($id){
  	
  $good=M("Goods");	
  
  $list=$good->where("id=$id")->find();	
  $sn_image=$list['goods_sn'];	
  	if($sn_image){
  		
  	@unlink("Uploads/ewm/$sn_image");
  	$t=uniqid();
  	\QRcode::png($c, 'Uploads/ewm/'.$t.'.png'); 
  	$list['sn_image']=$t.'.png';
  	$list['sn_content']=$c;
  	//更新数据库里的goods_sn
  	$data['goods_sn']=$list['sn_image'];
  	$good->where("id= $id")->data($data)->save();
    $list=json_encode($list);	
  	echo $list;	
  				
  	}else{
  		
  	$t=uniqid();
  	\QRcode::png($c, 'Uploads/ewm/'.$t.'.png'); 
  	$list['sn_image']=$t.'.png';
  	$list['sn_content']=$c;
  	//更新数据库里的goods_sn
  	$data['goods_sn']=$list['sn_image'];
  	$good->where("id= $id")->data($data)->save();
  	$list=json_encode($list);	
  	echo $list;		
  	
  	}
  }else{
  	
  $t=uniqid();
  \QRcode::png($c, 'Uploads/ewm/'.$t.'.png'); 
  $list['sn_image']=$t.'.png';
  $list['sn_content']=$c;
  $list=json_encode($list);	
  echo $list;
  
  }
	}
	
	
	
	
	public function get_goods_img_byid(){
		$id=$_GET['id'];
		$d_img=$_GET['d_img'];
		$good=M('Goods');	
		if(!$d_img){
		$rs=$good->where("id=$id")->find();
		$list['goods_img']  =$rs['goods_img'];
		$list=json_encode($list);	
	  echo $list;
		}else{
		$rs=$good->where("id=$id")->find();
		$list['goods_img']  =$rs['goods_img'];
		$list['goods_img']=str_replace("$d_img,","",$list['goods_img']);	
		$data['goods_img']=$list['goods_img'];
  	$list=$good->where("id= $id")->data($data)->save();
  	@unlink("Uploads/images/$d_img");
		$list=json_encode($list);	
	  echo $list;		
		}
	}

	

	
}
?>