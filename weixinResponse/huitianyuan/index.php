<?php
/*
    东莞市悦车广告有限公司 http://www.cnblogs.com/txw1958/
    CopyRight 2013 www.doucube.com  All Rights Reserved
*/

define("TOKEN", "huitianyuan");
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
					    <ArticleCount>7</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击进入东莞汇天源起亚微店]]></Title> 
								<Description><![CDATA[东莞汇天源起亚，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/52a1984519a2f.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=10]]></Url>
							</item>
							<item>
								<Title><![CDATA[优惠活动]]></Title>
								<Description><![CDATA[优惠活动]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-bonus.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/activityList.php?comId=10]]></Url>
							</item>
							<!--<item>
								<Title><![CDATA[在售车型]]></Title>
								<Description><![CDATA[在售车型]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-carOnSell.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carOnSellList.php?comId=10]]></Url>
							</item>-->
							<item>
								<Title><![CDATA[预约试驾]]></Title>
								<Description><![CDATA[预约试驾]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/car-Drive.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carDrive.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[售后预约]]></Title>
								<Description><![CDATA[售后预约]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-service.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/service.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[一键导航]]></Title>
								<Description><![CDATA[一键导航]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-navMap.png]]></PicUrl>
								<Url><![CDATA[http://dwz.cn/bX0I4]]></Url>
							</item>
							<item>
								<Title><![CDATA[关于东莞汇天源起亚]]></Title>
								<Description><![CDATA[关于东莞汇天源起亚]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/company-info.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							
							<item>
								<Title><![CDATA[东莞汇天源起亚，臻至尊贵享受]]></Title>
								<Description><![CDATA[关于东莞汇天源起亚]]></Description>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							
							</Articles>
                        </xml>";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
	    	}


            if($keyword == "测试" || $keyword == "321321")
            {
                 $textTpl =  "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
					    <ArticleCount>7</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击进入东莞汇天源起亚微店]]></Title> 
								<Description><![CDATA[东莞汇天源起亚，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/52a1984519a2f.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=10]]></Url>
							</item>
							<item>
								<Title><![CDATA[优惠活动]]></Title>
								<Description><![CDATA[优惠活动]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-bonus.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/activityList.php?comId=10]]></Url>
							</item>
							<!--<item>
								<Title><![CDATA[在售车型]]></Title>
								<Description><![CDATA[在售车型]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-carOnSell.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carOnSellList.php?comId=10]]></Url>
							</item>-->
							<item>
								<Title><![CDATA[预约试驾]]></Title>
								<Description><![CDATA[预约试驾]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/car-Drive.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carDrive.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[售后预约]]></Title>
								<Description><![CDATA[售后预约]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-service.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/service.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[一键导航]]></Title>
								<Description><![CDATA[一键导航]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-navMap.png]]></PicUrl>
								<Url><![CDATA[http://dwz.cn/bX0I4]]></Url>
							</item>
							<item>
								<Title><![CDATA[关于东莞汇天源起亚]]></Title>
								<Description><![CDATA[关于东莞汇天源起亚]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/company-info.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[东莞汇天源起亚，臻至尊贵享受]]></Title>
								<Description><![CDATA[关于东莞汇天源起亚]]></Description>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							</Articles>
                        </xml>";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
        
			else{
			$textTpl =  "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
					    <ArticleCount>7</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击进入东莞汇天源起亚微店]]></Title> 
								<Description><![CDATA[东莞汇天源起亚，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/52a1984519a2f.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=10]]></Url>
							</item>
							<item>
								<Title><![CDATA[优惠活动]]></Title>
								<Description><![CDATA[优惠活动]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-bonus.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/activityList.php?comId=10]]></Url>
							</item>
							<!--<item>
								<Title><![CDATA[在售车型]]></Title>
								<Description><![CDATA[在售车型]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-carOnSell.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carOnSellList.php?comId=10]]></Url>
							</item>-->
							<item>
								<Title><![CDATA[预约试驾]]></Title>
								<Description><![CDATA[预约试驾]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/car-Drive.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carDrive.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[售后预约]]></Title>
								<Description><![CDATA[售后预约]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-service.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/service.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[一键导航]]></Title>
								<Description><![CDATA[一键导航]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-navMap.png]]></PicUrl>
								<Url><![CDATA[http://dwz.cn/bX0I4]]></Url>
							</item>
							<item>
								<Title><![CDATA[关于东莞汇天源起亚]]></Title>
								<Description><![CDATA[关于东莞汇天源起亚]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/company-info.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=10#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[东莞汇天源起亚，臻至尊贵享受]]></Title>
								<Description><![CDATA[关于东莞汇天源起亚]]></Description>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=10#mp.weixin.qq.com]]></Url>
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
