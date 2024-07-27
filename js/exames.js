  $(document).ready(function(e){
		$('.item').click(function (e){
			if($(this).next('.item-data').css('display') != 'block'){
				$('.active').slideUp('slow').removeClass('active');
				$(this).next('.item-data').addClass('active').slideDown('slow');
			} else {
				$('.active').slideUp('slow').removeClass('active');
			}
		});
	});
	function callResize()
	{
	   var height = document.body.scrollHeight;
	   parent.resizeIframe(height);
	}
	window.onload =callResize;