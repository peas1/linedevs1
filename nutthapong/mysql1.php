 <?php
 	$server = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b798786b8aa714";
    $password = "2e0e0451";
    $db = "heroku_ce52199dd4f50e1";
    $conn = new mysqli($server, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_query($conn, "SET NAMES utf8");
	echo "connected !!!!!!!";
	$sql_text = "SELECT * FROM tbl_nuthapong";
	$query = mysqli_query($conn,$sql_text);
	while($obj = mysqli_fetch_array($query))
	{
		echo $obj["name"];
	}
	
?>