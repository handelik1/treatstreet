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
$out .=					'<h2 class = "img1 img-caption">Get Your Christmas Treats</h2>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-6">';
$out .=					'<input type = "image" name = "candy"  class = "main-background main-background2" src = "src/img/main.jpg" value = "valentines">';
$out .=					'<h2 class = "img2 img-caption">Sweet Candies For Your Sweetheart</h2>';
$out .=				'</div>';
$out .=     	'</div><br>';

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-6">';
$out .=					'<input type = "image" name = "candy"  class = "main-background main-background3" src = "src/img/main3.jpg" value = "thanksgiving">';
$out .=					'<h2 class = "img3 img-caption">Gobble Gobble Gobble</h2>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-6">';
$out .=					'<input type = "image" name = "candy"  class = "main-background main-background4" src = "src/img/main4.jpg" value = "halloween">';
$out .=					'<h2 class = "img4 img-caption">The Spooky Candy Collection</h2>';
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
	       		$('.img1').fadeTo( "fast", 1, function() {
  				});
  				$('.main-background1').fadeTo( "fast", .25, function() {
  				});
		});
			$('.main-background1').mouseleave(
	       function(){ 
	       		$('.img1').fadeTo( "fast", 0, function() {
  				});	       		
  				$('.main-background1').fadeTo( "fast", 1, function() {
  				});	       		
	   	   });
	});

</script>

<script>
$(document).ready(function(){
	$('.main-background2').hover(
	       function(){ 
	       		$('.img2').fadeTo( "fast", 1, function() {
  				});
  				$('.main-background2').fadeTo( "fast", .25, function() {
  				});
		});
			$('.main-background2').mouseleave(
	       function(){ 
	       		$('.img2').fadeTo( "fast", 0, function() {
  				});	       		
  				$('.main-background2').fadeTo( "fast", 1, function() {
  				});	       		
	   	   });
	});
</script>
<script>
$(document).ready(function(){
	$('.main-background3').hover(
	       function(){ 
	       		$('.img3').fadeTo( "fast", 1, function() {
  				});
  				$('.main-background3').fadeTo( "fast", .25, function() {
  				});
		});
			$('.main-background3').mouseleave(
	       function(){ 
	       		$('.img3').fadeTo( "fast", 0, function() {
  				});	       		
  				$('.main-background3').fadeTo( "fast", 1, function() {
  				});	       		
	   	   });
	});
</script>
<script>
$(document).ready(function(){
	$('.main-background4').hover(
	       function(){ 
	       		$('.img4').fadeTo( "fast", 1, function() {
  				});
  				$('.main-background4').fadeTo( "fast", .25, function() {
  				});
		});
			$('.main-background4').mouseleave(
	       function(){ 
	       		$('.img4').fadeTo( "fast", 0, function() {
  				});	       		
  				$('.main-background4').fadeTo( "fast", 1, function() {
  				});	       		
	   	   });
	});
</script>