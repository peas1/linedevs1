<?php   
header("Content-Type: application/json");	
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	//$keyword = $json->result->parameters->text;
	$res='{
					"fulfillmentText":"This is a text response",
					"source":"line",
					"payload":{
								"line":{
										"type":"text"
										}
							}
			}';
	$res2 = array(
					"source"=>$json->result->source,
					"payload"=>array(
									  "line"=>array(
													 "message"=> array(
																		"type"=>"text",
																		"text"=>"jkljioopjdkslajdiwd")
													)
									)
				);
	
	header("Content-Type: application/json");
	echo json_encode($res2);
	//echo $requestBody;
}else{
	echo "Method Not allow";
}



?>