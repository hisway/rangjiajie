<?php
return array(
	//后台常量配置
	'TMPL_PARSE_STRING'=>array(
		'__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Tpl/Public',
		),

	//AUTH权限类配置
	'AUTH_CONFIG'=>array(
        'AUTH_ON' => 0, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'ws_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'ws_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'ws_auth_rule', //权限规则表
        'AUTH_USER' => 'ws_user'//用户信息表
    ),

    //腾讯QQ登录配置
	'THINK_SDK_QQ' => array(
		'APP_KEY'    => '100553441', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '5a957c695fc5c18b798d6205c8af2b72', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'qq',
	),
	//腾讯微博配置
	'THINK_SDK_TENCENT' => array(
		'APP_KEY'    => '100553441', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '5a957c695fc5c18b798d6205c8af2b72', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'tencent',
	),










	) ;
 ?>