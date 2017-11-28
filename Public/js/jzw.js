$(function(){
	$(".classify_but").mouseover(function(){
		$(".classify_but").removeAttr("style");
		$('.classify_onclick').css({"background-color":"#FF88AE"});
		$(this).css({"background-color":"#F8BDDB"});
	});
	$(".classify_but").mouseout(function(){
		$(".classify_but").removeAttr("style");
		$(".classify_onclick").css({"background-color":"#FF88AE"});
	});
	$(".classify_but").click(function(){
		window.location.href = url+"?z="+$('.first_onclick').attr('id')+"&type="+$(this).attr('id');
	});
	$(".first_but").click(function(){
		window.location.href = url+"?z="+$(this).attr('id')+"&type="+$('.classify_onclick').attr('id');
	});
	$("#find").click(function(){
		window.location.href = url+"?z="+$('.first_onclick').attr('id')+"&type="+$('.classify_onclick').attr('id')+"&positionname="+$('#city-picker').val()+"&gongzi="+$('#gongzi').val();
	});
});