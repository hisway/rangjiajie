<?php

namespace Org\Mrc;

class Upload {	
	var $upload_name;
	var $upload_tmp_address;
	var $upload_server_name;
	var $upload_filetype;
	var $file_type;
	var $file_server_address;
	var $image_w = 900; // 要显示图片的宽
	var $image_h = 350; // 要显示图片的高
	var $upload_file_size;
	var $upload_must_size = 5000000; // 允许上传文件的大小，自己设置
	var $upload_error;
	function upload_file($fileElementName) {
		 
			$this->upload_error = $_FILES [$fileElementName] ['error'];
			$this->upload_name = $_FILES [$fileElementName] ["name"]; // 取得上传文件名
			$this->upload_filetype = $_FILES [$fileElementName] ["type"] ;
			$this->upload_server_name = date ( "Y_m_dH_i_s" ) .substr($this->upload_name, -10) ;
			$this->upload_tmp_address = $_FILES [$fileElementName] ["tmp_name"]; // 取得临时地址
			
			$this->file_type = array (
					"image/gif",
					"image/pjpeg",
					"image/jpeg" 
			); // 允许上传文件的类型
			$this->upload_file_size = $_FILES [$fileElementName] ["size"]; // 上传文件的大小                                                        // $res['name'][]=$this->upload_name;
			if (in_array ( $this->upload_filetype, $this->file_type )) {
				
				if ($this->upload_file_size < $this->upload_must_size) {
					$res ['name']= $this->upload_server_name;			
					$this->file_server_address = $_SERVER ["DOCUMENT_ROOT"] . "rangjiajie/Uploads/" . $this->upload_server_name;
					if (move_uploaded_file ( $this->upload_tmp_address, $this->file_server_address )) {	
					$res ['path'] = "/Uploads/" . $this->upload_server_name;
					}
				} else {
				
				 $res ['error'] = "文件容量太大";
				}
			} else {
				
			$res ['error'] = "不支持此文件类型，请重新选择";
			}
	
		
		return $res;
	}
}
?>