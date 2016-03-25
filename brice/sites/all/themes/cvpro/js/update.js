jQuery(document).ready(function($) {
	var background = $('body').attr('data-background');
	if(background !='')
	{
		var url = 'url('+background+')';
		$('body').css('background-image',url);
	}
	$('#search-block-form input[type=submit]').addClass('button');
	$('#search-block-form input[type=text]').val("");
	$('.contact .webform-client-form input[type=submit]').addClass('button');
	$('input[type=submit]').addClass('button');
	$('.comment-form input#edit-name').attr('placeholder', 'Name');
	$('.comment-form input#edit-mail').attr('placeholder', 'Email *');
	$('.comment-form textarea').attr('placeholder', 'Your Message *');
	$('.comment-form label').remove();
	$('.comment-form div.description').remove();
});