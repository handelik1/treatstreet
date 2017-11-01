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

$total = 0;
if(isset($_POST['add-candy'])){

$item = $_POST['add-candy'];
$user = $_SESSION['user'];
$loggedQuery = mysqli_query($con, "select id from users where username = '$user'");
$user = mysqli_fetch_row($loggedQuery);
$user = $user[0];

$itemQuery = mysqli_query($con, "select id from candy where id = '$item'");
$item = mysqli_fetch_row($itemQuery);
$item = $item[0];

$checkQuery = $cartQuery = mysqli_query($con, "select item from cart where item = '$item' and cartId = '$user'");
$check = mysqli_num_rows($checkQuery);

$candy = mysqli_real_escape_string($con,$_POST['add-candy']);

if($check > 0){

	$addQuery = mysqli_query($con, "update cart set quantity = quantity + 1 Where item = '$item' and cartId = '$user'");

}
else{
	$addQuery = mysqli_query($con, "insert into cart (cartId, item, quantity) values ('$user', '$item', 1) ");
}

$cartQuery = mysqli_query($con, "select * from cart where cartID = '$user'");
$cart = mysqli_fetch_row($cartQuery);

$count= mysqli_num_rows($cartQuery);

	if($count > 0){

		foreach($cartQuery as $key => $value){
			$itemNumber = $value['item'];
			$cartItemQuery = mysqli_query($con, "select * from candy where id = '$itemNumber'");
			$cartItem = mysqli_fetch_row($cartItemQuery);
			$out .= 		'<div class="row">';
			$out .=		    	'<div class="col-md-2">';
			$out .=				  '<div class = "image-wrapper">';
									//image
			$out .=					'<img class = "product-image" src = "src/img/'.$cartItem['5'].'">';
			$out .=				  '</div>';
			$out .=				'</div>';

			$out .=		    	'<div class="col-md-8">';
									//name
			$out .=					'<h4 class = "candy">'.$cartItem['1'].'</h4>';
									//description
			$out .=					'<p class = "candy">'.$cartItem['3'].'</p>';
			$out .=				'</div>';

$price = floatval($value['quantity']) * floatval($cartItem['2']);
$price = number_format(round($price, 2),2);
			$out .=		    	'<div class="col-md-2">';
			$out .=					'<h4 class = "candy">Quantity: '.$value['quantity'].'</h4>';
									//price
			$out .=					'<h4 class = "candy">$'.$price.'</h4>';
$total += $price;
			$out .=				'</div>';
			$out .=     	'</div>';
			$out .=			  '<hr class = "product-break">';
		}
$subtotal = number_format(round($total,2),2);
$tax = number_format(round($total * .06875,2),2);
$total = number_format(round($total + $tax,2),2);
			$out .=				'<div class = "pull-right">';
			$out .=					'<h3 class = "candy text-right">Subtotal: $'.$subtotal.'</h3>';
			$out .=					'<h3 class = "candy text-right">Tax: $'.$tax.'</h3>';
			$out .=					'<h3 class = "candy text-right">Total: $'.$total.'</h3>';
			$out .=				'</div>';
	}		
	else{
			$out .= 		'<div class="row">';
			$out .=		    	'<div class="col-md-12">';
			$out .=				  '<div class = "no-results-wrapper">';
			$out .=					'<h1 class = "candy">Cart is Empty</h1>';
			$out .=				  '</div>';
			$out .=				'</div>';
			$out .=     	'</div>';
	}

}

else{
$user = $_SESSION['user'];
$loggedQuery = mysqli_query($con, "select id from users where username = '$user'");
$user = mysqli_fetch_row($loggedQuery);
$user = $user[0];

$cartQuery = mysqli_query($con, "select * from cart where cartID = '$user'");
$cart = mysqli_fetch_row($cartQuery);

$count= mysqli_num_rows($cartQuery);

	if($count > 0){
		foreach($cartQuery as $key => $value){
			$itemNumber = $value['item'];
			$cartItemQuery = mysqli_query($con, "select * from candy where id = '$itemNumber'");
			$cartItem = mysqli_fetch_row($cartItemQuery);
			$out .= 		'<div class="row">';
			$out .=		    	'<div class="col-md-2">';
			$out .=				  '<div class = "image-wrapper">';
									//image
			$out .=					'<img class = "product-image" src = "src/img/'.$cartItem['5'].'">';
			$out .=				  '</div>';
			$out .=				'</div>';

			$out .=		    	'<div class="col-md-8">';
									//name
			$out .=					'<h4 class = "candy">'.$cartItem['1'].'</h4>';
									//description
			$out .=					'<p class = "candy">'.$cartItem['3'].'</p>';
			$out .=				'</div>';

$price = floatval($value['quantity']) * floatval($cartItem['2']);
$price = number_format(round($price, 2),2);
			$out .=		    	'<div class="col-md-2">';
			$out .=					'<h4 class = "candy">Quantity: '.$value['quantity'].'</h4>';
									//price
			$out .=					'<h4 class = "candy">$'.$price.'</h4>';
$total += $price;
			$out .=				'</div>';
			$out .=     	'</div>';
			$out .=			  '<hr class = "product-break">';
		}
$subtotal = number_format(round($total,2),2);
$tax = number_format(round($total * .06875,2),2);
$total = number_format(round($total + $tax,2),2);
			$out .=				'<div class = "pull-right">';
			$out .=					'<h3 class = "candy text-right">Subtotal: $'.$subtotal.'</h3>';
			$out .=					'<h3 class = "candy text-right">Tax: $'.$tax.'</h3>';
			$out .=					'<h3 class = "candy text-right">Total: $'.$total.'</h3>';
			$out .=				'</div>';	
	}
	else{
			$out .= 		'<div class="row">';
			$out .=		    	'<div class="col-md-12">';
			$out .=				  '<div class = "no-results-wrapper">';
			$out .=					'<h1 class = "candy">Cart is Empty</h1>';
			$out .=				  '</div>';
			$out .=				'</div>';
			$out .=     	'</div>';
	}
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