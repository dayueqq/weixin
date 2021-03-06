<?php
/*
    东莞市悦车广告有限公司 http://www.cnblogs.com/txw1958/
    CopyRight 2013 www.doucube.com  All Rights Reserved
*/

define("TOKEN", "yihua");
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                        </xml>";
	    
	    	$ev = $postObj->Event;
 	    	if($ev == "subscribe"){              
				 		$textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
					    <ArticleCount>2</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[奔驰元宵百家乐-新年新款车型抢购会]]></Title>
								<Description><![CDATA[奔驰元宵百家乐-新年新款车型抢购会]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/0.jpg]]></PicUrl>
								<Url><![CDATA[http://126.am/FiAw82]]></Url>
							</item>
							
							<item>
								<Title><![CDATA[点击进入仁孚溢华奔驰微店]]></Title> 
								<Description><![CDATA[东莞仁孚溢华奔驰，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/52987412e8183.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=5]]></Url>
							</item>
							
							</Articles>
                        </xml>";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
	    	}
            if($keyword == "二手车")
			{
				$textTpl ="<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
					    <ArticleCount>1</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击查看东莞仁孚二手车]]></Title> 
								<Description><![CDATA[点击查看东莞仁孚二手车]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/s400/pic.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/weixinershou.html]]></Url>
							</item>
						</Articles>
                        </xml>";
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
			}
            if($keyword == "测试" || $keyword == "321321")
            {
                 $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
					    <ArticleCount>10</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击进入仁孚溢华奔驰微店]]></Title> 
								<Description><![CDATA[东莞仁孚溢华奔驰，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/52987412e8183.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=5]]></Url>
							</item>
							<item>
								<Title><![CDATA[优惠活动]]></Title>
								<Description><![CDATA[优惠活动]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-bonus.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/activityList.php?comId=5]]></Url>
							</item>
							
							<item>
								<Title><![CDATA[团购报名]]></Title>
								<Description><![CDATA[团购报名]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-groupBuy.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/groupbuy.php?comId=5]]></Url>
							</item>
							
							<item>
								<Title><![CDATA[预约试驾]]></Title>
								<Description><![CDATA[预约试驾]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/car-Drive.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carDrive.php?comId=5#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[售后预约]]></Title>
								<Description><![CDATA[售后预约]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-service.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/service.php?comId=5#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[一键导航]]></Title>
								<Description><![CDATA[一键导航]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-navMap.png]]></PicUrl>
								<Url><![CDATA[http://dwz.cn/bPVvQ]]></Url>
							</item>
							<item>
								<Title><![CDATA[车友留言]]></Title>
								<Description><![CDATA[车友留言]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/add-message.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/message.php?comId=5]]></Url>
							</item>
							<item>
								<Title><![CDATA[认证二手车]]></Title> 
								<Description><![CDATA[认证二手车]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/secondHand-icon-200-200.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/weixinershou.html]]></Url>
							</item>
							<item>
								<Title><![CDATA[关于仁孚奔驰]]></Title>
								<Description><![CDATA[关于仁孚奔驰]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/company-info.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=5#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[东莞仁孚溢华奔驰，臻至尊贵享受]]></Title>
								<Description><![CDATA[关于仁孚溢华奔驰]]></Description>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=5#mp.weixin.qq.com]]></Url>
							</item>
							</Articles>
                        </xml>";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
        
			else{
			$textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
					    <ArticleCount>10</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击进入仁孚溢华奔驰微店]]></Title> 
								<Description><![CDATA[东莞仁孚溢华奔驰，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/52987412e8183.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=5]]></Url>
							</item>
							<item>
								<Title><![CDATA[优惠活动]]></Title>
								<Description><![CDATA[优惠活动]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-bonus.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/activityList.php?comId=5]]></Url>
							</item>
							
							<item>
								<Title><![CDATA[团购报名]]></Title>
								<Description><![CDATA[团购报名]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-groupBuy.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/groupbuy.php?comId=5]]></Url>
							</item>
						
							<item>
								<Title><![CDATA[预约试驾]]></Title>
								<Description><![CDATA[预约试驾]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/car-Drive.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carDrive.php?comId=5#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[售后预约]]></Title>
								<Description><![CDATA[售后预约]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-service.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/service.php?comId=5#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[一键导航]]></Title>
								<Description><![CDATA[一键导航]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-navMap.png]]></PicUrl>
								<Url><![CDATA[http://dwz.cn/bPVvQ]]></Url>
							</item>
							<item>
								<Title><![CDATA[车友留言]]></Title>
								<Description><![CDATA[车友留言]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/add-message.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/message.php?comId=5]]></Url>
							</item>
							<item>
								<Title><![CDATA[认证二手车]]></Title> 
								<Description><![CDATA[认证二手车]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/secondHand-icon-200-200.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/weixinershou.html]]></Url>
							</item>
							<item>
								<Title><![CDATA[关于仁孚奔驰]]></Title>
								<Description><![CDATA[关于仁孚奔驰]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/company-info.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=5#mp.weixin.qq.com]]></Url>
							</item>	
							<item>
								<Title><![CDATA[东莞仁孚溢华奔驰，臻至尊贵享受]]></Title>
								<Description><![CDATA[关于仁孚溢华奔驰]]></Description>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=5#mp.weixin.qq.com]]></Url>
							</item>
							</Articles>
                        </xml>";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
        }
    
	}
}
}
?>
