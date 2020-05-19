$(document).ready(function(){
	$('#navbtn').on('click', function () {
			$('#nav-icon').toggleClass('open');
 	});

	$('#navbtn').on('click', function () {
		if( $('#nav-icon').hasClass('open') ){
			$('#navbarNav').slideDown();
		}
		else{
			$('#navbarNav').slideUp();
		}
	});

	$('#navbarNav>div>ul>li>a').click( function(){
		$('#navbarNav').slideUp();
		$('#nav-icon').toggleClass('open');
	})
});

$(document).ready(function (){
	$(window).scroll(function (){
			if($(this).scrollTop() > 120){
					$("#back-to-top").fadeIn();
			}
			else{
					$("#back-to-top").fadeOut();
			}
	});
});

function initMap(){
	var test = { lat: 22.5518978, lng: 72.9239577 };
	var map = new google.maps.Map(document.getElementById('map'),{
		zoom: 6,
		center: test
	});
	var marker = new google.maps.Marker({
		position: test,
		map: map
	});
};
