<?php

function flex_msg($keyword)
{
	require('./db/connect-db.php');
	$query_key_search = mysqli_query($conn, "SELECT * FROM tbl_improve WHERE detail LIKE '%".$keyword."%'");
	//$sql_key_search = "SELECT * FROM tbl_standard WHERE keyword LIKE '%".$keyword."%' OR doc_no LIKE '%".$keyword."%' OR discription LIKE '%".$keyword."%'";
	$key_query = mysqli_query($conn,$sql_key_search);
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
		$url = "line://app/1544181630-l71VdJ0m?link=".$objsearch["doc_no"];
		$txtresult = "จำนวน ".$numrows." รายการ";
		$btn_txt = "รายละเอียดเพิ่มเติม";
	}
	else if ($numrows < 1)
	{
		$url = "https://nutt-i.com/psqv2";
		$txtresult = "ไม่พบข้อมูล";
		$btn_txt = "ติดต่อผู้ดูแล";
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