<?php
	$server = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b798786b8aa714";
    $password = "2e0e0451";
    $db = "heroku_ce52199dd4f50e1";
    $conn = new mysqli($server, $username, $password, $db);
	mysqli_query($conn, "SET NAMES utf8");
	
	$name = $_POST["name"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	echo $name." ".$lastname." ".$email;
?>