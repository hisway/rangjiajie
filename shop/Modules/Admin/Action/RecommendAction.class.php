<?php
class RecommendAction extends Action {
public function index(){
		import('ORG.Util.Page');
		$goods=M('Goods');
			$count      = $goods->where('is_best = 1 and is_on_sale= 1')->count();// ��ѯ����Ҫ����ܼ�¼��

    $Page       = new Page($count,10);// ʵ������ҳ�� �����ܼ�¼����ÿҳ��ʾ�ļ�¼��

    $show       = $Page->show();// ��ҳ��ʾ���

// ���з�ҳ���ݲ�ѯ ע��limit�����Ĳ���Ҫʹ��Page�������

    $list = $goods->limit($Page->firstRow.','.$Page->listRows)->where('is_best = 1 and is_on_sale= 1')->select();
      $this->assign('page',$show);// ��ֵ��ҳ���

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