Cufon.replace('.slide h1');
			Cufon.replace('h2');
			Cufon.replace('h3');
			Cufon.replace('h4');
			Cufon.replace('.plan_name');
			Cufon.replace('#options li strong');
			
	$(function() {
		$( "#plans_tables" ).smoothTabs(180);
		});
	
	
	$(function() {
		$('#fancy_slider_slides') 
		.after('<div id="nav">') 
		.cycle({ 
				fx:     'slideY', 
				speed:  'slow', 
				timeout: 6000, 
				pager:  '#nav',
				fit: 	1,
				width: 960,
				height:	330
			});	   
			   
			   
		$('#testimonials') 
		.after('<div id="testimonialsNav">') 
		.cycle({ 
				fx:     'scrollLeft', 
				speed:  'fast', 
				timeout: 0, 
				pager:  '#testimonialsNav',
					fit: 	1,
				width: 300,
				height:	150
				
				
			});	   
		
		
		$('#portfolio') 
		.after('<div id="portfolioNav">') 
		.cycle({ 
				fx:     'scrollLeft', 
				speed:  'fast', 
				timeout: 0, 
				pager:  '#portfolioNav',
					fit: 	1,
				width: 280,
				height:	110
				
				
			});	   
		
			   
			

$(".columns li ul").hover(
  function () {
    $(this).animate({boxShadow: '0 0 7px #888'});
  },
  function () {
     $(this).animate({boxShadow: '0 0 0px #fff'});
  });



$('#portfolio .small_box a').fancybox({
					'transitionIn'	:	'elastic',
					'transitionOut'	:	'elastic',
					'speedIn'		:	600, 
					'speedOut'		:	200,
					'titlePosition'   :	'over'
					});



$(function() { 
	$(".scroll").click(function(event){

		event.preventDefault();
		var full_url = this.href;
		var parts = full_url.split("#");
		var trgt = parts[1];
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top;

		$('html, body').animate({scrollTop:target_top}, 1000);
	});
});



   });



$(function() {
	$("#send").click(function() {
	
	
	
		var email = $("#ContactEmail").val();
		var name = $("#ContactName").val();
		var message = $("#Message").val();
		var dataString = 'email='+ email + '&name=' + name + '&message=' + message;
		
			
		if(email=='' || message=='' || email=='Your email' || name=='' || name=='Your Name' || message=='' )
					{
						$('.message_success').fadeOut(200).hide();
						$('.message_error').fadeOut(200).show();
						$('.message_terms').fadeOut(200).hide();
					}
		else
			{
				$.ajax({
				type: "POST",
				url: "contact.php",
				data: dataString,
				success: function()
				
				{
					$('.message_success').fadeIn(200).show();
					$('.message_error').fadeOut(200).hide();
					$('.message_terms').fadeOut(200).hide();
				}
			});
	}
return false;
});
	});
