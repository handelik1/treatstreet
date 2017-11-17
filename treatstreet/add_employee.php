<?php
	require('connect.php');

	$name = strip_tags(mysqli_real_escape_string($con,$_POST['name']));
	$title = strip_tags(mysqli_real_escape_string($con,$_POST['title']));
	$hours = strip_tags(mysqli_real_escape_string($con,$_POST['hours']));
	$salary = strip_tags(mysqli_real_escape_string($con,$_POST['salary']));

	$insertEmployee = mysqli_query($con,"insert into employee (name, hours, salary, etype) VALUES ('$name', '$hours', '$salary', '$title')");

	mysqli_close($con);
	echo "<script>window.location = 'hr.php'</script>";

?>