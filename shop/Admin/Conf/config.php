<?php
return array(
	/*后台常量配置*/
	'TMPL_PARSE_STRING'=>array(
        '__PUBLIC__' =>__ROOT__.'/'.APP_PATH.MODULE_NAME.'/View/Public',
        '__STATIC__' =>__ROOT__.'/'.APP_PATH.MODULE_NAME.'/View/Public/static',
        '__IMG__'    =>__ROOT__.'/'.APP_PATH.MODULE_NAME.'/View/Public/images',
        '__CSS__'    =>__ROOT__.'/'.APP_PATH.MODULE_NAME.'/View/Public/css',
        '__JS__'     =>__ROOT__.'/'.APP_PATH.MODULE_NAME.'/View/Public/js',
		),

	/* 数据缓存设置 */
	'DATA_CACHE_PREFIX'    => 'ws_', // 缓存前缀
    'DATA_CACHE_TYPE'      => 'File', // 数据缓存类型

    /* 文件上传相关配置 */
    'DOWNLOAD_UPLOAD' => array(
        'mimes'    => '', //允许上传的文件MiMe类型
        'maxSize'  => 5*1024*1024, //上传的文件大小限制 (0-不做限制)
        'exts'     => 'jpg,gif,png,jpeg,zip,rar,tar,gz,7z,doc,docx,txt,xml', //允许上传的文件后缀
        'autoSub'  => true, //自动子目录保存文件
        'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath' => './Uploads/Download/', //保存根路径
        'savePath' => '', //保存路径
        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'  => '', //文件保存后缀，空则使用原后缀
        'replace'  => false, //存在同名是否覆盖
        'hash'     => true, //是否生成hash编码
        'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
    ), //下载模型上传配置（文件上传类配置）


    /* 图片上传相关配置 */
    'PICTURE_UPLOAD' => array(
        'mimes'    => '', //允许上传的文件MiMe类型
        'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
        'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
        'autoSub'  => true, //自动子目录保存文件
        'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath' => './Uploads/Picture/', //保存根路径
        'savePath' => '', //保存路径
        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'  => '', //文件保存后缀，空则使用原后缀
        'replace'  => false, //存在同名是否覆盖
        'hash'     => true, //是否生成hash编码
        'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
    ), //图片上传相关配置（文件上传类配置）


	//AUTH权限类配置
	'AUTH_CONFIG'=>array(
        'AUTH_ON' => 1, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'ws_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'ws_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'ws_auth_rule', //权限规则表
        'AUTH_USER' => 'ws_admin',//用户信息表

        'SuperAdmin' => '1',    //不做认证的用户ID
        'NOT_AUTH_ACTION' => 'Index-index,Index-loginout' //不需要验证的方法
    ),
    

    'DATA_BACKUP_PATH' =>'./Data/backup/',  //数据库备份根路径
    'DATA_BACKUP_PART_SIZE' =>20971520, //数据库备份卷大小
    'DATA_BACKUP_COMPRESS' =>1, //数据库备份文件是否启用压缩
    'DATA_BACKUP_COMPRESS_LEVEL' =>9,   //数据库备份文件压缩级别


) ;
 ?>

