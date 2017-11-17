<?php
	require('connect.php');

	$name = strip_tags(mysqli_real_escape_string($con,$_POST['new_name']));
	$description = strip_tags(mysqli_real_escape_string($con,$_POST['new_description']));
	$price = strip_tags(mysqli_real_escape_string($con,$_POST['new_price']));
	$quantity = strip_tags(mysqli_real_escape_string($con,$_POST['new_quantity']));

	$checkQuery = "select name from candy where name = '$name'";

	$result = mysqli_query($con, $checkQuery);
	
	$count= mysqli_num_rows($result);
	//checks if row is queried
	if($count != 1){
		if(isset($_FILES['new_image'])) {

		$fileName = $_FILES['new_image']['name'];
		$tmpName  = $_FILES['new_image']['tmp_name'];
		$fileSize = intval($_FILES['new_image']['size']);
		$fileType = $_FILES['new_image']['type'];

		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		if(!get_magic_quotes_gpc()){
	    	$fileName = addslashes($fileName);
		}

			$num = rand(1,100000000);
			$name_parts= explode(".", $fileName);
			$newname = $name_parts[0] . $num . "." . $name_parts[1]; 
			$fileName = $newname;
			move_uploaded_file($tmpName, "src/img/$fileName");

	}
		$insertCandy = mysqli_query($con,"insert into candy (name, price, description, inventory, image) VALUES ('$name', '$price', '$description', '$quantity', '$fileName')");
		$typelist = $_POST['type_list'];
		$candyIdQuery = mysqli_query($con,"select id from candy where name = '$name'");
		$id = mysqli_fetch_row($candyIdQuery);
		$id = $id[0];
		foreach($typelist as $value){
			$type = strip_tags(mysqli_real_escape_string($con, $value));
			$insertCandy = mysqli_query($con,"insert into types (tid, type) VALUES ('$id', '$type')");
		}

	}
	else{
		echo "<script>window.location = 'new_product.php'</script>";
	}


	mysqli_close($con);
	echo "<script>window.location = 'new_product.php'</script>";


?>