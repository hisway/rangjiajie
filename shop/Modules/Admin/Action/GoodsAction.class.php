<?php 

Class GoodsAction extends CommonAction{
	public function index(){
		import('ORG.Util.Page');
		$goods=M('Goods');
			$count      = $goods->count();// ��ѯ����Ҫ����ܼ�¼��

    $Page       = new Page($count,10);// ʵ������ҳ�� �����ܼ�¼����ÿҳ��ʾ�ļ�¼��

    $show       = $Page->show();// ��ҳ��ʾ���

// ���з�ҳ���ݲ�ѯ ע��limit�����Ĳ���Ҫʹ��Page�������

    $list = $goods->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign('page',$show);// ��ֵ��ҳ���

      $this->assign('list',$list);
	    $this->display();
	}
	
	
	public function detail(){
		
		
		$this->display();
		
	}
	
	
	public function add(){
		
$goods=D('Goods');

	
		
	}
	

	
	
	

	
}
?>