<?php
header('Content-Type: text/html; charset=utf-8');

$code=$_GET["code"];
//echo $code."\n";
$userinfo=getUserInfo($code);
echo $userinfo['city'];
function getUserInfo($code)
{
 $appid="wx9c52ab6039cbf7ca";
 $appsecret="012bace7aaab7463829f854749f93543";
 $access_token="";
 
 $access_token_url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
 $access_token_json=https_request($access_token_url);
 $access_token_array=json_decode($access_token_json,true);
 $access_token=$access_token_array['access_token'];
 $openid=$access_token_array['openid'];
 echo $openid;
 echo $access_token;
 
 $test_url="https://api.weixin.qq.com/sns/auth?access_token=$access_token&openid=$openid";
 $test_json=https_request($userinfo_url);
 $test_array=json_decode($userinfo_json,true);
 echo $test_array['errcode'];
 
 $userinfo_url="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
 $userinfo_json=https_request($userinfo_url);
 $userinfo_array=json_decode($userinfo_json,true);
 echo $userinfo_array['nickname'];
 return $userinfo_array;
 
}
function https_request($url)
{
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE); 
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE); 
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1); 
$data=curl_exec($curl);
if (curl_errno($curl)) {return 'ERROR'.curl_error($curl);}
curl_close($curl);
return $data;
}

?>
<div class="fieldcontain">
 <lable for="openid">OpenID</lable>
 <input name="openid" id="openid" value="<?php echo $userinfo['openid']; ?>" type="text">
</div>
<div class="fieldcontain">
 <lable for="nickname">昵称</lable>
 <input name="nickname" id="nickname" value="<?php echo $userinfo['nickname']; ?>" type="text">
</div>
<div class="fieldcontain">
 <lable for="sex">性别</lable>
 <input name="sex" id="sex" value="<?php echo $userinfo['sex']; ?>" type="text">
</div>
<div class="fieldcontain">
 <lable for="country">国家</lable>
 <input name="country" id="country" value="<?php echo $userinfo["country"]; ?>" type="text">
</div>
<div class="fieldcontain">
 <lable for="province">省份</lable>
 <input name="province" id="province" value="<?php echo $userinfo["province"]; ?>" type="text">
</div>
<div class="fieldcontain">
 <lable for="city">城市</lable>
 <input name="city" id="city" value="<?php echo $userinfo["city"]; ?>" type="text">
</div>
<div class="fieldcontain">
 <lable for="privilege">特权</lable>
 <input name="privilege" id="privilege" value="<?php echo $userinfo["privilege"]; ?>" type="text">
</div>
