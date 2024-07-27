	$(function(){
		$('.sf-menu li').hover(	function(){
			$(this).not('.current').find('a').stop().animate({color:'#b0b0b0', paddingTop:'3px'},'fast')},
		function(){
			$(this).not('.current, .sfHover').find('a').stop().animate({color:'#101010', paddingTop:'0'},'fast')
			})
		$('.box2 a').hover(function(){
			$(this).stop().animate({backgroundColor:'#b0b0b0'},'fast')},
			function(){$(this).stop().animate({backgroundColor:'#00b9c8'},'fast')}) 
			
		$('.list li a').hover(function(){
			$(this).stop().animate({paddingLeft:'5px',color:'#a4a4a4'},'fast')},
				function(){$(this).stop().animate({paddingLeft:0, color:'#00b9c8'},'fast')
		})
		$(".tooltip").easyTooltip();
	});