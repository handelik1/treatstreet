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

$user = $_SESSION['user'];
$loggedQuery = mysqli_query($con, "select id from users where username = '$user'");
$user = mysqli_fetch_row($loggedQuery);
$user = $user[0];
if(isset($_POST['add-candy'])){

$item = $_POST['add-candy'];

$itemQuery = mysqli_query($con, "select id from candy where id = '$item'");
$item = mysqli_fetch_row($itemQuery);
$item = $item[0];

$checkQuery = $cartQuery = mysqli_query($con, "select item from cart where item = '$item' and cartId = '$user'");
$check = mysqli_num_rows($checkQuery);

$candy = strip_tags(mysqli_real_escape_string($con,$_POST['add-candy']));

if($check > 0){

	$addQuery = mysqli_query($con, "update cart set quantity = quantity + 1 Where item = '$item' and cartId = '$user'");

}
else{
	$addQuery = mysqli_query($con, "insert into cart (cartId, item, quantity) values ('$user', '$item', 1) ");
}

echo "<script>window.location = 'shopping-cart.php'</script>";

}

$cartQuery = mysqli_query($con, "select * from cart where cartID = '$user'");

$count= mysqli_num_rows($cartQuery);
	$c = 0;
	if($count > 0){
		$out .=		'<div class = "cart-wrapper">';
		foreach($cartQuery as $key => $value){
			$itemNumber = $value['item'];
			$cartItemQuery = mysqli_query($con, "select * from candy where id = '$itemNumber'");
			$cartItem = mysqli_fetch_assoc($cartItemQuery);
			$out .= 		'<div class="row">';
			$out .=		    	'<div class="col-md-2">';
			$out .=				  '<div class = "image-wrapper">';
									//image
			$out .=					'<img class = "product-image" src = "src/img/'.$cartItem['image'].'">';
			$out .=				  '</div>';
			$out .=				'</div>';

			$out .=		    	'<div class="col-md-7">';
			$out .=				   '<form onsubmit = "return sure()" id = "remove_from_cart'.$c.'" action = "update_cart.php" method = "post">';
			$out .=				      '<input type = "hidden" name = "remove">';
									//item id
			$out .=				      '<input type = "hidden" name = "item_id" value = '.$cartItem['id'].'>';
			$out .=				   '</form>';
									//name
			$out .=					'<h4 class = "candy">'.$cartItem['name'].'</h4>';
									//price
			$out .=					'<h5 class = "candy">Unit Price: $'.$cartItem['price'].'</h5>';
									//description
			$out .=					'<p class = "candy">'.$cartItem['description'].'</p>';
			$out .=				'</div>';

$price = floatval($value['quantity']) * floatval($cartItem['price']);
$price = number_format(round($price, 2),2);
			$out .=		    	'<div class="col-md-3">';
			$out .=					'<div class = "row">';

			$out .=						'<div class = "col-md-6">';
			$out .=							'<h4 class = "candy" id ="quantity">Quantity: '.$value['quantity'].'</h4>';
											//price
			$out .=							'<h4 class = "candy">$'.$price.'</h4>';
			$out .=						'</div>';

			$out .=						'<div class = "col-md-6">';
			$out .=				   			'<form onsubmit = "return checkNumber()" id = "update'.$c.'" action = "update_cart.php" method = "post">';
			$out .=				      			 '<input type = "hidden" name = "update">';
													//item id
			$out .=				     			 '<input type = "hidden" name = "item_id" value = '.$cartItem['id'].'>';
			$out .=							     '<input class = "quantity-text" id = "quantity_box" name = "quantity" size = "2" type = "text" placeholder = "New Quantity">';
			$out .=								'<input class = "cart-button" id = "update'.$c.'" form = "update'.$c.'" type = "submit" name = "submit" value = "Update">';
			$out .=				   			'</form>';
			$out .=							'<input class = "cart-button" form = "remove_from_cart'.$c.'" type = "submit" name = "submit" value = "Remove">';
			$out .=						'</div>';
			$out .=					'</div>';
$total += $price;
			$out .=				'</div>';
			$out .=     	'</div>';
			$out .=			  '<hr class = "product-break">';
			$c++;
		}
			$out .=		'</div>';
$subtotal = number_format(round($total,2),2);
$tax = number_format(round($total * .06875,2),2);
$total = number_format(round($total + $tax,2),2);
			$out .=				'<div class = "pull-right totals">';
			$out .=					'<h4 class = "candy text-right">Subtotal: $'.$subtotal.'</h4>';
			$out .=					'<h4 class = "candy text-right">Tax: $'.$tax.'</h4>';
			$out .=					'<h4 class = "candy text-right">Total: $'.$total.'</h4>';
			$out .=					'<input data-toggle="modal" data-target="#checkout-modal" class = "text-center checkout-button" type = "button" value = "Checkout">';
			$out .=				'</div>';

			$out .=     '<div class="modal fade" id="checkout-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
			$out .=       '<div class="checkout-panel" id="reg-panel">';
			$out .=         '<form onsubmit="" class="checkout-form" id="reg-form" action = "checkout.php" method="post">';
			$out .=           '<h2 class="checkout-header text-center">Checkout</h2>';
			$out .=           	'<h3 class="checkout-label pull-left" >Item</h3>';
			$out .=           	'<h3 class="checkout-label pull-right" >Quantity</h3><br><br>';
			$out .=				  	'<div class = "checkout-wrapper">';
		foreach($cartQuery as $key => $value){
			$itemNumber = $value['item'];
			$cartItemQuery = mysqli_query($con, "select * from candy where id = '$itemNumber'");
			$cartItem = mysqli_fetch_assoc($cartItemQuery);

			$out .=				'<div class = "row">';
			$out .=				  '<div class = "col-md-12">';
			$out .=						'<h4 class = "checkout-item">'.$cartItem['name'].'</h5>';
			$out .=           			'<input name="item[]" id="item-name" type = "checkbox" value = "'.$cartItem['name'].'" checked>';
			$out .=						'<h4 id = "item-quantity" class = "checkout-item pull-right">'.$value['quantity'].'</h5>';
			$out .=           			'<input name="quantity[]" id="checkout-item-quantity" type = "checkbox" value = "'.$value['quantity'].'" checked>';
			$out .= 			  	'</div>';			
			$out .= 			  '</div>';
		}
			$out .=				'</div>';

			$out .=			 		'<hr class = "product-break">';
			$out .=					'<h4 class = "candy text-right">Total: $'.$total.'</h4>';
			$out .=           		'<input name="total" id="total" type = "hidden" value = "'.$total.'">';
			$out .=           		'<input name="user" id="total" type = "hidden" value = "'.$user.'">';
			$out .=           '<input type="submit" id = "submit" class="checkout-submit" value="Submit Order" ">';
			$out .=         '</form>';
			$out .=       '</div>';
			$out .=     '</div>';

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
function sure(){
	if (confirm('Are You Sure? This CANNOT be undone!')){
	   return true;
	}
	else{
	   return false;
	}
}

</script>

<script>
	$(document).ready(function(){
		$("input[id^='update']" ).click(function(){
			var quantity = $(this).prev().val();
			 if(isNaN(quantity) || quantity == null || quantity == '' || quantity < 1 || quantity % 1 != 0){
			  	alert("Please enter a valid number");
			  	return false;
			  }
			  else{
			  	return true;
			  }
		});
	});


</script>