<?php
	// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 定义应用目录
define('APP_PATH','./shop/');

define('APP_DEBUG', TRUE);

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';


?>