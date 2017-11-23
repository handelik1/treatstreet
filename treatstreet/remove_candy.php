<?php
if(session_status() == PHP_SESSION_NONE){
session_start();
}

require('connect.php');

	$list = $_POST['candy_list'];
	foreach($list as $value){
		$candy = strip_tags(mysqli_real_escape_string($con, $value));
		$removeQuery = mysqli_query($con, "delete from candy where name = '$value'");
	}

	mysqli_close($con); 
    echo "<script>window.location = 'remove_product.php'</script>";

?>