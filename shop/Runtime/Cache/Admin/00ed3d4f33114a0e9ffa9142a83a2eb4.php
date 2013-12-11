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

                <form action="<?php echo U(GROUP_NAME.'/Member/addUser');?>" method='post'>
                    <table class="table table-bordered table-hover definewidth m10">
                        <tr>
                            <td align='right'>名称</td>
                            <td>
                                <input type="text"  name='users_name'/>
                            </td>
                        </tr>
                        <tr>
                            <td align='right'>性别</td>
                            <td>
                                <input type="text"  name='users_password' value="<?php echo ($user["email"]); ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td align='right'>性别</td>
                            <td>
                                <input type="radio"  name='users_sex' value = 1 /> 男
                                <input type="radio"  name='users_sex' value = 0 /> 女
                            </td>
                        </tr>
                        <tr>
                            <td align='right'>生日</td>
                            <td>
                                <input type="text"  name='users_birthday'/>
                            </td>
                        </tr>
                        <tr>
                            <td align='right'>邮箱</td>
                            <td>
                                <input type="text"  name='users_email'/>
                            </td>
                        </tr>
                        <tr>
                            <td align='right'>QQ</td>
                            <td>
                                <input type="text"  name='users_qq'/>
                            </td>
                        </tr>

                         <tr>
                            <td align='right'>手机号码</td>
                            <td>
                                <input type="text"  name='users_phone'/>
                            </td>
                        </tr>
                        <tr>
                            <td align='right'>家庭电话</td>
                            <td>
                                <input type="text"  name='users_homeNo'/>
                            </td>
                        </tr>
                        <tr>
                            <td align='right'>公司电话</td>
                            <td>
                                <input type="text"  name='users_officeNo'/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align='center'>
                                <input type="submit"  class="btn btn-primary" value='保存添加' />
                                <a href="<?php echo U(GROUP_NAME.'/Member/index');?>" class="btn btn-success"  />返回列表</a>
                            </td>
                         </tr>
                    </table>
                </form>

<!-- 
<button type="submit" class="btn btn-primary" type="button">保存</button>&nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
 -->
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