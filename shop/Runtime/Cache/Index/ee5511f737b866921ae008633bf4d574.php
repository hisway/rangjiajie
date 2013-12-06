<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo ($keywords); ?>" />
<meta name="Description" content="<?php echo ($description); ?>" />
<!-- TemplateBeginEditable name="doctitle" -->
<title><?php echo ($page_title); ?></title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link rel="shortcut icon" href="__PUBLIC__/images/favicon.ico" />
<link rel="icon" href="__PUBLIC__/images/animated_favicon.gif" type="image/gif" />
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo ($page_title); ?>" href="<?php echo ($feed_url); ?>" />
<script type="text/javascript" src="/rangjiajie/Public/js/common.js"></script><script type="text/javascript" src="/rangjiajie/Public/js/index.js"></script>
</head>
<body class="index_page">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="themes/ecmoban_aizhigu/qq/images/qq.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var process_request = "<?php echo ($lang["process_request"]); ?>";
</script>


 
<!--顶部导航-->
<div class="topNav">
<script type="text/javascript">
          //初始化主菜单
            function sw_nav(obj,tag)
            {
     
            var DisSub = document.getElementById("DisSub_"+obj);
            var HandleLI= document.getElementById("HandleLI_"+obj);
                if(tag==1)
                {
                    DisSub.style.display = "block";
             
                    
                }
                else
                {
                    DisSub.style.display = "none";
                
                }
     
            }
     
    </script>

<div class="block clearfix" >
 <!--顶部微博微信弹出区域-->
        <ul class="top_bav_l">
        <li class="lovesave">
            <a href="javascript:void(0);" onclick="AddFavorite('我的网站',location.href)">收藏我们</a></li>
            <li>关注我们：</li>
            <li style="border:none" class="menuPopup"  onMouseOver="sw_nav(1,1);" onMouseOut="sw_nav(1,0);">
            <a id="HandleLI_1" href="javascript:;" title="微博" class="attention"></a> 
            <div id=DisSub_1 class="top_nav_box  top_weibo"> 
            <a href="http://e.weibo.com/ECMBT" target="_blank" title="新浪微博" class="top_weibo"></a>
            <a href="http://e.t.qq.com/ecmoban_com" target="_blank" title="QQ微博" class="top_qq"></a> 
            </div> 
            </li> 
            <li class="menuPopup" onMouseOver="sw_nav(2,1);" onMouseOut="sw_nav(2,0);">
            <a id="HandleLI_2" href="javascript:;" title="微信" class="top_weixin"></a> 
            <div id=DisSub_2 class="  weixinBox" style="display:none;"> 
            <img src="images/weixin.png"> 
            </div> 
            </li>
        </ul>
    <!--顶部微博微信弹出区域end-->
<div class="f_r" style="width:320px;">

 {insert_scripts files='jquery.SuperSlide.js,utils.js'}
 
   <div id="ECS_MEMBERZONE" class="f_r">
    
     {* ECSHOP 提醒您：根据用户id来调用member_info.lbi显示不同的界面  *}{insert name='member_info'}
    </div>
   
   
  <!--{if $navigator_list.top}-->
     <div class="f_l">
        <!-- {foreach name=nav_top_list from=$navigator_list.top item=nav} -->
         <a class="jifen" href="<?php echo ($nav["url"]); ?>" 
        <!-- {if $nav.opennew eq 1} -->
        target="_blank"
        <!-- {/if} -->
        ><?php echo ($nav["name"]); ?></a>
        <!-- {/foreach} -->
      </div>
        <!-- {/if} -->  
</div>

 </div>
</div>







<div style="background:#f8f7f7" class="clearfix"> 
    <div class="block header">
        <div class="block clearfix">
        <div class="f_l">
        <a href="../index.php" class="logo"><img src="../images/logo.gif">  </a>
      
         <div class="top_goodness"> 
            <img src="../images/service.gif">
            </div>
            </div>
            
        <div class="top_shopCart f_r"  >
         <s><span class="buy_num"><span id="ECS_CARTINFO">
            {insert name='cart_info'}
            </span></span></s>
          
            <a class="jiesuan" href="flow.php">去购物车结算</a>
            <span class="bg">&nbsp;</span>
            </div> 
             
      
        </div>
    </div> 
</div>
<div style="clear:both"></div>
 
