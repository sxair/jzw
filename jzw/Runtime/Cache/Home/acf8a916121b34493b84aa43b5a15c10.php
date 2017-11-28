<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>发布求职信息</title>
 	<link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
 	<link rel="stylesheet" type="text/css" href="/Public/city-picker/city-picker.css" />
 	<link rel="stylesheet" type="text/css" href="/Public/jquery-ui/jquery-ui.css" />
 	<script src="/public/js/jQuery.js"></script>
 	<script src="/public/jquery-ui/jquery-ui.js"></script>
 	<script src="/Public/city-picker/city-data.js"></script>
 	<script src="/Public/city-picker/city-picker.min.js"></script>
 	<script type="text/javascript">
 		$(function(){
 			$(".date").datepicker({ dateFormat: 'yy-mm-dd' });
 		});
 	</script>
 	<style type="text/css">
 		#ui-datepicker-div{font-size:73%;}
 	</style>
</head>
<body>
<div id="global">
	<div id="logo" style="background-image:url(/Public/image/logo.jpg);background-size:100% 100%;background-repeat:no-repeat;width:100%;height:100px;">
</div>
	<div id="addzgtable" style="padding-top:30px;padding-bottom:30px;">
	<form action="/index.php/Jz/addqz" method="post" enctype="multipart/form-data">
	<table class="bluetable" style="margin:0px auto;">
		<tr><td>标题<span style="color:red">*</span></td>
			<td><input type="text" name="title" maxlength="15" size="50" required="required" /></td>
		</tr>
		<tr><td class="table_left">类型<span style="color:red">*</span></td>
			<td class="table_right">
				<select name="type">
				<?php if(is_array($class)): foreach($class as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
		</tr>
		<tr><td>称呼<span style="color:red">*</span></td>
			<td>
			<input type="text" name="name" maxlength="4" size="4" required="required" />
			&nbsp<input type="radio" name="sex" value="0" checked>女士
			<input type="radio" name="sex" value="1">先生
			</td>
		</tr>
		<tr><td>生日<span style="color:red">*</span></td>
			<td>
			<input type="text" name="birth" class="date" required="required" readonly="readonly" width="30" />
			</td>
		</tr>
		<tr><td>联系电话<span style="color:red">*</span></td>
			<td><input type="text" name="phone" maxlength="11" size="20" required="required" /></td>
		</tr>
		<tr><td>qq</td>
			<td><input type="text" name="qq" maxlength="11" size="20" required="required" /></td>
		</tr>
		<tr><td>工资<span style="color:red">*</span></td>
			<td><input type="text" name="fgongzi" maxlength="5" size="5" required="required"  />~<input type="text" name="sgongzi" maxlength="5" size="5" required="required"  />/月</td>
		</tr>
		<tr><td>工作地区<span style="color:red">*</span></td>
			<td><input type="text" id="city-picker" name="positionname" required="required" readonly="readonly"/></td>
		</tr>
		 	<script type="text/javascript">
    var cityPicker = new HzwCityPicker({
        data: data,
        target: 'city-picker',
        valType: 'k',
        hideCityInput: {
            name: 'city',
            id: 'city'
        },
        hideProvinceInput: {
            name: 'position',
            id: 'province'
        }
    });
    cityPicker.init();</script>
		<tr><td>本人学历<span style="color:red"></span></td>
			<td><select name="xueli">
				<?php if(is_array($xueli)): foreach($xueli as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
				</select>或以上
			</td>
		</tr>
		<tr><td>食宿<span style="color:red"></span></td>
			<td><select name="shisu">
				<?php if(is_array($shisu)): foreach($shisu as $k=>$vo): ?><option value="<?php echo ($k); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
				</select>
			</td>
		</tr>
		<tr><td>本人照片<span style="color:red">*</span></td>
			<td><input type="file" name="picture" accept="image/jpeg" />（只限.jpg文件）</td>
		</tr>
		
		<tr><td colspan="2" style="text-align:center"><input type="submit" value="提交">&nbsp&nbsp<button onclick="history.go(-1)">返回</button></td></tr>
	</table>
	</form>
	</div>
	<div id="tail" style="text-align: center">
<hr style="margin: 0px auto;width:1000px" />
Copyright &copy; [<a href="<?php echo U('/Admin/loginpage');?>">admin</a>]
</div>
</div>
</body>
</html>