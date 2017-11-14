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


if(!isset($_SESSION['user'])){


$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
$out .=				'<div class = "login-wrapper">';
$out .=			  		'<h1 class = "treat-title text-center">Treat Street</h1><br><br>';
$out .= 				'<form id = "login-form" action = "login-check.php" method = "post">';
$out .=							'<div class = "credential-wrapper">';
$out .= 							'<label class = "credential-label-login">Username</label><input id = "username" type="text" name="username" size = "40" style = "width: 200px;" required><br><br>';
$out .= 							'<label class = "password credential-label-login">Password</label><input id = "password" type="password" name="password" size = "40" style = "width: 200px;"  required>';
$out .=							'</div>';
$out .= 				'</form>';
$out .=						'<input form = "login-form" id = "login-button" class = "account-button" type = "submit" name = "submit" value = "Login">';
$out .=		  	'</div>';

$out .=				'</div>';
$out .=     	'</div>';

	     																#  Registration modal
	$out .=     '<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
	$out .=       '<div class="credential-panel" id="reg-panel">';
	$out .=         '<form onsubmit="return (validateMyForm() && checkPwd())" class="credential-form" id="reg-form" action = "register.php" method="post">';
	$out .=           '<h2 class="sign-in">Registration</h2>';

	$out .=				'<div class = "row">';
	$out .=				  '<div class = "col-md-6">';
	$out .=           		'<label class="credential-label" >First Name</label>';
	$out .=           		'<input class="reg-credential" name="firstname" id="firstname" type="text" required>';
	$out .=           		'<label class="credential-label">Last Name</label>';
	$out .=           		'<input class="reg-credential" name="lastname" id="lastname" type="text" required>';
	$out .=           		'<label class="credential-label">Phone Number</label><span class = "requirement">(555-555-5555)</span>';
	$out .=           		'<input class="reg-credential" name="phone" id="phone" type="text" required>';
	$out .=           		'<label class="credential-label">Address</label><span class = "requirement">(# Street, City, State, Zip)</span>';
	$out .=           		'<input class="reg-credential" name="address" id="address" type="text" required>';
	$out .= 			  '</div>';
	$out .=				  '<div class = "col-md-6">';
	$out .=           		'<label class="credential-label">Email Address</label>';
	$out .=           		'<input class="reg-credential" name="email" id="email" type="text" required>';
	$out .=           		'<label class="credential-label">User Name</label>';
	$out .=           		'<input class="reg-credential" name="username" id="username" type="text" required>';
	$out .=           		'<label class="credential-label">Password</label><span class = "requirement">(Min 8 characters, 1 letter, 1 number)</span>';
	$out .=           		'<input class="reg-credential" name="password" id="pass" name="password" type="password" required>';
	$out .=           		'<label class="credential-label">Confirm Password</label>';
	$out .=           		'<input class="reg-credential" id="confirmpassword" type="password" required>';
	$out .= 			  '</div>';
	$out .=				'</div>';
	$out .=           '<input type="submit" id = "submit" class="register-button" value="Submit" ">';
	$out .=         '</form>';
	$out .=       '</div>';
	$out .=     '</div>';
}
else{

$out .=		  '<form action = "results.php" method = "post">';
$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-6">';

$out .=					'<button type="submit" class = "background-img main-background1" name = "candy" value = "Christmas"><img class = "main-background main-background1" src = "src/img/main2.jpg" alt="Christmas"></button>';
$out .=					'<h2 class = "img1 img-caption">Get Your Christmas Treats</h2>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-6">';
$out .=					'<button type="submit" class = "background-img main-background2" name = "candy" value = "Valentines"><img class = "main-background main-background2" src = "src/img/main.jpg" alt="Valentines"></button>';
$out .=					'<h2 class = "img2 img-caption">Sweet Candies For Your Sweetheart</h2>';
$out .=				'</div>';
$out .=     	'</div><br>';

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-6">';
$out .=					'<button type="submit" class = "background-img main-background3" name = "candy" value = "Thanksgiving"><img class = "main-background main-background3" src = "src/img/main3.jpg" alt="Thanksgiving"></button>';
$out .=					'<h2 class = "img3 img-caption">Gobble Gobble Gobble</h2>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-6">';
$out .=					'<button type="submit" class = "background-img main-background4" name = "candy" value = "Halloween"><img class = "background4 main-background main-background4" src = "src/img/main4.jpg" alt="Halloween"></button>';
$out .=					'<h2 class = "img4 img-caption">The Spooky Candy Collection</h2>';
$out .=				'</div>';
$out .=     	'</div>';

$out .=		    '<input id = "candy-input-pic" type = "hidden" name = "type" value = "all">';
$out .=	      '</form>';
}

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

<script type="text/javascript">
function validateMyForm()
{
  var pass = document.getElementById('pass').value;
  var confirm = document.getElementById('confirmpassword').value;

  if(pass != confirm)
  { 
    alert("Password and confirm password do not match.");
    return false;
  }
  return true;
}
</script>

<script>
function validateEmail(email) {
  var emailregex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return emailregex.test(email);
}

function validate() {
  var email = $("#email").val();
  if (validateEmail(email)) {
  	return true;
  } 
  else {
   alert("Email not valid.");
    return false;
  }

}

$("#submit").bind("click", validate);
</script>

<script>
function validatePhone(phone) {
  var phoneregex = /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
  return phoneregex.test(phone);
}

function validate() {
  var phone = $("#phone").val();
  if (validatePhone(phone)) {
  	return true;
  } 
  else {
   alert("Phone number not valid.");
    return false;
  }

}

$("#submit").bind("click", validate);
</script>

<script>
function checkPwd() {
	var str = document.getElementById('pass').value;
    if (str.length < 8) {
        alert("Password is too short");
        return false;
    } else if (str.search(/\d/) == -1) {
        alert("Password must contain at least 1 number");
        return false;
    } else if (str.search(/[a-zA-Z]/) == -1) {
        alert("Password must contain at least 1 letter");
        return false;
    }
    else{
    alert("Thank you for registering. Please login with your username and password.");
    return true;
	}
}

</script>