<div class="menu_box clearfix"> 
<div class="block" style="position:relative;"> 
<div class="menu">
  <a href="../index.php"{if $navigator_list.config.index eq 1} class="cur"{/if}><?php echo ($lang["home"]); ?><span></span></a>
  <!-- {foreach name=nav_middle_list from=$navigator_list.middle item=nav} -->
  <a href="<?php echo ($nav["url"]); ?>" {if $nav.opennew eq 1}target="_blank" {/if} {if $nav.active eq 1} class="cur"{/if}>
<?php echo ($nav["name"]); ?>
 <span></span>
</a>
 
 <!-- {/foreach} -->
 
 <div class="top_search"> 
        <script type="text/javascript">
            {literal}
            <!--
            function checkSearchForm()
            {
                if(document.getElementById('keyword').value)
                {
                    return true;
                }
                else
                {
                    alert("<?php echo ($lang["no_keywords"]); ?>");
                    return false;
                }
            }
            -->
            {/literal}
            </script>
          <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()"  style="_position:relative; top:5px;">
          <input name="keywords" type="text" id="keyword" class="keyword" value="<?php echo ($search_keywords); ?>"  />
          <input type="image" src="images/search_sub.jpg" name="搜索" class="search_go">
        </form>
        <div class="vjia-suggest-container"><div class="vjia-suggest-content"></div>
            <ol>
            </ol>
        </div> 
        <div style="clear:both"></div> 
        {if $searchkeywords}
            <div class="search_tig">
                {foreach from=$searchkeywords item=val}
                <a href="search.php?keywords=<?php echo ($val); ?>" target="_blank" class="track"><?php echo ($val); ?></a>
                {/foreach}
            </div>    
        {/if}
        </div>
</div> 
</div>
</div>
 
 

 



<!-- #BeginLibraryItem "/library/page_header.lbi" --><!-- #EndLibraryItem -->

<div class="block clearfix">
<div class="AreaL">
<!-- #BeginLibraryItem "/library/category_tree_index.lbi" -->


  <div id="category_tree">
  <div class="tit"><img src="__PUBLIC__/images/category_tit.gif"> </div>
  <div class="clearfix" style=" border:1px solid #ccc; border-top:none">
    <!--{foreach from=$categories item=cat}-->
     <dl>
     <dt><a href="<?php echo ($cat["url"]); ?>"><?php echo ($cat["name"]); ?></a></dt>
	 
     <dd>
	 <!--{foreach from=$cat.cat_id item=child}-->
     <a href="<?php echo ($child["url"]); ?>"><?php echo ($child["name"]); ?></a>
      
     <!--{/foreach}-->
       </dd>
       </dl>
    <!--{/foreach}--> 
  </div>
</div>
<div class="blank"></div>

 <!-- #EndLibraryItem -->
<!-- TemplateBeginEditable name="左边区域" -->
<!-- TemplateEndEditable -->

    <!--AD end-->
  </div>

<div class="AreaR" style="width:1050px;"> 
<!-- #BeginLibraryItem "/library/index_ad.lbi" --><!-- #EndLibraryItem -->
</div>
 <div class="blank" style="height:0px; line-height:0px;"></div> 
<!-- TemplateBeginEditable name="促销商品区域" -->
<!-- #BeginLibraryItem "/library/recommend_promotion.lbi" -->

<!-- {if $promotion_goods} -->
<div class="sale_box clearfix">
<div class="tit"><span>特价商品</span></div>

 
      <div class="clearfix">
         <!--{foreach from=$promotion_goods item=goods name="promotion_foreach"}-->
        
           <ul class="clearfix">
           <li class="goodsimg"><a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" border="0" alt="<?php echo ($goods["name"]); ?>" class="B_blue"/></a></li>
			<li> <p><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_name"]); ?></a></p>
           <?php echo ($lang["promote_price"]); ?><font class="f1"><?php echo ($goods["promote_price"]); ?></font></li>
           </ul>

         <!--{/foreach}-->
       </div>
 </div>
 
<div class="blank"></div>
<!-- {/if} -->
 <!-- #EndLibraryItem -->
<!-- TemplateEndEditable -->

 
  
    <div class="blank"></div> 
 
  
  <div class="goodsBox_1">
  <!-- TemplateBeginEditable name="首页右侧区域" -->
