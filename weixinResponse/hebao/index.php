<?php
/*
    东莞市悦车广告有限公司 http://www.cnblogs.com/txw1958/
    CopyRight 2013 www.doucube.com  All Rights Reserved
*/

define("TOKEN", "hebao");
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
					    <ArticleCount>9</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击进东莞合宝宝马微店]]></Title> 
								<Description><![CDATA[东莞合宝宝马，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/5296c2d0a8b9f.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[优惠活动]]></Title>
								<Description><![CDATA[优惠活动]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-bonus.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/activityList.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[团购报名]]></Title>
								<Description><![CDATA[团购报名]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-groupBuy.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/groupbuy.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[预约试驾]]></Title>
								<Description><![CDATA[预约试驾]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/car-Drive.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carDrive.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[售后预约]]></Title>
								<Description><![CDATA[售后预约]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-service.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/service.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[一键导航]]></Title>
								<Description><![CDATA[一键导航]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-navMap.png]]></PicUrl>
								<Url><![CDATA[http://dwz.cn/bOeNi]]></Url>
							</item>
							<item>
								<Title><![CDATA[车友留言]]></Title>
								<Description><![CDATA[车友留言]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/add-message.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/message.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[关于东莞合宝宝马]]></Title>
								<Description><![CDATA[关于东莞合宝宝马]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/company-info.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[东莞合宝宝马，臻至尊贵享受]]></Title>
								<Description><![CDATA[关于合宝宝马]]></Description>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=4#mp.weixin.qq.com]]></Url>
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
					    <ArticleCount>9</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击进东莞合宝宝马微店]]></Title> 
								<Description><![CDATA[东莞合宝宝马，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/5296c2d0a8b9f.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[优惠活动]]></Title>
								<Description><![CDATA[优惠活动]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-bonus.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/activityList.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[团购报名]]></Title>
								<Description><![CDATA[团购报名]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-groupBuy.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/groupbuy.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[预约试驾]]></Title>
								<Description><![CDATA[预约试驾]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/car-Drive.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carDrive.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[售后预约]]></Title>
								<Description><![CDATA[售后预约]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-service.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/service.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[一键导航]]></Title>
								<Description><![CDATA[一键导航]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-navMap.png]]></PicUrl>
								<Url><![CDATA[http://dwz.cn/bOeNi]]></Url>
							</item>
							<item>
								<Title><![CDATA[车友留言]]></Title>
								<Description><![CDATA[车友留言]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/add-message.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/message.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[关于东莞合宝宝马]]></Title>
								<Description><![CDATA[关于东莞合宝宝马]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/company-info.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[东莞合宝宝马，臻至尊贵享受]]></Title>
								<Description><![CDATA[关于合宝宝马]]></Description>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=4#mp.weixin.qq.com]]></Url>
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
					    <ArticleCount>9</ArticleCount>
						<Articles>
							<item>
								<Title><![CDATA[点击进东莞合宝宝马微店]]></Title> 
								<Description><![CDATA[东莞合宝宝马，为您提供最尊贵服务]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/back/image/company/5296c2d0a8b9f.jpg]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/homepage.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[优惠活动]]></Title>
								<Description><![CDATA[优惠活动]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-bonus.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/activityList.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[团购报名]]></Title>
								<Description><![CDATA[团购报名]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-groupBuy.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/groupbuy.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[预约试驾]]></Title>
								<Description><![CDATA[预约试驾]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/car-Drive.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/carDrive.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[售后预约]]></Title>
								<Description><![CDATA[售后预约]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-service.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/service.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[一键导航]]></Title>
								<Description><![CDATA[一键导航]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/homepage-navMap.png]]></PicUrl>
								<Url><![CDATA[http://dwz.cn/bOeNi]]></Url>
							</item>
							<item>
								<Title><![CDATA[车友留言]]></Title>
								<Description><![CDATA[车友留言]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/add-message.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/message.php?comId=4]]></Url>
							</item>
							<item>
								<Title><![CDATA[关于东莞合宝宝马]]></Title>
								<Description><![CDATA[关于东莞合宝宝马]]></Description>
								<PicUrl><![CDATA[http://www.88auto.com.cn/weixin/user/res/img/company-info.png]]></PicUrl>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=4#mp.weixin.qq.com]]></Url>
							</item>
							<item>
								<Title><![CDATA[东莞合宝宝马，臻至尊贵享受]]></Title>
								<Description><![CDATA[关于合宝宝马]]></Description>
								<Url><![CDATA[http://www.88auto.com.cn/weixin/user/web/user/companyInfo.php?comId=4#mp.weixin.qq.com]]></Url>
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
