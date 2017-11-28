<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>找回密码</title>
</head>
<body>
<div style="margin:0px auto;text-align:center">
<form action="/index.php/User/sendmail" method="get">
	用户：<?php echo ($data["user_name"]); ?><br/>
	密保问题：<?php echo ($data["question"]); ?><br />
	答案：<input type="text" name="answer">
	<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
	<input type="submit" value="提交">
</form>
</div>
</body>
</html>