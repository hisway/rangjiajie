<?php
class RecommendAction extends Action {
public function index(){
		import('ORG.Util.Page');
		$goods=M('Goods');
			$count      = $goods->where('is_best = 1 and is_on_sale= 1')->count();// 查询满足要求的总记录数

    $Page       = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数

    $show       = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

    $list = $goods->limit($Page->firstRow.','.$Page->listRows)->where('is_best = 1 and is_on_sale= 1')->select();
      $this->assign('page',$show);// 赋值分页输出

      $this->assign('list',$list);
	    $this->display();
	}
	


public function unrecommend(){
$id=$_GET['id'];
$data['is_best']=0;
$good=M('Goods');	
$list=$good->where("id=$id")->save($data);
//echo  $good->getLastsql();
echo $id;


}


public function modify(){

$id=$_GET['id'];
$data['create_time']=date("Y-m-d H:i:s");
$good=M('Goods');	
$list=$good->where("id=$id")->save($data);

echo  date("Y-m-d H:i:s");

}




}
?>