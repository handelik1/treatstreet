<?php
$out = '';
if(session_status() == PHP_SESSION_NONE){
session_start();
}
require('connect.php');

require('header.html');

$out = '';
$out .= '<body class = "admin-body">';
$out .= 	'<div class="container">';
$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
$out .=					'<img class = "background" src = "src/img/background.jpg">';
$out .=				'</div>';
$out .=     	'</div>';

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
						require('admin-nav.php');
$out .=				'</div>';
$out .=     	'</div>';

	$getTotal = mysqli_query($con, "select SUM(total) from orders");
	$total = mysqli_fetch_row($getTotal);

$out .= 		'<div class="row">';

$out .=		    	'<div class="col-md-6">';

$out .=					'<div class="admin-card">';
$out .=						'<img class = "profit-img" src="src/img/profit.png" alt="Profit">';
$out .=							'<div class="profit-wrapper">';
$out .=						    	'<p class = "profit"><span>Earnings</span><br>$'.$total[0].'</p>';
$out .=						 	'</div>';
$out .=					'</div>';

$out .=				'</div>';

	$getUsers = mysqli_query($con, "select count(username) from users");
	$users = mysqli_fetch_row($getUsers);

$out .=		    	'<div class="col-md-6">';

$out .=					'<div class="admin-card">';
$out .=						'<img class = "profit-img" src="src/img/users.png" alt="Profit">';
$out .=							'<div class="profit-wrapper">';
$out .=						    	'<p class = "profit"><span>Customers</span><br>'.$users[0].'</p>';
$out .=						 	'</div>';
$out .=					'</div>';
$out .=				'</div>';

$out .=     	'</div>';


$out .= 	'</div>';
$out .= '</body>';

echo $out;
	
require('footer.html');

?>