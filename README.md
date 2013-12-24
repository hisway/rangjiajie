http://rangjiajie.com

=====================================================================================================

##目录结构 /var/www/html
deploy root
            |shop   |Common |Common                 //应用公共函数目录
                            │Conf                   //应用公共配置文件目录

                    |Home   |Common                 //模块函数公共目录
                            |conf                   //模块配置文件目录
                            |Controller             //模块控制器目录
                            |Model                  //模块模型目录
                            |View                   //模块视图文件目录

                    |Admin  |Common                 
                            |conf
                            |Controller
                            |Model
                            |View
                                |Public

                    |Runtime    |Cache              //模版缓存目录
                                |Data               //数据目录
                                |Logs               //日志目录
                                |Temp               //缓存目录

            |Public                                 //应用资源文件目录

            |Uploads                                //文件上传目录

            |ThinkPHP   |Conf                       //核心配置目录
                        |Common                     //核心公共函数目录
                        |Lang                       //核心语言包目录
                        |Library    |Think          //核心Think类库包目录
                                    |Behavior       //行为类库包目录
                                    |Org            //Org类库包目录
                                    |Vender         //第三方类库包目录
                        |Extend                     //框架扩展目录
                        |Tpl                        //系统模版目录

            -index.php                              //入口文件
            -README.md                              //README文件

=====================================================================================================

数据库：
https://198.46.145.47:7777/thirdparty/phpMyAdmin/ 
    'DB_HOST'=>'localhost',
    'DB_NAME'=>'rangjiajie',
    'DB_USER'=>'rangjiajie',
    'DB_PWD'=>'comrangjiajie'

FTP:
198.46.145.47  rangjiajie.com   comrangjiajie

=====================================================================================================

分工

C 商品管理

X 订单管理

Z 会员管理

H 系统管理

=====================================================================================================

资源：
ThinkPHP3.2完全开发手册  http://document.thinkphp.cn/manual_3_2.html

