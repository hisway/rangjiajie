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
    <script type="text/javascript" src="__PUBLIC__/Js/cate_de.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/DropDownListBox.js"></script>

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
<form class="form-inline definewidth m20" action="index.html" method="get">  
    节点名称：
    <input type="text" name="rolename" id="rolename"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增节点</button>
</form>

            <form action="<?php echo U(GROUP_NAME.'/Node/sortAuth');?>" method='post'>
                <table class="table table-bordered table-hover definewidth m10">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>节点名称</th>
                            <th>MODEL</th>
                            <th>ACTION</th>
                            <th>规则表达式</th>
                            <!-- <th>排序</th> -->
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($rule)): foreach($rule as $key=>$v): ?><tr>
                            <td><?php echo ($v["id"]); ?></td>
                            <td><?php echo ($v["title"]); ?></td>
                            <td><?php echo ($v["model"]); ?></td>
                            <td><?php echo ($v["action"]); ?></td>
                            <td><?php echo ($v["condition"]); ?></td>
                            <td><?php if($v["status"] == 1): ?>启用<?php else: ?>禁用<?php endif; ?></td>
                            <td>
                                <!-- <a href="<?php echo U(GROUP_NAME.'/Node/add',array('id'=>$v['id']));?>"><i class="icon-plus"></i></a> -->
                                <a href="<?php echo U(GROUP_NAME.'/Node/edit',array('id'=>$v['id']));?>"><i class="icon-pencil"></i></a>
                                <a href="<?php echo U(GROUP_NAME.'/Node/del',array('id'=>$v['id']));?>"><i class="icon-remove"></i></a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    <!-- <tr>
                        <td colspan='5'>
                            <input type="submit" class="btn btn-primary" value='排序'/>
                        </td>
                    </tr> -->
                    <tbody>
                </table>
            </form>
<div class="inline pull-right page">
         10122 条记录 1/507 页  <a href='#'>下一页</a>     <span class='current'>1</span><a href='#'>2</a><a href='/chinapost/index.php?m=Label&a=index&p=3'>3</a><a href='#'>4</a><a href='#'>5</a>  <a href='#' >下5页</a> <a href='#' >最后一页</a>    </div>
</body>
</html>
<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="add.html";
		 });

		$('#backid').click(function(){
			
				window.location.href="<?php echo U(MODULE_NAME.'/index');?>";
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