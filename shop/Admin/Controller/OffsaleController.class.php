<?php
namespace Admin\Controller;
class OffsaleController extends CommonController {
public function index(){
		import('ORG.Util.Page');
		$goods=M('Goods');
	  $count      = $goods->where('is_on_sale = 0')->count();// 查询满足要求的总记录数

    $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

    $show       = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

    $list = $goods->limit($Page->firstRow.','.$Page->listRows)->where('is_on_sale = 0')->select();
      $this->assign('page',$show);// 赋值分页输出

      $this->assign('list',$list);
	    $this->display();
	}
	




public function modify(){

$id=$_GET['id'];
//$id = I('id');
//echo $id;exit;
$data['is_on_sale']=1;
$data['create_time']=date("Y-m-d H:i:s");	
$good=M('Goods');	
$list=$good->where("id=$id")->save($data);
echo $id;
}







}
?>