<?php
require('render_msg.php');


	$access_token = '7Bkj6AqoRCKOJc08sAW2luAwLn3PT99764/VTeSHnDzCGlc0oXF+ourT4ZVRK01darE/LYd5ihfcuxEbHa30I4qAvzfJNK3EStUU/TKJcfw9xOJxTNo+AMJtXwpQD0zdZsLo/TDUGFUZAqSbN5fWUwdB04t89/1O/w1cDnyilFU=';
    $messages = [ 'type' => 'text', 
                'text' => "ทดสอบ PUSH"
                ];
    $url = 'https://api.line.me/v2/bot/message/push';
    $data = ['to' => "Ueb7a733f42e839e7b98adcf81bcff05b",'messages' => [$messages]];
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



?>