//Funciones para la galeria de fotos
$(function() {
$(".gal").jCarouselLite({
  btnNext: 	".next",
  btnPrev: 	".prev",
  visible: 	4,
  auto: 	2000
  });
});

$(document).ready(function(){
  $('img.captify').captify({
    speedOver: 	'fast',
    speedOut: 	'normal',
    hideDelay: 	500,	
    animation: 	'slide',
    prefix: 	'',
    opacity: 	'0.7',
    className: 	'caption-bottom',
    position: 	'bottom',
    auto: 		500,
    spanWidth: 	'100%'
  });
});