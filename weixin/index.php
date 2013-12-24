<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "wangsir");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        // valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		// 初始化菜单
		$this->createMenu();
        //get post data, May be due to the different environments
        $postStr = isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS["HTTP_RAW_POST_DATA"] : '';

        //extract post data
        if(!empty($postStr)){
                
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $RX_TYPE = trim($postObj->MsgType);
				echo $this->responseText($postObj, $RX_TYPE);	
				exit;
				$event = $postObj->Event;
				$eventKey = $postObj->EventKey;
				
				$latitude  = $postObj->Location_X;
				$longitude = $postObj->Location_Y;
				
				if($event == 'CLICK') {
					switch ($eventKey) {
						case "V1001_TODAY_MUSIC":
							$contentStr = '今日歌星';
							break;
						case "V1001_TODAY_SINGER":
							$contentStr = '歌手简介';
							break;
						case "V1001_GOOD":
							$contentStr = '谢谢您的赞';
							break;
						default:
							$contentStr = "谢谢您";
							break;
					}
					$resultStr = $this->responseText($postObj, $contentStr);	
				} else {
					switch($RX_TYPE)
					{
						case "text":
							$resultStr = $this->handleText($postObj);
							break;
						case "event":
							$resultStr = $this->handleEvent($postObj);
							break;
						default:
							$resultStr = "Unknow msg type: ".$RX_TYPE;
							break;
					}
				}
                echo $resultStr;
        }else {
			echo "test";
            exit;
        }
    }
	
	public function createMenu() {
		$appId = "wxf3b7c858665ac642";
		$appSecret = "71d48945a915b4a527e712a117ad9603";
		$accessTokenUrl = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appId}&secret={$appSecret}";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$accessTokenUrl);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);


		$strjson=json_decode($result);
		$token = $strjson->access_token;
				
		$post='{
				"button":[
				{	
					"type":"click",
					"name":"今日歌曲",
					"key":"V1001_TODAY_MUSIC"
				},
				{
					"type":"click",
					"name":"歌手简介",
					"key":"V1001_TODAY_SINGER"
				},
				{
					"name":"菜单",
					"sub_button":[
					{	
						"type":"view",
						"name":"搜索",
						"url":"http://www.soso.com/"
					},
					{
						"type":"view",
						"name":"视频",
						"url":"http://v.qq.com/"
					},
					{
						"type":"click",
						"name":"赞一下我们",
						"key":"V1001_GOOD"
					}]
				}]
			}';  //提交内容
		$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$token}"; //查询地址 
		$ch = curl_init();//新建curl
		curl_setopt($ch, CURLOPT_URL, $url);//url  
		curl_setopt($ch, CURLOPT_POST, 1);  //post
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post内容  
		curl_exec($ch); //输出   
		curl_close($ch);
	}

    public function handleText($postObj)
    {
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
        if(!empty( $keyword ))
        {
            $msgType = "text";
			$contentStr = '';
			if(substr($keyword, -6) == "天气"){
				$contentStr = $this->weather(substr($keyword, 0, -6));
			}
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        }else{
            echo "Input something...";
        }
    }

	// 天气返回接口
	public function weather($city){
		$json = file_get_contents("http://api2.sinaapp.com/search/weather/?appkey=0020130430&appsecert=fa6095e113cd28fd&reqtype=text&keyword={$city}");
		$weather = json_decode($json);
		if(!$weather->text) {
			$contentStr = "非常抱歉，没有找到[{$city}] 的天气情况";
		}else {
			$contentStr = "{$weather->text->content}";
		}
		return $contentStr;
	}

	// 关注回复
    public function handleEvent($object)
    {
        $contentStr = "";
        switch ($object->Event)
        {
            case "subscribe":
                $contentStr = "感谢您关注【<a href='http://www.fulanke.cc'>圳市福兰克科技有限公司</a>】"."\n"."我们的微信号chinafulanke"."\n"."我司主要生产和研发玻璃镜片油墨,我们将为您提供优质的服务.";
                break;
            default :
                $contentStr = "Unknow Event: ".$object->Event;
                break;
        }
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }
	

    
	// 返回信息
    public function responseText($object, $content, $flag=0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
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
}

?>