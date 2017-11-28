<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
</head>
<body>
<div style="margin-left:250px">
		<table class="bluetable">
			<tr><th>标号</th>
				<th>用户名</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo['id']); ?></td>
				<td><?php echo ($vo['user_name']); ?></td>
				<td>
				<?php if($vo[type] > 1): ?><a href="<?php echo U('/Admin/distype',array(id=>$vo['id']));?>">取消认证</a><?php endif; ?>
				<?php if($vo[type] == 1): ?><a href="<?php echo U('/Admin/starttype',array(id=>$vo['id']));?>" target="_blank">开始认证</a><?php endif; ?>
				<?php if($vo[type] == 0): ?>未提交<?php endif; ?>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<div class="page" style="margin:10px 0 0 200px;"><?php echo ($page); ?></div>
</div>
</body>
</html>