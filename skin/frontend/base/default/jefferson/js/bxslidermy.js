	$jbp =  jQuery.noConflict();
	
	$jbp(document).ready(function(){
		
		$jbp('.bxslider').bxSlider({
		
			// auto:true,
			mode: 'fade',
			minSlides: 1,
		    maxSlides: 1,
		    moveSlides: 1,
		    
		  });
		
		$jbp(window).load(function(){
			$jbp('.bxslider').css('opacity','1');
		});
		
	});