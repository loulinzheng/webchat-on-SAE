<?php
$code=$_GET["code"];
$userinfo=getUserInfo($code);

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
 
 $userinfo_url="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
 $userinfo_json=https_request($userinfo_url);
 $userinfo_array=json_decode($userinfo_json,true);
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
 <input name="openid" id="openid" value="<?php echo $userinfo["openid"]; ?> type=text">
</div>
<div class="fieldcontain">
 <lable for="nickname">昵称</lable>
 <input name="nickname" id="nickname" value="<?php echo $userinfo["nickname"]; ?> type=text">
</div>
<div class="fieldcontain">
 <lable for="sex">性别</lable>
 <input name="sex" id="sex" value="<?php echo $userinfo["sex"]; ?> type=text">
</div>
<div class="fieldcontain">
 <lable for="country">国家</lable>
 <input name="country" id="country" value="<?php echo $userinfo["country"]; ?> type=text">
</div>
<div class="fieldcontain">
 <lable for="province">省份</lable>
 <input name="province" id="province" value="<?php echo $userinfo["province"]; ?> type=text">
</div>
<div class="fieldcontain">
 <lable for="city">城市</lable>
 <input name="city" id="city" value="<?php echo $userinfo["city"]; ?> type=text">
</div>
<div class="fieldcontain">
 <lable for="privilege">特权</lable>
 <input name="privilege" id="privilege" value="<?php echo $userinfo["privilege"]; ?> type=text">
</div>
