<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>admin</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
    <script src="/Public/jquery-ui/external/jquery/jquery.js"></script>
    <script src="/public/jquery-ui/jquery-ui.js"></script>
</head>
<body>
<form action="/index.php/Admin/delqz" method="get">
        请输入求职编号：<input type="text" name="qiuzhi_id" />
        <input type="submit" value="删除" />
        </form>
<div style="padding:10px 10px 10px 10px;">
    <table style="width:100%;margin:5px;text-align:center">
    <tr style="background:#D2F9F9">
        <th style="width:10%">编号</th>
        <th style="width:60%">标题</th>
        <th style="width:30%">操作</th>
    </tr>
    <?php if(is_array($qz)): $i = 0; $__LIST__ = $qz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo[qiuzhi_id] != ''): ?><tr><td><?php echo ($vo["qiuzhi_id"]); ?></td>
     		<td><a href="<?php echo U('/Jz/qzinfo',array('id'=>$vo[qiuzhi_id]));?>"  target="_Blank"><?php echo ($vo["title"]); ?></a></td>
	        <td><a href="<?php echo U('/Jz/reqzpage',array(qiuzhi_id=>$vo[qiuzhi_id]));?>">修改</a>&nbsp&nbsp&nbsp
            <?php if($vo[status] == 0): ?><a href="<?php echo U('/Jz/reqzstatus',array(status=>1,qiuzhi_id=>$vo[qiuzhi_id]));?>">已工作</a>
            <?php else: ?>
            <a href="<?php echo U('/Jz/reqzstatus',array(status=>0,qiuzhi_id=>$vo[qiuzhi_id]));?>">求职</a><?php endif; ?>
            &nbsp&nbsp&nbsp&nbsp<a href="<?php echo U('/Jz/delqz',array(qiuzhi_id=>$vo[qiuzhi_id]));?>">删除</a></td>
            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </table>

<div class="page" style="margin:10px;text-align:right;"><?php echo ($page); ?></div>
</div>
</body>
</html>