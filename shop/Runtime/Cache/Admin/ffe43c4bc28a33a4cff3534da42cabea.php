<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="__PUBLIC__/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="__PUBLIC__/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="__PUBLIC__/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"><?php echo ($username); ?></span><a href="<?php echo U('Index/loginout');?>" title="退出系统" class="dl-log-quit">[退出]</a>

    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">商品管理</div></li>       
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">订单管理</div></li>
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">会员管理</div></li>
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>   
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">权限管理</div></li>
            <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">数据库管理</div></li>


      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="__PUBLIC__/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = 
      [
        {id:'1',homePage : '1',menu:
          [
            {text:'商品管理',items:
              [

                {id:'1',text:'商品列表',href:'__GROUP__/Goods/index'},
                {id:'2',text:'添加商品',href:'__GROUP__/Goods/detail'},
                {id:'3',text:'推荐商品',href:'__GROUP__/Recommend'},
                {id:'4',text:'下架商品',href:'__GROUP__/Off_sale'}
              ]
            },
            {text:'商品属性管理',items:
              [

                {id:'5',text:'品牌管理',href:'__GROUP__/Brand/'},
                {id:'6',text:'商品分类',href:'__GROUP__/Cate/'},
                {id:'7',text:'商品评论',href:'__GROUP__/Message/'},
                {id:'8',text:'商品关键字',href:'__GROUP__/Keyword/'}
              ]
            }
          ]
        },
        {id:'2',homePage : '1',menu:
          [
            {text:'订单管理',items:
              [
                {id:'1',text:'订单列表',href:'__GROUP__/Order/index'},
                {id:'2',text:'订单查询',href:'__GROUP__/Order/query'},
                {id:'3',text:'合并订单',href:'__GROUP__/Node/index.html'},
                {id:'4',text:'发货单列表',href:'__GROUP__/Node/index.html'},
                {id:'5',text:'退货单列表',href:'__GROUP__/Node/index.html'}
              ]
            }
          ]
        },
        {id:'3',homePage : '1',menu:
          [
            {text:'会员管理',items:
              [
                {id:'1',text:'会员列表',href:'__GROUP__/Member/index.html'},
                {id:'2',text:'添加会员',href:'__GROUP__/Member/add.html'}

              ]
            },
            {text:'会员等级管理',items:
              [
                {id:'1',text:'会员等级',href:'__GROUP__/Member/grade.html'},
                {id:'2',text:'添加等级',href:'__GROUP__/Member/addGrade.html'}
              ]
            },
            {text:'资金管理',items:
              [
                {id:'1',text:'充值提现申请',href:'__GROUP__/Node/index.html'},
                {id:'2',text:'资金管理',href:'__GROUP__/Node/index.html'}
              ]
            }
          ]
        },
        {id:'4',homePage : '5',menu:
          [
            {text:'系统管理',items:
              [
                {id:'1',text:'商店设置',href:'__GROUP__/Node/index.html'},
                {id:'2',text:'支付方式',href:'__GROUP__/Role/index.html'},
                {id:'3',text:'配送方式',href:'__GROUP__/User/index.html'},
                {id:'4',text:'友情链接',href:'__GROUP__/Menu/index.html'},
                {id:'5',text:'邮件设置',href:'__GROUP__/Menu/index.html'},
                {id:'6',text:'验证码设置',href:'__GROUP__/Menu/index.html'},
                {id:'7',text:'导航设置',href:'__GROUP__/Menu/index.html'}
              ]
            }
          ]
        },
        {id:'5',homePage : '1',menu:
          [
            {text:'权限管理',items:
              [
                {id:'1',text:'节点管理',href:'__GROUP__/Node/index.html'},
                {id:'2',text:'角色管理',href:'__GROUP__/Role/index.html'},
                {id:'3',text:'管理员管理',href:'__GROUP__/User/index.html'},
                {id:'4',text:'管理日志',href:'__GROUP__/Menu/index.html'}
              ]
            }
          ]
        },
        {id:'6',homePage : '1',menu:
          [
            {text:'数据库管理',items:
              [
                {id:'1',text:'数据备份',href:'__GROUP__/Node/index.html'},
                {id:'2',text:'数据还原',href:'__GROUP__/Node/index.html'},
              ]
            }
          ]
        },
      ];

      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>