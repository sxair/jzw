<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>admin登录</title>
	<link rel="stylesheet" type="text/css" href="/Public/jquery-ui/jquery-ui.css" />
	<script src="/Public/jquery-ui/external/jquery/jquery.js"></script>
 	<script src="/public/jquery-ui/jquery-ui.js"></script>
 	<script type="text/javascript">
 		$(function(){
 			$("#dialog").dialog({
 				autoOpen :true,
 				modal : true,
 				width : 300,
 				height : 200,
 				resizable : false,
 			});
 		});
 	</script>
</head>
<body>
<div id="dialog" title="管理员登录" style="text-align:center">
<form action="/index.php/Admin/login" method="post">
	<div style="padding-top:20px">
	帐号：<input type="text" name="admin"/><br/>
	<div style="padding-top:5px">密码：<input type="password" name="pass" class="pass" /><br/></div>
	</div>
	<div style="padding-top:20px">
	<input type="submit" value="提交" >
	</div>
</form>
</div>
</body>
</html>