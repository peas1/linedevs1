<?php
function flex_msg()
{
	$json = '{
				"type": "bubble",
				"body": {
							"type": "box",
							"layout": "vertical",
							"contents": [{
											"type": "text",
											"text": "รายงานสถานะงานก่อสร้าง",
											"weight": "bold",
											"size": "xl"
										}]
						},
						"footer": {
									"type": "box",
									"layout": "vertical",
									"spacing": "sm",
									"contents": [{
													"type": "button",
													"style": "link",
													"height": "sm",
													"action": {
																"type": "uri",
																"label": "รายละเอียดเพิ่มเติม",
																"uri": "https://linecorp.com"
															}
												},
												{
													"type": "spacer",
													"size": "sm"
												}
												],
									"flex": 0
									}
			}';	
	$json1 = '{
				"type":"flex",
				"altText":"ทดสอบ Flex Message",
				"contents":{
								"type": "bubble",
								"body": {
											"type": "box",
											"layout": "vertical",
											"contents": [{
															"type": "text",
															"text": "รายงานสถานะงานก่อสร้าง",
															"weight": "bold",
															"size": "xl"
														}]
										},
								"footer": {
											"type": "box",
											"layout": "vertical",
											"spacing": "sm",
											"contents": [{
													"type": "button",
													"style": "link",
													"height": "sm",
													"action": {
																"type": "uri",
																"label": "รายละเอียดเพิ่มเติม",
																"uri": "https://linecorp.com"
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