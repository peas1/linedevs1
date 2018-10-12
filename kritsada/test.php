<?php
  echo "I AM KRITSADA....<br>";
  $server = "us-cdbr-iron-east-01.cleardb.net";
	$username = "bb638a0b9e5724";
	$password = "3556cc19";
	$db = "heroku_5663ecc9ac15f3e";
  $conn = new mysqli($server, $username, $password, $db);
  mysqli_query($conn, "SET NAMES utf8");
  $office_id = "หนอง";
  $sql_area = "SELECT * FROM tbl_improve WHERE detail LIKE '%".$office_id."%'";
	$query_area = mysqli_query($conn,$sql_area);
  $num_row = mysqli_num_rows($query_area);
  echo "ค้นพบ ".$num_row." รายการ."<br>";
  while($obj = mysqli_fetch_array($query_area))
  {
    echo $obj["pea"]."  ".$obj["pea"]."  ".$obj["detail"]."  ".$obj["wbs"]."<br>";
  }
?>
