	$(document).ready(function(){
	//Set Optionss
	var speed = 3000;
	var autoswitch = true;
	var autoswitchSpeed = 7000;

	//Add initial active class
	$('.slide').first().addClass('active');

	//Hide all slides
	$('.slide').hide();

	//Show first slide
	$('.active').show();

	//slider buttons
	$('#next').on('click', nextSlide);
	$('#prev').on('click', prevSlide);

	//autoswitch

	if(autoswitch == true) {
		setInterval(function() {	
			nextSlide();
		}, autoswitchSpeed);
	}

	//functions
	function nextSlide(){

		$('.active').removeClass('active').addClass('oldActive');
		if($('.oldActive').is(':last-child')){
			$('.slide').first().addClass('active');
		} else{
			$('.oldActive').next().addClass('active');
		}
		$('.oldActive').removeClass('oldActive');
		$('.slide').fadeOut(speed);
		$('.active').fadeIn(speed);
	}
	function prevSlide(){
		$('.active').removeClass('active').addClass('oldActive')
		if($(".oldActive").is(':first-child')){
			$('.slide').last().addClass('active');
		}else{
			$('.oldActive').prev().addClass('active');
		}
		$('.oldActive').removeClass('oldActive');
		$('.slide').fadeOut(speed);
		$('.active').fadeIn(speed);
	}

});