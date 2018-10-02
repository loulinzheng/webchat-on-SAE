<?php
$mysql=new SaeMysql();
$hotelid=intval($_GET["hotelid"];
$openid=$mysql->escape($_GET['openid'];
$sql="select Name from 'bh_user' where 'OpenId'='$openid'";
$Name=$mysql->getVar($sql);
if (is_null($Name))
{if ($mysql->errno()!=0)
	{ die("Error:".$mysql->errmsg());}
 $mysql->closeDb();
 header('Location:http://      BindUser.php?hotelid='.$hotelid.'&openid='.$openid);
 exit(0);
}

$sql="select * from bh_Room where HotelId="$hotelid";
$rooms=$mysql->getData($sql);
$sql="select * from bh_HotelInfo where Id="hotelid";
$hotel=$mysql->getLine($sql);

if ($mysql->errno()!=0)
{die("Error:".$mysql->errmsg());}
$mysql->closeDb();
?>

<! DOCTYPE HTML>
<html>
<head>
<meta http-equive="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=screen-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta name="format-detection" content="telephone=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />

</head>
<body>
<div class="d-left-module mt15"><div class="inner m-hotel-overview" id="jxDescTab">
<h2 class= "facility-title"><?php echo $hotel["Name"];?></h2><div class="hotel-introduce" id="descContent"><div class="base-info bordertop clrfix">
<dl class= "inform-list"><dt>地址:</dt><dd><cite><?php echo $hotel["Address"];?></cite></dd></dl>
<dl class= "inform-list"><dt>电话:</dt><dd><cite><a href="tel:<?php echo $hotel["Telephone"];?><?php echo $hotel["Telephone"];?></a></cite></dd></dl>
<br/>

<div id="Gallery">
<div class="gallery-row">
<div class="gallery-item"><a href="../images/full/1.jpg"><img src="../images/tumb/1.jpg" alt="Image 001" /></a></div>

</div>

<div class="gallery-row">
<div class="gallery-item"><a href="../images/full/4.jpg"><img src="../images/tumb/4.jpg" alt="Image 004" /></a></div>

</div>
</div>

<form action='AddOrder.php' method='post' id='myform'>
<p>入住日期 <input type="text" name="date" id="datapicker" value=''></p>
<p>入住天数 <input type="text" name="days" value='1'></p>
</br>
<div class="room_select_box">
<div class="htl_room_table">
<?php
$tab_str="<table>";
$tab_str.="<tr><th>fangxing</th><th>menshijia</th><th>huiuanjia</th></tr>";
foreach($rooms as $ room) {
	$tab_str.="<tr>";
	$tab_str.="<td>".$room["Type"]."</td>";
	$tab_str.="<td>".$room["Price"]."</td>";
	$tab_str.="<td>".$room["MemberPrice"]."</td>";
	$roomid=$room["Id"];
	$tab_str.="<td><a onClick=\"$('#roomid').val($roomid);$('#myform').submit();\">yuding</a>";
	$tab_str.="</tr>";
	
	
	
}
$tab_str.="</table>";
print $tab_str;



/*
photoswipe手机相册展示包  http;//photoswipe.com_addref
datepicker 日历插件  http://jqueryui.com/datepicker/
*/
?>
</div></div>
<input type='hidden' name='roomid' id='roomid'>
<input type='hidden' name='openid' id='openid' value="<?php echo $_GET['openid'];?>
</form> 
</div></div></div></div>
</body>
</html>
