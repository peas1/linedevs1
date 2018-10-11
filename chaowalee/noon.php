<?php
	$server = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b21e535520af4b";
    $password = "402bbf1f";
    $db = "heroku_821969a41e3a17e";
    $conn = new mysqli($server, $username, $password, $db);
	mysqli_query($conn, "SET NAMES utf-8");
	$sql = "SELECT * FROM librarypq";
	$query = mysqli_query($conn,$sql);
	while($obj = mysqli_fetch_array($query))
	{
		echo $obj["type"];
	}




?>