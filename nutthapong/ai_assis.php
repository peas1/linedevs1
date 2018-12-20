<?php   
header("Content-Type: application/json");	
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	//$keyword = $json->result->parameters->text;
		
	header("Content-Type: application/json");
	echo json_encode($json);	
}else{
	echo "Method Not allow";
}



?>