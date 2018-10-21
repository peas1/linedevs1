<?php

function flex_msg($keyword)
{
	$server = "us-cdbr-iron-east-01.cleardb.net";
	$username = "bb638a0b9e5724";
	$password = "3556cc19";
	$db = "heroku_5663ecc9ac15f3e";
	$conn = new mysqli($server, $username, $password, $db);
	mysqli_query($conn, "SET NAMES UTF8");
	
	$sql_key_search = mysqli_query($conn, "SELECT * FROM tbl_improve WHERE detail LIKE '%".$keyword."%'");
	//$sql_key_search = "SELECT * FROM tbl_standard WHERE keyword LIKE '%".$keyword."%' OR doc_no LIKE '%".$keyword."%' OR discription LIKE '%".$keyword."%'";
	$key_query = mysqli_query($conn,$sql_key_search);
    mysqli_query($key_query, "SET NAMES UTF8");
	$numrows = mysqli_num_rows($key_query);
	$objsearch = mysqli_fetch_array($key_query);
	if($numrows > 1)
	{
		$url = "line://app/1544181630-JP9L0Xmj?keyword=".$keyword;
		$txtresult = "จำนวน ".$numrows." รายการ";
		$btn_txt = "รายละเอียดเพิ่มเติม";
	}
	else if($numrows == 1)
	{
		$url = "line://app/1544181630-l71VdJ0m?link=".$objsearch["detail"];
		$txtresult = "จำนวน ".$numrows." รายการ";
		$btn_txt = "รายละเอียดเพิ่มเติม";
	}
	else if ($numrows < 1)
	{
		$url = "https://nutt-i.com/psqv2";
		$txtresult = "ไม่พบข้อมูล";
		$btn_txt = "กรุณาเปลี่ยนคำค้นหาใหม่";
	}
	$json1 = '{
				"type":"flex",
				"altText":"PSQ V.2",
				"contents":{
								"type": "bubble",
								"body": {
											"type": "box",
											"layout": "vertical",
											"contents": [{
															"type": "text",
															"text": "ผลการค้นหา",
															"weight": "bold",
															"align":"center",
															"size": "md"
														},
														{
															"type": "text",
															"text": "คำว่า '.$keyword.'",
															"weight": "bold",
															"align":"center",
															"size": "sm"
														},
														{
															"type": "text",
															"text": "'.$txtresult.' ",
															"weight": "bold",
															"align":"center",
															"size": "sm"
														},
														{
															"type": "separator",
															"margin": "xxl"
														}]
										},
								"footer": {
											"type": "box",
											"layout": "vertical",
											"spacing": "sm",
											"contents": [{
													"type": "button",
													"style": "primary",
													"height": "sm",
													"action": {
																"type": "uri",
																"label": "'.$btn_txt.'",
																"uri": "'.$url.'"
															}
												},
												{
													"type": "spacer",
													"size": "sm"
												}
												],
									"flex": 0
									}
					
				
			}
	}';
	$result = json_decode($json1);
	return $result;
}
?>