<!-- TemplateEndEditable -->
  
  <!-- TemplateBeginEditable name="全宽行" -->
<!-- #BeginLibraryItem "/library/recommend_new.lbi" -->

<!-- {if $new_goods} -->
<!-- {if $cat_rec_sign neq 1} -->
<div class="xm-box">
<h4 class="title"><span>新品上架</span> <a class="more" href="../search.php?intro=new">更多</a></h4>
<div class="blank"></div>
<div id="show_new_area" class="clearfix">
  <!-- {/if} -->
  <!--{foreach from=$new_goods item=goods}-->
  <div class="goodsItem">
       
           <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a><br />
           <p class="f1"><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
           
           
 市场价：<font class="market"><?php echo ($goods["market_price"]); ?></font> <br/>
      
           本店价：<font class="f1">
           <!-- {if $goods.promote_price neq ""} -->
          <?php echo ($goods["promote_price"]); ?>
          <!-- {else}-->
          <?php echo ($goods["shop_price"]); ?>
          <!--{/if}-->
           </font>      
		    
        </div>
  <!--{/foreach}-->
 
  <!-- {if $cat_rec_sign neq 1} -->
  </div>

</div>
<div class="blank"></div>
  <!-- {/if} -->
<!-- {/if} -->

 <!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/recommend_hot.lbi" -->

<!-- {if $hot_goods} -->
<!-- {if $cat_rec_sign neq 1} -->
<div class="xm-box">
<h4 class="title"><span>热卖商品</span> <a class="more" href="../search.php?intro=hot">更多</a></h4>
<div class="blank"></div>
<div id="show_hot_area" class="clearfix">
  <!-- {/if} -->
  <!--{foreach from=$hot_goods item=goods}-->
  <div class="goodsItem">
       
           <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a><br />
           <p class="f1"><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
           
           
 市场价：<font class="market"><?php echo ($goods["market_price"]); ?></font> <br/>
      
           本店价：<font class="f1">
           <!-- {if $goods.promote_price neq ""} -->
          <?php echo ($goods["promote_price"]); ?>
          <!-- {else}-->
          <?php echo ($goods["shop_price"]); ?>
          <!--{/if}-->
           </font>      
		    
        </div>
  <!--{/foreach}-->
 
  <!-- {if $cat_rec_sign neq 1} -->
  </div>

</div>
<div class="blank"></div>
  <!-- {/if} -->
<!-- {/if} -->

 <!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/recommend_best.lbi" -->

<!-- {if $best_goods} -->
<!-- {if $cat_rec_sign neq 1} -->
<div class="xm-box">
<h4 class="title"><span>精品推荐</span> <a class="more" href="../search.php?intro=best">更多</a></h4>
<div class="blank"></div>
<div id="show_best_area" class="clearfix">
  <!-- {/if} -->
  <!--{foreach from=$best_goods item=goods}-->
  <div class="goodsItem">
       
           <a href="<?php echo ($goods["url"]); ?>"><img src="<?php echo ($goods["thumb"]); ?>" alt="<?php echo ($goods["name"]); ?>" class="goodsimg" /></a><br />
           <p class="f1"><a href="<?php echo ($goods["url"]); ?>" title="<?php echo ($goods["name"]); ?>"><?php echo ($goods["short_style_name"]); ?></a></p>
           
           
 市场价：<font class="market"><?php echo ($goods["market_price"]); ?></font> <br/>
      
           本店价：<font class="f1">
           <!-- {if $goods.promote_price neq ""} -->
          <?php echo ($goods["promote_price"]); ?>
          <!-- {else}-->
          <?php echo ($goods["shop_price"]); ?>
          <!--{/if}-->
           </font>      
		    
        </div>
  <!--{/foreach}-->
 
  <!-- {if $cat_rec_sign neq 1} -->
  </div>

</div>
<div class="blank"></div>
  <!-- {/if} -->
<!-- {/if} -->

 <!-- #EndLibraryItem -->
<!-- TemplateEndEditable -->
  </div> 
  
    </div>
  <!--right end-->
  
  
 


   
 
<!-- #BeginLibraryItem "/library/help.lbi" --><!-- #EndLibraryItem -->
<!-- #BeginLibraryItem "/library/page_footer.lbi" --><!-- #EndLibraryItem -->
</body>
</html>