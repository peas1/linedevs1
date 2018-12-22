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
					"source"=>"line",
					"payload"=>array(
									  "line"=>array(
													 "message"=> array(
																		"type"=>"text",
																		"text"=>"jkljioopjdkslajdiwd")
													)
									)
				);
	$response=array(
          "source" => $request["result"]["source"],
          "speech" => "Speech for response",
          "messages" => $res2,
          "contextOut" => array()
      );
	header("Content-Type: application/json");
	echo json_encode($response);
	//echo $requestBody;
}else{
	echo "Method Not allow";
}



?>