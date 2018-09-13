<?php
/********
This cann't work

require 'weixin.class.php';

$ret=wxcommon::getToken();
$ACCESS_TOKEN=$ret['access_token'];
$menuPostData='{
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
							   "type":"click",
							   "name":"我的收藏",
							   "key":"V1001_favorite"
							},
							{
							   "type":"click",
							   "name":"我的消息",
							   "key":"V1001_GOOD"
							}]
					   }]
				 }';
         
// create new menu
$wxmenu=new wxmenu($ACCESS_TOKEN);	 
$create=$wxmenu->createMenu($menuPostData);

//get current menu
$get=$wxmenu->getMenu();
var_dump($get);

//delete current menu
$del=$wxmenu->deleteMenu();
var_dump($del);************/
?>