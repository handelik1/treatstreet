<?php
if(session_status() == PHP_SESSION_NONE){
session_start();
}
	require('connect.php');

	if(isset($_POST['remove'])){
		$user = $_SESSION['user'];
	  	$item_id = mysqli_real_escape_string($con,$_POST['item_id']);
	  	$item_id = (int)$item_id;
		$deleteQuery = mysqli_query($con, "delete from cart where item = $item_id and cartId = (select id from users where username = '$user')");
	}
	else{
		$user = $_SESSION['user'];
	  	$item_id = mysqli_real_escape_string($con,$_POST['item_id']);
	  	$item_id = (int)$item_id;
	  	$quantity = mysqli_real_escape_string($con,$_POST['quantity']);
	  	$quantity = (int)$quantity;
		$updateQuery = mysqli_query($con, "update cart set quantity = $quantity where item = $item_id and cartId = (select id from users where username = '$user')");
	}

	mysqli_close($con);
	echo "<script>window.location = 'shopping-cart.php'</script>";

?>