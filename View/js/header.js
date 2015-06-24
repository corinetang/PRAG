jQuery(function(){
	$( ".change-at-focus" ).mouseover(function() {
  		$(this).css('background-color','#75b9e7' );
	});

	$( ".change-at-focus" ).mouseleave(function() {
  		$(this).css('background-color','#3498db' );
	});
});