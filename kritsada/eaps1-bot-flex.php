<?php
	//require('connect-db.php');//เรียกใช้ file connect-db
	require('render_msg.php');
//	$server = "us-cdbr-iron-east-01.cleardb.net";
//	$username = "bb638a0b9e5724";
//	$password = "3556cc19";
//	$db = "heroku_5663ecc9ac15f3e";
//   $conn = new mysqli($server, $username, $password, $db);
//    mysqli_query($conn, "SET NAMES utf8");
	
function reply_msg($text,$replyToken)//สร้างข้อความและตอบกลับ
{
    $access_token = 'WidItQe5HhhYy7jsjGFfXg1WurXkIgGFMPZqNOSgvlmL7J4VEPpogXRLWLEETLQKDJd1Ei9qZ4KL6T6etGjDa5RXb/r8e/sea5bzcFu5BPdXB3jy45KWMh7Mvtb/NLJCTODwZf5zpOZtlevzi2KnzgdB04t89/1O/w1cDnyilFU=';
    $messages = ['type' => 'text','text' => $text];//สร้างตัวแปร 
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
function reply_flex_msg($keyword,$replyToken)
{
    $access_token = 'WidItQe5HhhYy7jsjGFfXg1WurXkIgGFMPZqNOSgvlmL7J4VEPpogXRLWLEETLQKDJd1Ei9qZ4KL6T6etGjDa5RXb/r8e/sea5bzcFu5BPdXB3jy45KWMh7Mvtb/NLJCTODwZf5zpOZtlevzi2KnzgdB04t89/1O/w1cDnyilFU=';
    $keyword1 = $keyword;
	$messages = flex_msg($keyword1);
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

// รับข้อมูล
$content = file_get_contents('php://input');//รับข้อมูลจากไลน์
$events = json_decode($content, true);//แปลง json เป็น php
if (!is_null($events['events'])) //check ค่าในตัวแปร $events
{
    foreach ($events['events'] as $event) 
    {
        if ($event['type'] == 'message' && $event['message']['type'] == 'text')
        {
            $replyToken = $event['replyToken']; //เก็บ reply token เอาไว้ตอบกลับ
            $source_type = $event['source']['type'];//เก็บที่มาของ event(user หรือ group)
            $txtin = $event['message']['text'];//เอาข้อความจากไลน์ใส่ตัวแปร $txtin
            $first_char = substr($txtin,0,1); //ตัดเอาเฉพาะตัวอักษรตัวแรก
			if($first_char == "@") //เช็คว่าต้องการคุยกับ Bot ใช่หรือไม่
			{
				// เชื่อมต่อฐานข้อมูล ใน Navicat
			$server = "us-cdbr-iron-east-01.cleardb.net";
			$username = "bb638a0b9e5724";
			$password = "3556cc19";
			$db = "heroku_5663ecc9ac15f3e";
			$conn = new mysqli($server, $username, $password, $db);
			mysqli_query($conn, "SET NAMES UTF8");
			
				$keyword = substr($txtin,1,strlen($txtin)); //สกัดคำค้นหาออกมา 
				//$query_search = mysqli_query($conn, "SELECT * FROM tbl_improve WHERE detail LIKE '%".$keyword."%'");
				//mysqli_query($query_search, "SET NAMES UTF8");	
				//$num = mysqli_num_rows($query_search);
				reply_flex_msg($keyword,$replyToken);
				
				//if ($num >= "20") {
					//$txtsend = "ผลการค้นหา '" .$keyword. "' พบ ".$num." รายการ"."\n"."\nโปรดระบุคำค้นหาใหม่ ที่มีรายละเอียดมากขึ้น";
				//} else 
					//{
					//$txtsend = "ผลการค้นหา '" .$keyword. "' พบ ".$num." รายการ";
					//$a=1;
					//while($objsearch = mysqli_fetch_array($query_search))
				//{
					//$txtsend = $txtsend ."\n\nงานที่ ".$a."\nของ : ".$objsearch["office"]."\nชื่องาน : ".$objsearch["detail"]."\nWBS : ".$objsearch["wbs"].
					//"\nอนุมัติครั้งที่ ".$objsearch["no"]."\nหนังสือที่ ".$objsearch["approval"]." ลว. ".$objsearch["date"];
					//$a = $a+1;
				//}
					//}
				//reply_msg($txtsend,$replyToken);//เรียกใช้ function
				//reply_msg($office_id,$replyToken);//เรียกใช้ function
				break;
			}      
        }
    }
}
echo "OKJAA";
echo "$txtsend";
?>