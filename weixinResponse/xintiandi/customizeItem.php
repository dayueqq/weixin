<?php
header("Content-type: text/html; charset=utf-8");define("ACCESS_TOKEN", '-ai7Z52dEIoep2u589otWXgMwSvGgMfdK15HQ_gk4h3cM-oFSUXtYnI-Ka8cvOK1cPMWUpIZTO5OnnXdqW-cdAOsYP1lVS1rt4IOCbqDx-pRZbvDTC1-LIU-bjc0HcZ7RnsOISGXc614EeK__PwNxg');//创建菜单
function createMenu($data){ 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".ACCESS_TOKEN); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)'); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
	curl_setopt($ch, CURLOPT_AUTOREFERER, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$tmpInfo = curl_exec($ch); 
	if (curl_errno($ch)) {  
		return curl_error($ch); 
	} 
	curl_close($ch); 
	return $tmpInfo;}$data = ' {     
	"button":[           
	{           
		"name":"报名",           
			"sub_button":[            
			{               
				"type":"view",               
				"name":"团购报名",               
				"url":"http://www.88auto.com.cn/weixin/user/web/user/38-groupbuy.html"            
			},            
			{               
				"type":"view",               
				"name":"预约试驾",               
				"url":"http://www.88auto.com.cn/weixin/user/web/user/38-carDrive.html"            
			},			
			{               
				"type":"view",               
				"name":"售后预约",               
				"url":"http://www.88auto.com.cn/weixin/user/web/user/38-service.html"            
			}			
	        ]       },	   
	{           
		"name":"互动",           
			"sub_button":[            
			{               
				"type":"view",               
				"name":"车友留言",               
				"url":"http://www.88auto.com.cn/weixin/user/web/user/38-message.html"            
			},            
			{               
				"type":"view",               
				"name":"活动列表",               
				"url":"http://www.88auto.com.cn/weixin/user/web/user/38-activityList.html"            
			},			
			{               
				"type":"view",               
				"name":"公司简介",               
				"url":"http://www.88auto.com.cn/weixin/user/web/user/38-companyInfo.html"            
			},			
			{               
				"type":"view",               
				"name":"一键导航",               
				"url":"http://dwz.cn/dhmj4"            
			}]       },	   
	{           
		"name":"图文回复",           
			"sub_button":[            
			{              
				 "type":"click",               
				 "name":"图文回复",               
				 "key":"jsxw"            
			}		
]       }	   	   	   	   	   
] }';
	echo createMenu($data);//创建菜单
?>