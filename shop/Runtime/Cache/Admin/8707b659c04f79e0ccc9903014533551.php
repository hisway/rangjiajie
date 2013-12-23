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
<body>
<form class="form-inline definewidth m20" action="<?php echo U(GROUP_NAME.'/Member/search');?>" method="post">  
    会员列表：
    <input type="text" name="users_name" class="abc input-default" placeholder="请输入用户名" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">搜索</button>
</form>
 <form action="<?php echo U(GROUP_NAME.'/Member/setField');?>" method="post">
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
    	  <th>编号</th>
        <th>等级名称</th>
        <th>积分下限</th>
        <th>积分上限</th>
        
       
    </tr>
    </thead>
     <!--   <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>
	     	
            <td><?php echo ($i); ?></td>
            <td><?php echo ($user["username"]); ?></td>
            <td><?php if($user["sex"] == 1 ): ?>男<?php else: ?>女<?php endif; ?></td>
            <td><?php echo ($user["birthday"]); ?></td>
            <form action="<?php echo U(GROUP_NAME.'/Member/setField');?>" method="post"><td><input type="hidden" name="id" value="<?php echo ($user["id"]); ?>"/><input type="text" style="width:120px;" name="rank_points" value="<?php echo ($user["rank_points"]); ?>" /><button type="submit" class="btn btn-primary">修改</button></td></form>
            <td><?php echo ($user["email"]); ?></td>
            <td><?php echo ($user["qq"]); ?></td>
            <td><?php echo ($user["mobile_phone"]); ?></td>
            <td><?php echo ($user["home_phone"]); ?></td>
            <td><?php echo ($user["office_phone"]); ?></td>
            <td><a href="detail.html?id=<?php echo ($user["id"]); ?>">编辑</a></td>
            <td><a onclick="return del(<?php echo ($user["id"]); ?>)" href="<?php echo U(GROUP_NAME.'/Member/delUser');?>?id=<?php echo ($user["id"]); ?>">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?> -->
        </table>
        </form>
<div class="inline pull-right page">
         <?php echo ($page); ?>
</div>
</body>
</html>
<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="add.html";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>