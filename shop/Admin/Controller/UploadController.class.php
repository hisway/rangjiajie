<?php
	namespace Admin\Controller;
	class UploadController extends CommonController {
		public function upload(){
			$upload= new \Org\Mrc\Upload();
			$fileElementName = 'goods_img';
			$res=$upload->upload_file($fileElementName); 
		  $list['picname']=$res['name'];
		  $list= json_encode($list);
		  echo $list;
		}
}
?>