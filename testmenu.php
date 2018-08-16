<?php
$jsonmenu='{
	"button":[
		{"name":"关于我们",
		 "sub_button":[
			{"type":"click",
			 "name":"公司简介",
			 "key":"公司简介"
			},
			{"type":"click",
			 "name":"联系我们",
			 "key":"联系我们"
			}]
		},
		{"name":"产品服务",
		 "sub_button":[
			{"type":"click",
			 "name":"微信平台",
			 "key":"微信平台"
			},
			{"type":"click",
			 "name":"手机网站",
			 "key":"手机网站"
			}]
		},
		{"name":"技术支持",
		 "sub_button":[
			{"type":"click",
			 "name":"文档下载",
			 "key":"文档下载"
			},
			{"type":"click",
			 "name":"技术社区",
			 "key":"技术社区"
			}]
		}
	]	
}';

require_once "jssdk.php";
$jssdk = new JSSDK("wx9c52ab6039cbf7ca", "012bace7aaab7463829f854749f93543");
$access_token = $jssdk->getAccessToken();
//echo $access_token;
/* 获取用户列表  及上传更新菜单
//$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$url="https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$access_token."&next_openid=".$next_id;
//$result=https_request($url,$jsonmenu);
$result=https_request($url);
//$result=getUserList();
var_dump($result);
*/
$touser = "omVCy0rHL7Y-3j3gbBul2tjK1Oys";
 $template_id = "tnoNa1Kgxefs3C9qPVtoEEpjt8DX05u6nPpM0rYNfbM";
 $data = '{
           "touser":'.$touser.',
           "template_id":'.$template_id.',
           "url":'http://devweixin.sinaapp.com',
           "topcolor":'#FF0000',
           "data":{
                   "name": {
                       "value":'闫小坤',
                       "color":'#173177'
                   },
                   "time":{
                       "value":'2015年5月4日',
                       "color":'#173177'
                   }                   
           }
       }';

 $url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
 $retjson = curl_post($url, $data);
 $ret = json_decode($retjson,true);
 if($ret['errcode'] == 0){
     echo "Push Template Message OK";
 }else{
     echo "Push Template Message Fail\n";
     var_dump($retjson);
 }
function curl_post($url, $post_string){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function https_request($url,$data=null){
	$curl=curl_init();
	curl_setopt($curl,CURLOPT_URL,$url);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
	if (!empty($data)){
		curl_setopt($curl,CURLOPT_POST,1);
		curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
		}
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
	$output=curl_exec($curl);
	curl_close($curl);
	return $output;
}

 /*function getUserList($next_id=''){
	$access_token=$jssdk->getAccessToken;
	$extend='';
	if (!empty($next_id)) {
		$extend="&next_openid=$next_id";
	}
	$url="https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$access_token."&next_openid=".$next_id;
	$content=curl_get($url);
	$ret=json_decode($content,true);
	return self::getResult($ret)
	 ? array(
	   'total'=>$ret['total'],
	   'count'=>$ret['count'],
	   'list'=>$ret['data']['openid'],
	   'next_id'=>isset($ret['next_openid'])?ret['next_openid']:null
       )
	   :null;
}
*/
	   
	   
?>