<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>注册</title>
 	<link rel="stylesheet" type="text/css" href="/Public/css/jzw.css" />
 	<link rel="stylesheet" type="text/css" href="/Public/city-picker/city-picker.css" />
 	<script src="/public/js/jQuery.js"></script>
 	<script src="/Public/js/check.js"></script>
 	<script src="/Public/city-picker/city-data.js"></script>
 	<script src="/Public/city-picker/city-picker.min.js"></script>
</head>
<body>
<div id="global">
	<div id="logo">
<img src="/Public/image/logo.jpg">
</div>
	<div id="registertable">
	<form action="/index.php/User/register" method="post">
	<table class="bluetable" style="margin:0px auto;">
		<tr><td class="table_left">用户名<span style="color:red">*</span></td>
			<td ><input type="text" name="user_name" maxlength="20" size="20" required="required" /></td>
		</tr>
		<tr><td>密码<span style="color:red">*</span></td>
			<td><input type="password" name="password" maxlength="32" size="20" required="required" />（至少3个字符）</td>
		</tr>
		<tr><td>身份证号<span style="color:red">*</span></td>
			<td><input type="text" name="id_card" maxlength="18" size="20" required="required" value="填写后无法修改" onFocus="if(value==defaultValue){value='';this.style.color='#000'}" onBlur="if(!value){value=defaultValue; this.style.color='#999'}" style="color:#999"  /></td>
		</tr>
		<tr><td>邮箱<span style="color:red">*</span></td>
			<td><input type="text" name="mail" class="email" onblur="checkmail()" maxlength="18" size="20" required="required" /><span class="mailcheck"></span></td>
		</tr>
		<tr><td>所在地区：<span style="color:red">*</span></td>
			<td><input type="text" id="city-picker" name="positionname" required="required" readonly="readonly" /></td>
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
		<tr><td>密保问题：<span style="color:red">*</span></td>
			<td><input type="text" name="question" maxlength="20" size="20" required="required" /></td>
		</tr>
		<tr><td>密保答案：<span style="color:red">*</span></td>
			<td><input type="text" name="answer" maxlength="20" size="20" required="required" /></td>
		</tr>
		<tr><td colspan="2" style="text-align:center"><input type="submit" value="提交"></td></tr>
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