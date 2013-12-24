<?php
return array(
    /* 模块相关配置 */
    'DEFAULT_MODULE'     => 'Home',
    'MODULE_DENY_LIST'   => array('Common'),
    //'MODULE_ALLOW_LIST'  => array('Home','Admin'),

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符
    //'URL_HTML_SUFFIX'=>'html', //URL后缀名

    /* 数据库配置 */
    'DB_TYPE'   => 'mysql',
    'DB_HOST'=>'localhost',
    'DB_NAME'=>'rangjiajie',
    'DB_USER'=>'rangjiajie',
    'DB_PWD'=>'comrangjiajie',
    'DB_PREFIX'=> 'ws_',
    
 	/* 全局过滤配置 */
    'DEFAULT_FILTER' => 'htmlspecialchars', //全局过滤函数
    
    /* 调试配置 */
    'SHOW_PAGE_TRACE' => TRUE,
    
    'DB_FIELDS_CACHE'=>false,

    //'SESSION_TYPE'=>'Db',
    //'LOAD_EXT_CONFIG'=>'',    //加载配置文件



);
?>