<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>上传身份证</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
 	<script src="/public/js/jQuery.js"></script>
 	<script src="/Public/js/jzw.js"></script>
</head>
<body>
<div id="global">
<div id="logo">
<img src="/Public/image/logo.jpg">
</div>
<div style="text-align:center;padding-top:30px">
<form action="/index.php/User/upload_idpicture" enctype="multipart/form-data" method="post" >
<input type="file" name="picture" />
<input type="submit" value="提交" >（只能提交jpg图片）
</form>
</div>
</div>
<div id="tail" style="text-align: center">
<hr style="margin: 0px auto;width:1000px" />
Copyright &copy; [<a href="<?php echo U('/Admin/loginpage');?>">admin</a>]
</div>
</body>
</html>