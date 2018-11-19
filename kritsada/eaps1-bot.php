<?php
//require('./db/connect-db.php');//เรียกใช้ file connect-db
//	$server = "us-cdbr-iron-east-01.cleardb.net";
//	$username = "bb638a0b9e5724";
//	$password = "3556cc19";
//	$db = "heroku_5663ecc9ac15f3e";
//   $conn = new mysqli($server, $username, $password, $db);
//    mysqli_query($conn, "SET NAMES utf8");
	
function reply_msg($text,$replyToken)//สร้างข้อความและตอบกลับ
{
    $access_token = 'euQ+PlgFAq/SRzb3qd6yhrQzvxW3mgI89B3EiwYyFuS2yl+3LfgbJo+yhD5QXE7kbmjtYwe47GeniAU52PnvfCIuIO1Rc+wA2ipzZpe6a/lwKNJ6jvZUhCgweX/z8/23VlTeuzci13qu9M3k8Ma92QdB04t89/1O/w1cDnyilFU=';
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
            $first_char = substr($txtin,0,1);//ตัดเอาเฉพาะตัวอักษรตัวแรก
			if($first_char == "@")
			{
			$server = "us-cdbr-iron-east-01.cleardb.net";
			$username = "bb638a0b9e5724";
			$password = "3556cc19";
			$db = "heroku_5663ecc9ac15f3e";
			$conn = new mysqli($server, $username, $password, $db);
			mysqli_query($conn, "SET NAMES UTF8");
			//mysqli_set_charset($conn, "utf8"); //ลองเพิ่ม	
			
				$keyword = substr($txtin,1,strlen($txtin));///ได้รหัสการไฟฟ้า 
				//reply_msg($office_id,$replyToken);
				$keyword_encode = base64_encode ($keyword);
				$keyword = base64_decode ($keyword_encode);
				$query_search = mysqli_query($conn, "SELECT * FROM tbl_improve WHERE detail LIKE '%".$keyword."%'");
				mysqli_query($query_search, "SET NAMES UTF8");	
				$num = mysqli_num_rows($query_search);

				//$sql_search ="SELECT * FROM tbl_improve WHERE pea LIKE '%".$keyword."%' OR detail LIKE '%".$keyword."%'";
				//$query_search = mysqli_query($conn,$sql_search);
				//$num = mysqli_num_rows($query_search);// นับจำนวนที่หาเจอ
				if ($num >= "15") {
					$txtsend = "ผลการค้นหา '" .$keyword. "' พบ ".$num." รายการ"."\n"."\nโปรดระบุคำค้นหาใหม่ ที่มีรายละเอียดมากขึ้น";
				} else 
					{
					$txtsend = "ผลการค้นหา '" .$keyword. "' พบ ".$num." รายการ";
					$a=1;
					while($objsearch = mysqli_fetch_array($query_search))
				{
					$txtsend = $txtsend ."\n\nงานที่ ".$a." : ".$objsearch["office"]."\nชื่องาน : ".$objsearch["detail"]."\nWBS : ".$objsearch["wbs"].
					"\nหนังสือที่ ".$objsearch["approval"]." ลว. ".$objsearch["date"]." (อนุมัติครั้งที่ ".$objsearch["no"].")";
					$a = $a+1;
				}
					}
				reply_msg($txtsend,$replyToken);//เรียกใช้ function
				//reply_msg($office_id,$replyToken);//เรียกใช้ function
				break;
			}      
        }
    }
}
echo "OKJAA";
echo "$txtsend";
?>