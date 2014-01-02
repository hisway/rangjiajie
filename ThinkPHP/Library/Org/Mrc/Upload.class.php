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
	function upload_file() {
		  for($i = 0; $i < count ( $_FILES ["goods_img"] ["tmp_name"] ); $i ++) {
			$this->upload_error = $_FILES ['goods_img'] ['error'] [$i];
			$this->upload_name = $_FILES ["goods_img"] ["name"] [$i]; // 取得上传文件名
			$this->upload_filetype = $_FILES ["goods_img"] ["type"] [$i];
			$this->upload_server_name = date ( "Y_m_dH_i_s" ) .substr($this->upload_name, -10) ;
			$this->upload_tmp_address = $_FILES ["goods_img"] ["tmp_name"] [$i]; // 取得临时地址
			$this->file_type = array (
					"image/gif",
					"image/pjpeg",
					"image/jpeg" 
			); // 允许上传文件的类型
			$this->upload_file_size = $_FILES ["goods_img"] ["size"] [$i]; // 上传文件的大小
			                                                          // $res['name'][]=$this->upload_name;
			if (in_array ( $this->upload_filetype, $this->file_type )) {
				
				if ($this->upload_file_size < $this->upload_must_size) {
					$res ['name'] [] = $this->upload_name;
					// echo("第'$i'个上传成功，谢谢支持");
					$this->file_server_address = $_SERVER ["DOCUMENT_ROOT"] . "/Uploads/" . $this->upload_server_name;
					
					if (move_uploaded_file ( $this->upload_tmp_address, $this->file_server_address )) {
						
						$res ['path'] [$i] = "/Uploads/" . $this->upload_server_name;
					}
				} else {
					// echo("第'$i'个文件容量太大");
					// $res[]="";
					$res ['error'] [$i] = "第" . ($i + 1) . "个文件容量太大";
				}
			} else {
				// echo("第'$i'个不支持此文件类型，请重新选择");
				// $res[]="";
				$res ['error'] [$i] = "第" . ($i + 1) . "个不支持此文件类型，请重新选择";
			}
		}
		
		return $res;
	}
}