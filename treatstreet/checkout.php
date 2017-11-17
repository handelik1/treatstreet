<?php
if(session_status() == PHP_SESSION_NONE){
session_start();
}

	require('connect.php');

    $id = $_POST['user'];

	$item= $_POST['item'];
	$quantity= $_POST['quantity'];

	$list = '';
	for($i = 0; $i < count($item); $i++){
		if(count($item) == $i+1){
			$list .= strip_tags(mysqli_real_escape_string($con, $item[$i])) . ',' . $quantity[$i];
		}
		else{
			$list .= strip_tags(mysqli_real_escape_string($con, $item[$i])) . ',' . $quantity[$i] . ',';
		}
	}
	$total = $_POST['total'];
	$total = floatval($total);
	$items = $list;
	date_default_timezone_set('America/New_York');
	$date = date('m/d/Y h:i:s a', time());

	$insertOrder = mysqli_query($con, "insert into orders (ownerId, list, total, date) values ('$id', '$items', '$total', '$date');");
	$emptyCart = mysqli_query($con, "delete from cart where cartId = $id");

	mysqli_close($con); 
	echo "<script>alert('Thank you for your purchase');</script>";
	echo "<script>window.location = 'index.php'</script>";


	
?>