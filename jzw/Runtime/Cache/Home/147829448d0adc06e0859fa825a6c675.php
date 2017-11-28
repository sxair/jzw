<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="/Public/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="/Public/css/admin.css" />
	<script src="/Public/jquery-ui/external/jquery/jquery.js"></script>
 	<script src="/public/jquery-ui/jquery-ui.js"></script>
 	<script src="/public/js/admin.js"></script>
</head>
<body>
<div id="tabs">
<ul >
	<li><a href="#tabs1">审核身份证资料</a></li>
	<li><a href="#tabs2">管理用户</a></li>
	<li><a href="#tabs3">管理家政公司</a></li>
	<li><a href="#tabs4">管理求职信息</a></li>
	<li><a href="#tabs5">管理招聘信息</a></li>
	<li><a href="#tabs6">修改管理员密码</a></li>
	<button style="margin:20px 0px 0px 40px;height:40px;width:100px;" ><a href="<?php echo U('Admin/logout');?>" style="text-decoration:none;text-align: center;padding-top: 8px;display:block;width:100%;height: 100%;">退出</a></button>
</ul>
	<div id="tabs1">
		<?php if($id != NULL): ?><div style="margin:0px 0px 0px 500px">
			<img src="/picture/<?php echo ($id); ?>.jpg" style="height:350px" ><br/>
			身份证号：<?php echo ($id_card); ?><br/><br/>
			<form action="/index.php/Admin/checkid_ok" method="post" style="display:inline-block">
			<input type="hidden" name="type" value="2">
			<input type="hidden" name="id" value="<?php echo ($id); ?>">
			<input type="submit" value="通过" />
			</form>
			<form action="/index.php/Admin/checkid_ok" method="post" style="display:inline-block;padding-left:30px;">
			<input type="hidden" name="type" value="0">
			<input type="hidden" name="id" value="<?php echo ($id); ?>">
			<input type="submit" value="拒绝" />
			</form>
			</div>
		<?php else: ?>
			暂无<?php endif; ?>
	</div>
	<div id="tabs2">
		<iframe src="<?php echo U('/Admin/showuser');?>"  width="1000" height="1000" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe>
	</div>
	<div id="tabs3">
		<div style="float:left;margin:0px 0px 0px 30px">
		家政公司：
		<ul style="width: 224px;
		    line-height: 36px;
		    font-size: 12px;
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
		<table style="margin:0px 0px 0px 600px;border-collapse:collapse;border: 1px solid #A6C9E2;">
		<tr><td></br></td><td></br></td></tr>
			<tr><th colspan="2">新增家政公司</th></tr>
			<form action="/index.php/Admin/addjiazhenggongsi" method="post">
			<tr><td>&nbsp&nbsp家政公司名称：</td><td><input type="text" name="name" />&nbsp&nbsp&nbsp&nbsp</td></tr>
			<tr><td>&nbsp&nbsp家政公司地址：</td><td><input type="text" name="url" />&nbsp&nbsp</td></tr>
			<tr><td colspan="2" style="text-align:center;"><input type="submit" value="提交" /></td></tr>
			</form>
			<tr><td></td><td></td></tr><tr><td></br></td><td></br></td></tr>
			<tr><th colspan="2">修改家政公司</th></tr>

			<form action="/index.php/Admin/rejiazhenggongsi" method="post">
			<tr><td>&nbsp&nbsp家政公司名称：</td><td><input type="text" name="name" />&nbsp&nbsp&nbsp&nbsp</td></tr>
			<tr><td>&nbsp&nbsp新家政公司地址：</td><td><input type="text" name="url" />&nbsp&nbsp</td></tr>
			<tr><td colspan="2" style="text-align:center;"><input type="submit" value="提交" /></td></tr>
			</form>

			<tr><td></td><td></td></tr><tr><td></br></td><td></br></td></tr>
			<tr><th colspan="2">删除家政公司</th></tr>
			
			<form action="/index.php/Admin/deletejiazhenggongsi" method="post">
			<tr><td>&nbsp&nbsp家政公司名称：</td> <td><input type="text" name="name" />&nbsp&nbsp</td> </tr>
			<tr><td colspan="2" style="text-align:center;"><input type="submit" value="提交" /></td></tr>
			<tr><td></br></td><td></br></td></tr>
			</form>
		</table>
	</div>
	<div id="tabs4">
	<iframe src="<?php echo U('/Admin/glqz');?>"  width="1000" height="1000" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe>
	</div>
	<div id="tabs5">
	<iframe src="<?php echo U('/Admin/glzg');?>"  width="1000" height="1000" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe>
	</div>
	<div id="tabs6">
		<form action="/index.php/Admin/readpass" method="post"> 
		<table >
		<tr><td>请输入新密码：</td>
			<td><input type="password" name="pass" /></td>
		</tr>
		<tr><td>重复密码：</td>
			<td><input type="password" name="repass" /></td>
		</tr>
		</table>
		<input type="submit" value="修改" />
		</form>
	</div>
</div>
</body>
</html>