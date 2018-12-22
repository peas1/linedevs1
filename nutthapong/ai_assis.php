<?php   
header("Content-Type: application/json");
function push($data)
{
    $access_token = 'HScoQtJ9WeTsUePpz0xZ7vo//Tm7j+PR/LCoi09r4L7XDPJVZr/Bc3iSn6NGBJVa8LpQM446o/uIUbLxOfjm09FDX+73peOuXqHvKttcHLeqogyWj0RU/Vqj1LapFoxfp2lOPYq4O8ErqPnZGyRpPAdB04t89/1O/w1cDnyilFU=';
    $messages = [ 'type' => 'text', 
				'text' => $data
                 ];
    $url = 'https://api.line.me/v2/bot/message/push';
    $data = ['to' => 'Ua9ba6c25071c19588c095ec147efe2b1','messages' => [$messages]];
    $post = json_encode($data);
    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch); 
}	
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
	$res3 = array("message"=>array("platform"=>"line","speech"=>"Text response","type"=>0)
				);
	header("Content-Type: application/json");
	push();
	echo json_encode($json);
	//echo $requestBody;
}else{
	echo "Method Not allow";
}



?>