<?php   
header("Content-Type: application/json");	
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	//$keyword = $json->result->parameters->text;
	$res='{
			"fulfillmentText": "This is a text response",
			"source": "example.com",
			"payload": {
						"line": {
										"text": "'.$json.'"
									}
						}
		 }'	
	header("Content-Type: application/json");
	echo json_encode($res);	
}else{
	echo "Method Not allow";
}



?>