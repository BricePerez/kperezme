	$('#theme-options ul.backgrounds li').click(function(){
		$bgSrc = $(this).css('background-image');
		if ($(this).attr('class') == 'bgnone')
			$bgSrc = "none";

		$('body').css('background-image',$bgSrc);
		$.cookie('background', $bgSrc);
		$.cookie('backgroundclass', $(this).attr('class').replace(' active',''));
		$(this).addClass('active').siblings().removeClass('active');
	});


	$('#theme-options .title').click(function(){

		if ($('#theme-options').css('left') == "-180px")
		{
			$left = "0px";
			$.cookie('displayoptions', "0");
		} else {
			$left = "-180px";
			$.cookie('displayoptions', "1");
		}

		$('#theme-options').animate({
			left: $left
		},{
			duration: 500,
			easing: "easeInOutExpo"
		});


	});

	$(function(){
		$('#theme-options').fadeIn();
		$bgSrc = $.cookie('background');
		$('body').css('background-image',$bgSrc);

		if ($.cookie('displayoptions') == "1")
		{
			$('#theme-options').css('left','-180px');
		} else if ($.cookie('displayoptions') == "0") {
			$('#theme-options').css('left','0');
		} else {
			$('#theme-options').delay(800).animate({
				left: "-180px"
			},{
				duration: 500,
				easing: "easeInOutExpo"
			});

			$.cookie('displayoptions', "1");
		}

		$('#theme-options ul.backgrounds').find('li.' + $.cookie('backgroundclass')).addClass('active');

	});

//=================================== Skins Changer ====================================//

google.setOnLoadCallback(function(){

	'use strict';

    // Color changer

    $(".light").click(function(){
    	$('#layout li a.dark').attr('title', '');
    	$('#layout li a.light').attr('title', 'active');
        $(".style").attr("href", "sites/all/themes/cvpro/css/style-light.css");
        $("body").css({'background-image': 'none','background-color': '#fff'});
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/blue/blue.css");
        $("#colorchanger li:first()").addClass('black');
        $("#colorchanger li a.white").remove();
        $("#colorchanger li:first()").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/black/black.css");
        return false;
    });
        return false;
    });

    $(".dark").click(function(){
    	$('#layout li a.light').attr('title', '');
    	$('#layout li.dark a').attr('title', 'active');
        $(".style").attr("href", "sites/all/themes/cvpro/css/style-dark.css");
        $("body").css({'background-image': 'url(sites/all/themes/cvpro/img/dark/bg-theme/default.jpg)','background-color': '#232323'});
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/white/white.css");
        $('#theme-options ul.backgrounds li.default').addClass('active');
        $("#colorchanger li a.black").remove();
        $("#colorchanger li:first()").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/white/white.css");
        return false;
    });
        return false;
    });

    $(".white").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/white/white.css");
        return false;
    });

    $(".black").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/black/black.css");
        return false;
    });

    $(".red").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/red/red.css");
        return false;
    });

    $(".blue").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/blue/blue.css");
        return false;
    });

    $(".derki").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/derki/derki.css");
        return false;
    });

    $(".green").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/green/green.css");
        return false;
    });

    $(".orange").click(function(){
        $(".skin").attr("href", "sites/all/themes/cvpro/css/skins/orange/orange.css");
        return false;
    });

});
