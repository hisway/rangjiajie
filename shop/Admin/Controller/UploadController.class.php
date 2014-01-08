<?php
	namespace Admin\Controller;
	class UploadController extends CommonController {
		//上传图片
		public function upload(){
			$upload= new \Org\Mrc\Upload();
			$fileElementName = 'goods_img';
			$res=$upload->upload_file($fileElementName); 
		  $list['picname']=$res['path'];
		  $list= json_encode($list);
		  echo $list;
		}
		
		
		//增加图片
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