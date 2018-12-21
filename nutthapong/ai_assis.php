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
										"text":"456498468548"
										}
							}
			}';
	$res2 = array(
					"source"=>"line",
					"payload"=>array(
									  "line"=>array(
												     "text"=>"4548454854"
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