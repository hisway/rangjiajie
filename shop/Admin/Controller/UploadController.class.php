<?php
	namespace Admin\Controller;
	class UploadController extends CommonController {
		//�ϴ�ͼƬ
		public function upload(){
			$upload= new \Org\Mrc\Upload();
			$fileElementName = 'goods_img';
			$res=$upload->upload_file($fileElementName); 
		  $list['picname']=$res['path'];
		  $list= json_encode($list);
		  echo $list;
		}
		
		
		//����ͼƬ
		public function add(){
			$upload= new \Org\Mrc\Upload();
			$fileElementName = 'add_img';
			$res=$upload->upload_file($fileElementName); 
		  $list['picname']=$res['path'];
		  $list= json_encode($list);
		  echo $list;
		}
		
}
?>