<?php
	require('connect.php');

  	$firstname = mysqli_real_escape_string($con,$_POST['firstname']);
	$lastname = mysqli_real_escape_string($con,$_POST['lastname']);
  	$email = mysqli_real_escape_string($con,$_POST['email']);
  	$phone = mysqli_real_escape_string($con,$_POST['phone']);
  	$address = mysqli_real_escape_string($con,$_POST['address']);
  	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$epass = hash('sha512', $username.$password);
	$time = time();

	$userQuery = mysqli_query($con, "insert into users (username, password, created, firstname, lastname, phone, address, email, user_type) values ('$username','$epass', '$time', '$firstname', '$lastname', '$phone', '$address', '$email', 'authenticated user')");

	mysqli_close($con);
	echo "<script>window.location = 'index.php'</script>";
?>