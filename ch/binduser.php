/*
* binduser.php页面
*/
<!doctype html>
<html>
<head>
<meta http-equive="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=screen-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>用户注册</title>
<style>

</style>

</head>
<body>
<div calss="content">
<form action='AddUser.php' method='post' id='myform'>
<p>
<lable>欢迎来到酒店</label>
</p>
<br/>
<p><label>姓名:</label>
<input type="text" id='name' name='name' /></p>
<p><label>电话:</label>
<input type="text" id='telephone' name='telephone' /></p>
<p><label>学号:</label>
<input type="text" id='stuendtNo' name='stuendtNo' /></p>
<p>
<a class='btn_buy' onClink="$('#myform').submit();">注册</a>
</p>
<input type='hidden' name='openid' id='openid' value="<?php echo $_GET['openid'];?>">

</form>
</div>
</body>
</html>
