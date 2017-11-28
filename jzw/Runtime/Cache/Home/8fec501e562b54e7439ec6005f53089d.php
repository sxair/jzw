<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" type="text/css" href="/Public/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
    <script src="/Public/jquery-ui/external/jquery/jquery.js"></script>
    <script src="/public/jquery-ui/jquery-ui.js"></script>
</head>
<body>
<div>
<form action="/index.php/Admin/delzg" method="get">
        请输入招聘编号：<input type="text" name="zhaogong_id" />
        <input type="submit" value="删除" />
</form>
<div style="padding:10px 10px 10px 10px;">

    <table style="width:100%;margin:5px;text-align:center">
    <tr style="background:#D2F9F9">
        <th style="width:10%">编号</th>
        <th style="width:60%">标题</th>
        <th style="width:30%">操作</th>
    </tr>
    <?php if(is_array($zg)): $i = 0; $__LIST__ = $zg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["zhaogong_id"] != ''): ?><tr><td><?php echo ($vo["zhaogong_id"]); ?></td>
     		<td><a href="<?php echo U('/Jz/zginfo',array('id'=>$vo[zhaogong_id]));?>"  target="_Blank"><?php echo ($vo["title"]); ?></a></td>
	        <td><a href="<?php echo U('/Jz/rezgpage',array('zhaogong_id'=>$vo[zhaogong_id]));?>">修改</a>&nbsp&nbsp&nbsp
            <?php if($vo["status"] == 0): ?><a href="<?php echo U('/Jz/rezgstatus',array(status => 1,'zhaogong_id'=>$vo[zhaogong_id]));?>">已招到</a>
            <?php else: ?>
            <a href="<?php echo U('/Jz/rezgstatus',array(status => 0,'zhaogong_id'=>$vo[zhaogong_id]));?>">重招</a><?php endif; ?>
            &nbsp&nbsp&nbsp&nbsp<a href="<?php echo U('/Jz/delzg',array(zhaogong_id=>$vo[zhaogong_id]));?>">删除</a></td>
    </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </table>

<div class="page" style="margin:10px;text-align:right;"><?php echo ($page); ?></div>
</div>
</body>
</html>