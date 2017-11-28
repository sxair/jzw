<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>找回密码</title>
</head>
<body>
<div style="margin:0px auto;text-align:center">
<form action="/index.php/User/getquestion" method="get">
	请输入用户名：<input type="text" name="user_name">
	<input type="submit" value="提交"/>
</form>
</div>
</body>
</html>