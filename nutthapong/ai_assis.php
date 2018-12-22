<?php   
header("Content-Type: application/json");
function reply_msg($keyword,$replyToken)
{
    $access_token = 'HScoQtJ9WeTsUePpz0xZ7vo//Tm7j+PR/LCoi09r4L7XDPJVZr/Bc3iSn6NGBJVa8LpQM446o/uIUbLxOfjm09FDX+73peOuXqHvKttcHLeqogyWj0RU/Vqj1LapFoxfp2lOPYq4O8ErqPnZGyRpPAdB04t89/1O/w1cDnyilFU=';
	$messages = ['type' => 'text','text' => $keyword];
    // Make a POST Request to Messaging API to reply to sender
    $url = 'https://api.line.me/v2/bot/message/reply';
    $data = [
                'replyToken' => $replyToken,
                'messages' => [$messages],
            ];
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
    echo $result . "\r\n";
}	
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	header("Content-Type: application/json");
	$data = json_encode($json);
	$replyToken = $json->originalRequest->data->data->replyToken;
	/*$topic = $json->result->parameters->topic;
	$day = $json->result->parameters->day;
	$time_period = $json->result->parameters->t_period;
	$place = $json->result->parameters->place;
	$Attendees = $json->result->parameters->Attendees;
	$data_back = $topic."\n".$day."\n".$time_period."\n".$place."\n".$Attendees;*/
	reply_msg($data,$replyToken);
	//push($replytoken);
	echo json_encode($res3);
	//echo $requestBody;
}else{
	echo "Method Not allow";
}



?>