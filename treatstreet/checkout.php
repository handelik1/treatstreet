<?php
if(session_status() == PHP_SESSION_NONE){
session_start();
}

	require('connect.php');

    $user = $_POST['user'];
    $candyId = $_POST['id'];
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

	foreach (array_combine($candyId, $quantity) as $id => $amount) {
		$getInventory = mysqli_query($con, "select inventory from candy where id = $id");
		$inventory = mysqli_fetch_row($getInventory);
		$currentInventory = intval($inventory[0]);
		$newInventory = $currentInventory - $amount;

		if($newInventory < 0){
			echo "<script>alert('Invalid purchase. Quantity of item exceeds inventory');</script>";
			echo "<script>window.location = 'shopping-cart.php'</script>";
			exit();
		}
		else{
		$updateInventory = mysqli_query($con, "update candy set inventory = $newInventory where id = $id");
		}
	}

	
	$total = $_POST['total'];
	$total = floatval($total);
	$items = $list;
	date_default_timezone_set('America/New_York');
	$date = date('m/d/Y h:i:s a', time());
	$insertOrder = mysqli_query($con, "insert into orders (ownerId, list, total, date) values ('$user', '$items', '$total', '$date');");
	$emptyCart = mysqli_query($con, "delete from cart where cartId = $user");

	mysqli_close($con); 
	echo "<script>alert('Thank you for your purchase');</script>";
	echo "<script>window.location = 'index.php'</script>";

	
?>