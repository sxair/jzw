<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>家政网</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
 	<script src="/public/js/jQuery.js"></script>
 	<script src="/Public/js/jzw.js"></script>
 	<style type="text/css">
 		li,a{font-size:23px;}
 	</style>
</head>
<body>
<div id="global">
<div id="logo">
<img src="/Public/image/logo.jpg">
</div>
<div id="registertable" style="font-size:25px;">
	<ul style="padding-left: 200px;text-align:left;">
	<li style="font-size:26px;"><?php echo ($data["title"]); ?></li><br/>
	<li>电话 ： <?php echo ($data["phone"]); ?> &nbsp qq ： <?php echo ($data["qq"]); ?></li>
	<li>工资 ： <?php echo ($data["gongzi"]); ?> &nbsp&nbsp&nbsp 地址 ： <?php echo ($data["positionname"]); ?></li>
	<li>具体内容 ：</li>
	<li><?php echo ($data["content"]); ?></li>
	<li><a class="media" href="/pdf/<?php echo ($data["pdfurl"]); ?>" target="_blank">点击查看简历</a></li>
	<li style="padding-left:300px;"><button onclick="history.go(-1)">返回</button></li>
	<br/>
	<?php if(session('id') == $data['user_id'] OR !isset($_SESSION['admin'])): ?><li ><a href="<?php echo U('/Jz/delzg',array('id' => $data['zhaogong_id']));?>">删除该求职信息</a></li><?php endif; ?>
</div>
<div id="tail" style="text-align: center">
<hr style="margin: 0px auto;width:1000px" />
Copyright &copy; [<a href="<?php echo U('/Admin/loginpage');?>">admin</a>]
</div>
</body>
</html>