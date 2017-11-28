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
</head>
<body>
<div id="global">
<div id="logo" style="background-image:url(/Public/image/logo.jpg);background-size:100% 100%;background-repeat:no-repeat;width:100%;height:100px;">
</div>
    <div class="infobox">
        <div class="infotitle">
        <i></i><font color=#408EE6> 招工信息</font>
        </div>
        <ul class="infoul">
        <li><b>标题:</b><font color="#0F0F0F"><?php echo ($data[title]); ?></font></li>
        <li>
            <div class="dinfo">
                <b>工资：</b><?php echo ($data[fgongzi]); ?>~<?php echo ($data[sgongzi]); ?>
            </div>
            <div class="dinfo">
                <b>发布状态：</b><?php if($data[status] == 0): ?><font color="blue">招收中</font><?php else: ?><font color="red">已招到</font><?php endif; ?>
            </div>
        </li>
        <li><div class="dinfo"><b>工作：</b><?php echo ($class[$data[type]]); ?></div>
            <div class="dinfo"><b>食宿：</b><?php echo ($shisu[$data[shisu]]); ?></div> 
        </li>
        <li><b>学历要求：</b><?php echo ($xueli[$data[xueli]]); ?>或以上</li>
        <li><b>工作地点：</b><?php echo ($data[positionname]); ?> <?php echo ($data[jiedao]); ?></li>
        <div style="margin:5px 0 5px 0 "><b>具体内容：</b><?php echo ($data[content]); ?></div>
        </ul>
    </div>
    <div class="show">
        <div class="showtitle">
        <i></i><font color=#FF526A> 最近更新</font>
        </div>
        <ul class="infoul">
        <?php if(is_array($alldata)): $i = 0; $__LIST__ = $alldata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('/Jz/zginfo',array('id'=>$vo[zhaogong_id]));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="maninfo">
        <div class="mantitle">
        <i></i><font color=#FF526A> 联系方式</font>
        </div>
        <ul class="infoul">
        <li><b>发布者：</b><?php echo ($data[name]); if($data[sex] == 0): ?>女士<?php else: ?> 先生<?php endif; ?></li>
        <li><b>电话：</b><?php echo ($data["phone"]); ?></li>
        <li><b>qq：</b><a  href="tencent://message/?uin=<?php echo ($data[qq]); ?>&Site=&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3320298022:41" alt="点击联系我" title="点击联系我"></a></li>
        </ul>
    </div>
</div>
<div id="tail" style="text-align: center">
<hr style="margin: 0px auto;width:1000px" />
Copyright &copy; [<a href="<?php echo U('/Admin/loginpage');?>">admin</a>]
</div>
</body>
</html>