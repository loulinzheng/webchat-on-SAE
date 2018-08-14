<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx9c52ab6039cbf7ca", "012bace7aaab7463829f854749f93543");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <h1 style="font-size:40px">:)</h1>
  <b  style="font-size:20px">分享接口的作用!</b>
  
  <h1 style="font-size:8em">:)</h1>
  <b  style="font-size:2em">实例:从手机相册中选择照片然后分享</b><br/><br/>
  <p id="imageContainer" style="text-align:center;width:100%"></p>
  <p id="selectImg" style="color:#5eb95e;text-aligh:center">没有自定义的分享图片</p>
  <input type="button" value="请选择分享图片" id="chooseImage"><br/><br/>
  
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意�?   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”�?   * 2. 如果发现�?Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级�?6.0.2.58 版本及以上�?   * 3. 常见问题及完�?JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附�?-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈�?   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问�?   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈�?   */
  wx.config({
    debug: true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用�?API 都要加到这个列表�?    
	  "onMenuShareTimeline",
	  "onMenuShareAppMessage",
	  "onMenuShareQQ",
	  "onMenuShareWeibo",
	  "onMenuShareQzone"
	  "chooseImage",
	  "previewImage",
	  "uploadImage",
	  
	  
	  
	  ]
	  
	  
  });
  wx.ready(function () {
    // 在这里调�?API
	var title="HTML5 外包,HTMl 5 外包,html5是我们的生活,值得信赖的html5解决方案提供商",
	link="http://www.html5waibao.com",
	imgUrl="http://www.html5waibao.comimages/logo_35.png",
    desc="html5是我们的生活",
	success=function(){
		alert("分享成功回调");
	},
	cancel=function() {
		alert("分享失败回调");
	},
	
	wx.onMenuShareTimeline
	({
		title:title,
		link:link,
		imgUrl:imgUrl,
		success:function(){success();},
		cancel:function(){cancel();},
	});
	
		wx.onMenuShareQzone
	({
		title:title,
		link:link,
		imgUrl:imgUrl,
		success:function(){success();},
		cancel:function(){cancel();},
	});
		wx.onMenuShareAppMessage
	({
		title:title,
		link:link,
		imgUrl:imgUrl,
		success:function(){success();},
		cancel:function(){cancel();},
	});
		wx.onMenuShareQQ
	({
		title:title,
		link:link,
		imgUrl:imgUrl,
		success:function(){success();},
		cancel:function(){cancel();},
	});
		wx.onMenuShareWeibo
    ({
		title:title,
		link:link,
		imgUrl:imgUrl,
		success:function(){success();},
		cancel:function(){cancel();},
	});
	
	
	
	
	var chooseImageID,
	shareImage,
	uploadImage=function(back){
		wx.uploadImage({
			loaclid:chooseImageID.toString(),
			success:function(res){
				shareImage="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=eQv3HPwEFxwsw8cyh5O7DjaNOoGd4d-jYtG_c9uW-YbwUYxkMywh_O3LCCZtmX8ZWr8np0Q5CqAox7lghNkNuiNHU8M618jbRvcaLjQuHq8&media_id="+res.serverid;
				back&&back();
			}
		});
	},
	shareTimeline=function(){
		uploadImage(function(){
		wx.onMenuShareTimeline({
               title:"	实例:从手机相册中选择照片然后分享"
               link:"http://webo.com/xinxinliang",
               imgUrl:shareImage,
                success:function(){},
                  cancel:function(){}	
		
		});
	});
	};
	$("#chooseImage").click(function(){
		wx.chooseImage({
			success:function(res){
				chooseImageID=res.loaclid[0];
				$("#imaageContainer").html("<img style='width:30%' src='"+chooseImageID+"'>");
				$("#selectImg").html("已选择图片,请点击右上角分享");
				shareTimeline();
			}
		});
	});
	
	
		}
	
  //});
</script>
</html>
