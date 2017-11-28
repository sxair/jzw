<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>家政网</title>
	<script type="text/javascript">
	var url="/index.php/Index";
 	</script>
	<link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
 	<script src="/public/js/jQuery.js"></script>
 	<script src="/Public/js/jzw.js"></script>
    <script type="text/javascript">
    $(function(){
        $('.glqz').load("<?php echo U('/Jz/ajglqz');?>");
    });
    </script>
</head>
<body>
<div id="global">
<div id="logo" style="background-image:url(/Public/image/logo.jpg);background-size:100% 100%;background-repeat:no-repeat;width:100%;height:100px;">
</div>
<div id="classify">
<ul class="classify_ul">
<li class="<?php if(I('z') == -2): ?>first_onclick <?php else: ?> first_but<?php endif; ?>" id="-2">招工信息</li>
<li class="<?php if(I('z') == -1): ?>first_onclick <?php else: ?> first_but<?php endif; ?> " id="-1">求职信息</li>
<?php if(is_array($class)): foreach($class as $k=>$vo): ?><li class="<?php if(I('type') == $k): ?>classify_onclick<?php else: ?> classify_but<?php endif; ?>" id= "<?php echo ($k); ?>"><?php echo ($vo); ?></li><?php endforeach; endif; ?>

</ul>
</div>

<?php if(R('User/checklogin') == 1): ?><div id="loginpage_border">
<div style="padding-top:5px;">
<ul style="text-align:center">
	<li >欢迎您：<?php echo session('name');?></li>
	<li style="padding-top:2px"><a href="<?php echo U('User/revisepage');?>">修改资料</a></li>
	<?php if(session('type') == 2): ?><li style="padding-top:2px"><a href="<?php echo U('/Jz/zgpage');?>">发布招工信息</a></li>
		<li style="padding-top:2px"><a href="<?php echo U('/Jz/glzg');?>">管理招工信息</a></li>
		<li style="padding-top:2px"><a href="<?php echo U('/Jz/qzpage');?>">发布求职信息</a></li>
		<li style="padding-top:2px"><a href="<?php echo U('/Jz/glqz');?>">管理求职信息</a></li>
	<?php elseif(session('type') == 0): ?>
		<li style="padding-top:2px"><a href="<?php echo U('/User/upload_idpicturepage');?>">上传身份资料完成注册</a></li>
	<?php else: ?>
		<li style="padding-top:2px">身份资料正在审核中</li><?php endif; ?>
	<li style="padding-top:2px"><a href="<?php echo U('/User/logout');?>">退出</a></li>
</ul>
</div>
</div>
<?php else: ?> <div id="loginpage_border">
<div id="loginpage">
<form method="post" action="<?php echo U('User/login');?>">
用户名：<input type="text" name="user_name" size="10"/> <br/><br/>
密&nbsp&nbsp&nbsp&nbsp码：<input type="password" name="password" size="10"/> <br/><br/>
<input type="submit" value="登录" class="loginpage_loginbut" />
<a class="loginpage_register" href="<?php echo U('User/registerpage');?>" style="font-size:15px;">注册</a>
<a class="loginpage_register" href="<?php echo U('User/findpasspage');?>" style="font-size:15px;">忘记密码</a>
</form>
</div>
</div><?php endif; ?>

<div id="info_border">
<div style="padding:10px 10px 10px 10px;">

    <div class="glqz"> </div>

<div class="page" style="margin:10px;text-align:right;"><?php echo ($page); ?></div>
</div>
</div>
<div class="qiuzhi">
</div>
<div id="jiazhenggongsi_border">
<div style="margin:15px 10px 0px 7px; width:100%">
友情家政公司：
<ul style="width: 224px;
    line-height: 36px;
    font-size: 12px;
    float: left;
    background: url(/Public/image/jzgs_bg.png);
    text-align: left;
    padding-left: 10px;
    margin-bottom: 5px;
    font-size: 13px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
">
<?php if(is_array($jzgs)): $i = 0; $__LIST__ = $jzgs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><li><a href="http://<?php echo ($it["url"]); ?>" class="jzgs"><?php echo ($it["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
</div>
</div>
<div id="tail" style="text-align: center">
<hr style="margin: 0px auto;width:1000px" />
Copyright &copy; [<a href="<?php echo U('/Admin/loginpage');?>">admin</a>]
</div>
</body>
</html>