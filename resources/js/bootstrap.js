window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

$(document).ready(function(){

	//Set Optionss
	var speed = 3000;
	var autoswitch = true;
	var autoswitchSpeed = 15000;

	// //Add initial active class
	// $('.slide').first().addClass('active');

	// //Hide all slides
	// $('.slide').hide();

	// //Show first slide
	// $('.active').show();

	// //slider buttons
	// $('#next').on('click', nextSlide());
	// $('#prev').on('click', prevSlide());

	// //autoswitch

	// if(autoswitch == true) {
	// 	setInterval(function() {	
	// 		nextSlide();
	// 	}, autoswitchSpeed);
	// 	$('#nav-search').on
	// }

	// //functions
	// function nextSlide(){

	// 	$('.active').removeClass('active').addClass('oldActive');
	// 	if($('.oldActive').is(':last-child')){
	// 		$('.slide').first().addClass('active');
	// 	} else{
	// 		$('.oldActive').next().addClass('active');
	// 	}
	// 	$('.oldActive').removeClass('oldActive');
	// 	$('.slide').fadeOut(speed);
	// 	$('.active').fadeIn(speed);
	// }
	// function prevSlide(){
	// 	$('.active').removeClass('active').addClass('oldActive')
	// 	if($(".oldActive").is(':first-child')){
	// 		$('.slide').last().addClass('active');
	// 	}else{
	// 		$('.oldActive').prev().addClass('active');
	// 	}
	// 	$('.oldActive').removeClass('oldActive');
	// 	$('.slide').fadeOut(speed);
	// 	$('.active').fadeIn(speed);
	// }

});