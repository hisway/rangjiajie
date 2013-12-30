<?php 
namespace Admin\Controller;
Class GoodsController extends CommonController{
	public function index(){
		$goods=M('Goods');
		$count = $goods->count();// 查询满足要求的总记录数

	  $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

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

   
	  if(empty($_FILES)){
		
		$this->error("请选择要上传的文件");
		
	  }else{
	    $file=$this->up();
	
    if ($this->c($file)){
	
      $this->success('写入数据库成功');	
	
    }else{
	    $good=M('Goods');
      echo $good->getLastsql();
	
    }
	}
	
	
	
}

private function up(){
	
		
		$config = array(
	      'mimes'    => array(), //允许上传的文件MiMe类型
        'maxSize'  => 0, //上传的文件大小限制 (0-不做限制)
        'exts'     => array(), //允许上传的文件后缀
        'autoSub'  => true, //自动子目录保存文件
        'subName'  => array('date', 'Y/m/d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
    	  'rootPath' => './Uploads/', //保存根路径
        'savePath' => 'images/', //保存路径
        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'  => '', //文件保存后缀，空则使用原后缀
        'replace'  => false, //存在同名是否覆盖
        'hash'     => true, //是否生成hash编码
        'callback' => false, //检测文件是否存在回调，如果存在返回文件信息数组
	);
		$upload= new \Think\Upload($config);
		$info=$upload->upload($_FILES);
		if($info){
			return $info;
		}
		else{	
			$this->error($upload->getError());
	
		}
	}


	private function c($file){
	
		$kid=$_POST['kid'];
		$kid=implode(",",$kid);
		$good=M('Goods');
		$data['goods_img']	= $file['goods_img']['savepath'].$file['goods_img']['savename'];
		$data['goods_name']	= $_POST['goods_name'];
		$data['goods_sn']	= $_POST['goods_sn'];
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



	public  function modify(){
	
		$id=$_POST['id'];
		
	  $kid=$_POST['kid'];
		$kid=implode(",",$kid);
	
	  $good=M('Goods');
		$data['goods_name']	= $_POST['goods_name'];
		$data['goods_sn']	= $_POST['goods_sn'];
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
	
		$rs=  $good->where("id= $id")->data($data)->save();
		if($rs){
		
		  	$this->success();
			
			}else{
		
		    echo $good->getLastsql();
		
			}
	
}

	

	
}
?>