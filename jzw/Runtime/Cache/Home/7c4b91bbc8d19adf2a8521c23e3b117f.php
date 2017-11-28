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
        <i></i><font color=#408EE6 ></i> 求职信息</font>
        </div>
        <ul class="infoul">
        <li><b>标题:</b><font color="#0F0F0F"><?php echo ($data[title]); ?></font></li>
        <li>
            <div class="dinfo">
                <b>工资要求：</b><?php echo ($data[fgongzi]); ?>~<?php echo ($data[sgongzi]); ?>
            </div>
            <div class="dinfo">
                <b>发布状态：</b><?php if($data[status] == 0): ?><font color="blue">等待中</font><?php else: ?><font color="red">已工作</font><?php endif; ?>
            </div>
        </li>
        <li><div class="dinfo"><b>工作：</b><?php echo ($class[$data[type]]); ?></div>
            <div class="dinfo"><b>食宿要求：</b><?php echo ($shisu[$data[shisu]]); ?></div> 
        </li>
        <li><b>学历：</b><?php echo ($xueli[$data[xueli]]); ?></li>
        <li><b>工作地点：</b><?php echo ($data[positionname]); ?></li>
        </ul>
    </div>
    <div class="show">
        <div class="showtitle">
        <i></i><font color=#FF526A> 最近更新</font>
        </div>
        <?php if(is_array($alldata)): $i = 0; $__LIST__ = $alldata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="allzg">
        <a href="<?php echo U('/Jz/qzinfo',array('id'=>$vo[qiuzhi_id]));?>"><img src="/qzpicture/<?php echo ($vo["qiuzhi_id"]); ?>.jpg" style="width:170px;height:130px;padding:5px 0px 1px 5px;" /></a>
        <a href="<?php echo U('/Jz/qzinfo',array('id'=>$vo[qiuzhi_id]));?>"><?php echo ($vo[name]); if($vo[sex] == 0): ?>女士<?php else: ?> 先生<?php endif; ?></a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="maninfo">
        <div class="mantitle">
        <i></i><font color=#FF526A> 联系方式</font>
        </div>
        <div style="width:300px;float:left">
        <ul class="infoul">
        <li><b>发布者：</b><?php echo ($data[name]); if($data[sex] == 0): ?>女士<?php else: ?> 先生<?php endif; ?></li>
        <li><b>年龄：</b><?php echo ($data["birth"]); ?></li>
        <li><b>电话：</b><?php echo ($data["phone"]); ?></li>
        <li><b>qq：</b><a  href="tencent://message/?uin=<?php echo ($data[qq]); ?>&Site=&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3320298022:41" alt="点击联系我" title="点击联系我"></a></li>
        </ul>
        </div>
        <img src="/qzpicture/<?php echo ($data["qiuzhi_id"]); ?>.jpg" style="width:300px" />
    </div>
</div>
<div id="tail" style="text-align: center">
<hr style="margin: 0px auto;width:1000px" />
Copyright &copy; [<a href="<?php echo U('/Admin/loginpage');?>">admin</a>]
</div>
</body>
</html>