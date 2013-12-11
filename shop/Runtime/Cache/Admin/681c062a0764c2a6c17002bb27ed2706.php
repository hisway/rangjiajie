<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/style.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/jquery.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/bootstrap.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/ckform.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<form action="__URL__/add" method="post" enctype="multipart/form-data">
<table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">产品名称</td>
        <td><input type="text" name="goods_name"/></td>
    </tr>
    
    <tr>
    	<td class="tableleft">产品类别</td>
    	<td>
    <select name="cat_id" size="1">
		          <option value="0">根栏目</option>          
		</select> 
	    </td>       
		</tr>
		
    <tr>
        <td class="tableleft">商品品牌</td>
        <td>
        	<select name="brand_id" size="1">
		          <option value="0">根栏目</option>          
		</select> 
		</td>
    </tr>    
    <tr>
        <td width="10%" class="tableleft">关键字</td>
        <td><input type="text" name="keywords"/></td>
    </tr>
    
     <tr>
        <td width="10%" class="tableleft">商品描述</td>
        <td><textarea name="good_desc"/></textarea></td>
    </tr>
    
    <tr>
        <td width="10%" class="tableleft">商品图片</td>
        <td><input type="file" name="name"></td>
    </tr>
    
    
     <tr>
        <td class="tableleft">是否上架</td>
        <td>
            <input type="radio" name="is_on_sale" value="1" checked/> 是
            <input type="radio" name="is_on_sale" value="0"/> 否
        </td>
    </tr>
    
     <tr>
        <td class="tableleft">是否促销</td>
        <td>
            <input type="radio" name="is_promote" value="1" checked/> 是
            <input type="radio" name="is_promote" value="0"/> 否
        </td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">市场价</td>
        <td><input type="text" name="market_price"/></td>
    </tr>
    <tr>
        <td width="10%" class="tableleft">促销价</td>
        <td><input type="text" name="promote_price"/></td>
    </tr>
    
     <tr>
        <td width="10%" class="tableleft">促销时间</td>
        <td><input type="text" name="promote_start_date"/> - <input type="text" name="promote_end_date"/></td>
    </tr>
    
    
    
    
   
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });

    });
</script>