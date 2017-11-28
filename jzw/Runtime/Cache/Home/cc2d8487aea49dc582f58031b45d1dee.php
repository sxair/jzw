<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>家政网</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
 	<script src="/public/js/jQuery.js"></script>
 	<script src="/Public/js/jzw.js"></script>
</head>
<body>
<div id="global">
<div id="logo">
<img src="/Public/image/logo.jpg">
</div>
<div id="registertable">
<?php echo ($id); ?>
	<form action="/index.php/Jz/revise" method="post">
	<table class="bluetable" style="margin:0px auto;">
		<tr><td class="table_left">用户名<span style="color:red">*</span></td>
			<td class="table_right"><input type="text" name="user_name" maxlength="20" size="20" required="required" value="<?php echo ($name); ?>" /></td>
		</tr>
		<tr><td>新密码<span style="color:red">*</span></td>
			<td><input type="password" name="password" maxlength="32" size="20" required="required" /></td>
		</tr>
	</table>
	</form>
</div>
<div id="tail" style="text-align: center">
<hr style="margin: 0px auto;width:1000px" />
Copyright &copy; [<a href="<?php echo U('/Admin/loginpage');?>">admin</a>]
</div>
</body>
</html>