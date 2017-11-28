$(function(){
	checkmail=function(){
		var email = $('.email').val();
		var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/; 
		var flag = pattern.test(email);
		if(flag){
			$('.mailcheck').html('&nbsp<font color="green">√</font>');
		}else {
			$('.mailcheck').html('&nbsp<font color="red">×</font>');
		}
	}
});