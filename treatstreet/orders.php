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

$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-12">';
$out .=					'<h1>Order History</h1>';
$out .=				'</div>';
$out .=     	'</div>';

				$orderQuery = mysqli_query($con, "select * from orders");


$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-5">';
$out .=					'<h3>Customer Info</h3>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-5">';
$out .=					'<h3>Order</h3>';
$out .=				'</div>';

$out .=		    	'<div class="col-md-2">';
$out .=					'<h3>Total</h3>';
$out .=				'</div>';

$out .=     	'</div>';

$out .=		'<div class = "admin-orders-wrapper">';
					$c = 1;
				foreach ($orderQuery as $key => $value) {
$out .= 		'<div class="row">';
$out .=		    	'<div class="col-md-5">';
						$customerQuery =  mysqli_query($con, "select firstname, lastname, phone, address, email from users where id = " . $value['ownerId']);
						$result = mysqli_fetch_assoc($customerQuery);
$out .=					'<span>'. $c . '. ' .$result['firstname'] . ' ' . $result['lastname'] . '</span><br>';
$out .=					'<span class = "address-phone-email">Address: '. $result['address'] . '</span><br>';
$out .=					'<span class = "address-phone-email">Phone: '. $result['phone'] . '</span><br>';
$out .=					'<span class = "address-phone-email">Email: '. $result['email'] . '</span><br><br>';
					$c++;
$out .=				'</div>';
					$list = explode(',', $value['list']);
$out .=		    	'<div class="col-md-5">';
					for($i = 0; $i < count($list); $i++){
						if($i % 2 == 0){
							$out .=					'<span class = "order-list">'.$list[$i].' </span>';
						}
						else{
							$out .=					'<span>x'.$list[$i].'</span><br>';
						}
					}
$out .=				'</div>';

$out .=		    	'<div class="col-md-2">';
$out .=					'<spa class = "order-total">$'.$value['total'].'</span>';
$out .=				'</div>';

$out .=     	'</div>';
				}
$out .=		'</div>';

$out .= 	'</div>';
$out .= '</body>';

echo $out;
	
require('footer.html');

?>