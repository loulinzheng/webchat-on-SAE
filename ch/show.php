<!DOCTYPE html>
<html>
<head>
<title>兔子讲笑话</title>
<meta name="viewport" content="initial-scale=1, user-scalable=no"/>
<meta charset="utf-8"/>    
<link rel="stylesheet" href="http://res.wx.qq.com/mpres/htmledition/mobile//style/client-page.min.css" />  
</head>   
<body id="activity-detail"> 

<div class="page-bizinfo">
	<div class="header">
		<h4 id="activity-name">兔子讲笑话</h4>
		<span id="post-date"><?php echo date("Y-m-d")?></span>
	</div>
</div>    

<div class="page-content">
  <div class="media">        
          <img src="http://huoyaxiaotu-huoyaxiaotu.stor.sinaapp.com/image/%E5%B0%81%E9%9D%A2.jpg" onerror="this.parentNode.removeChild(this)" width="300px"/>
  </div>            
  
  <div class="text">
  <?php
  	include("daviddb/ArticleDB.php");
	$db=new ArticleDB();
        $data=$db->getJokes();
        foreach($data as $item){
        	echo '<p>';
        	echo $item['content'];
          	echo '</p>';
        }
  
  ?>
  </div>
  
</div>    
</body>
</html>