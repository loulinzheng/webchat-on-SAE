<?php
//if ( ! defined('IN_APP')) exit('No direct script access allowed');
require_once "lib/weixin.class.php";

//$menu = '{"button":[{"type":"click","name":"今日歌曲","key":"V1001_TODAY_MUSIC"},{"type":"click","name":"歌手简介","key":"V1001_TODAY_SINGER"},{"name":"菜单","sub_button":[{"type":"view","name":"搜索","url":"http://www.soso.com/"},{"type":"view","name":"视频","url":"http://v.qq.com/"},{"type":"click","name":"赞一下我们","key":"V1001_GOOD"}]}]}';
$menu='{
  				 "button":[
					 {	
						  "type":"click",
						  "name":"简单介绍",
						  "key":"V1001_TODAY_MUSIC"
					  },
					  {
						   "type":"click",
						   "name":"搜索",
						   "key":"V1001_TODAY_SINGER"
					  },
					  {
						   "name":"我的",
						   "sub_button":[
							{
							   "type":"click",
							   "name":"个人资料",
							   "key":"V1001_HELLO_WORLD"
							},
							{
							   "type":"view",
							   "name":"我的收藏",
							   "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx9c52ab6039cbf7ca&redirect_uri=https://leehz.applinzi.com/oauth2.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect"
							},
							{
							   "type":"click",
							   "name":"我的消息",
							   "key":"V1001_GOOD"
							}]
					   }]
				 }';




$ret = weixin::createMenu($menu);
var_dump($ret);

$ret = weixin::getMenu();
var_dump($ret);
//var_dump($ticket);
if(isset($_GET['david'])){
    $ret = weixin::deleteMenu();
     var_dump($ret);
    $ret = weixin::getMenu();
    var_dump($ret);
}
?>
