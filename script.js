$(document).ready(function(){

	$(document).on('click', '.closed', function() {
		$('#quickSearchForm').fadeOut(100);
		$(this).addClass('open').removeClass('closed');
		console.log('clicked on closed!');
		$(this).siblings().removeClass('open').addClass('closed');
	});
	$(document).on('click', '.open', function() {
		$(this).addClass('closed').removeClass('open');
		console.log('clicked on open!');
		setTimeout(function(){
		$('#quickSearchForm').fadeIn('fast');
		},500);
	});
});