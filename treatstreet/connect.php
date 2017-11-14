<?php 

  $username = "handelik_test";
  $password = "handelik_Test!";
  $host = "localhost";
  $dbname = "treatstreet";

  $con = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 

 ?>