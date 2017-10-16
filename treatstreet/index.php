<?php
$out = '';
if(session_status() == PHP_SESSION_NONE){
session_start();
}
require('connect.php');

require('header.html');

$out = '';
$out .= '<body>';
$out .= 	'<div class="container">';
$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
$out .=					'<img class = "background" src = "src/img/background.jpg">';
$out .=				'</div>';
$out .=     	'</div>';

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
						require('nav.php');
$out .=				'</div>';
$out .=     	'</div>';
$out .=		  '<form action = "results.php" method = "post">';
$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-6">';
$out .=					'<input type = "image" name = "candy" class = "main-background main-background1" src = "src/img/main2.jpg" value = "christmas">';
$out .=					'<h2 class = "hide img1 img-caption">Try Our Christmas Treats</h2>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-6">';
$out .=					'<input type = "image" name = "candy"  class = "main-background main-background2" src = "src/img/main.jpg" value = "valentines">';
$out .=					'<h2 class = "hide img2 img-caption">Get Your Valentine\'s Candy Today</h2>';
$out .=				'</div>';
$out .=     	'</div>';

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-6">';
$out .=					'<input type = "image" name = "candy"  class = "main-background main-background3" src = "src/img/main3.jpg" value = "thanksgiving">';
$out .=					'<h2 class = "hide img3 img-caption">Gobble Gobble Sweets</h2>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-6">';
$out .=					'<input type = "image" name = "candy"  class = "main-background main-background4" src = "src/img/main4.jpg" value = "halloween">';
$out .=					'<h2 class = "hide img4 img-caption">The Spooky Candy Collection</h2>';
$out .=				'</div>';
$out .=     	'</div>';

$out .=		    '<input id = "candy-input-pic" type = "hidden" name = "candy" value = "all">';
$out .=	      '</form>';


$out .= 	'</div>';
$out .= '</body>';

echo $out;
	
require('footer.html');

?>

<script>
	$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).fadeIn(50);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).fadeOut(50);
});
</script>

<script>
	$(document).ready(function(){
		$('.main-background').click(function(){
			var val = $(this).val();
			var value = val.toLowerCase();
			$('#candy-input-pic').val(value);
		});
	});
</script>

<script>
	$(document).ready(function(){
		$('.menu-item').click(function(){
			var val = $(this).val();
			var value = val.toLowerCase();
			$('#candy-input').val(value)
		});
	});
</script>

<script>
$(document).ready(function(){
	$('.main-background1').hover(
	       function(){ 
	       		$('.img1').removeClass('hide');
  				$('.main-background1').fadeTo( "fast", .25, function() {
  				});
		});
			$('.main-background1').mouseout(
	       function(){ 
	       		$('.img1').addClass('hide');
  				$('.main-background1').fadeTo( "fast", 1, function() {
  				});	       		
	   	   });
	});

</script>

<script>
$(document).ready(function(){
	$('.main-background2').hover(
	       function(){ 
	       		$('.img2').removeClass('hide');
  				$('.main-background2').fadeTo( "fast", .25, function() {
  				});
		});
			$('.main-background2').mouseout(
	       function(){ 
	       		$('.img2').addClass('hide');
  				$('.main-background2').fadeTo( "fast", 1, function() {
  				});	       		
	   	   });
	});
</script>
<script>
$(document).ready(function(){
	$('.main-background3').hover(
	       function(){ 
	       		$('.img3').removeClass('hide');
  				$('.main-background3').fadeTo( "fast", .25, function() {
  				});
		});
			$('.main-background3').mouseout(
	       function(){ 
	       		$('.img3').addClass('hide');
  				$('.main-background3').fadeTo( "fast", 1, function() {
  				});	       		
	   	   });
	});
</script>
<script>
$(document).ready(function(){
	$('.main-background4').hover(
	       function(){ 
	       		$('.img4').removeClass('hide');
  				$('.main-background4').fadeTo( "fast", .25, function() {
  				});
		});
			$('.main-background4').mouseout(
	       function(){ 
	       		$('.img4').addClass('hide');
  				$('.main-background4').fadeTo( "fast", 1, function() {
  				});	       		
	   	   });
	});
</script>