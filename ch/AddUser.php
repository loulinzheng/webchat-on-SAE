/*
adduser.php
*/
<?php
$mysql=new SaeMysql();
$OpenId=$mysql->escape($_POST['openid']);
$Telephone=$mysql->escape($_POST['telephone']);
$Name=$mysql->escape($_POST['name']);
$Identify=$mysql->escape($_POST['Identify']);//intval,escape有sql注入处理过滤功能,其中后者用户非int变量

$sql="update 'bh_User' set Telephone='$Telephone',Name='$Name',Identify='$Identify' where OpenId='$OpenId'";
$mysql->runSql($sql);

if ($mysql->errno()!=0)
{die("Error:".mysql-errmsg());}
$mysql-closeDb();

$url='http://     hoteldetail.php?hotelid='.$_POST['hotelid'].'&openid='.$OpenId;
header('Location:'.$url);
?>
