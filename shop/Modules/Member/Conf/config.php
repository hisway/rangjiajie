<?php
return array(
	//后台常量配置
	'TMPL_PARSE_STRING'=>array(
		'__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Tpl/Public',
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








	
);
?>