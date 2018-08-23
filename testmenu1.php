<?php;





$appId="wx9c52ab6039cbf7ca";
$secret="012bace7aaab7463829f854749f93543";
$ACC_TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appId."&secret=".$appSecret;
$json_data=file_get_contents($ACC_TOKEN_URL);
$result1=json_decode($json_data);
$access_token=$result1->access_token;

/*require_once "ch/lib/weixin.class.php";
$access_token=weixin::getToken();
echo $access_token;
*/


$touser="omVCy0rHL7Y-3j3gbBul2tjK1Oys";
$template_id="3-OLIqWl-d6FxXdvG7sgGB6n9_JGt9pMNahrv52KkGY";

$template=array('touser'=>"omVCy0rHL7Y-3j3gbBul2tjK1Oys",
                'template_id'=>"3-OLIqWl-d6FxXdvG7sgGB6n9_JGt9pMNahrv52KkGY",
				'url'=>"http://leehz.applinzi.com",
				'topcolor'=>"#7B68EE",
				'data'=>array('name'=>array('value'=>urlencode("你好， ，欢迎使用模板消息"),
				                             'color'=>"#743A3A",),
							  'time'=>array('value'=>urlencode("微信公众平台开发实践"),
							                   'color'=>"#FF0000",),
							  
							)
				);

$url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$access_token;
$result=https_request($url,urldecode(json_encode($template)));
var_dump($result);

function https_request($url,$data=null)
{
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

/*
'remark'=>array('value'=>urlencode("\n您的订单已提交，我们将尽快发货。祝您生活愉快"),
							                  'color'=>"#008000",),
*/
?>

							  