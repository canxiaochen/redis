<?php
	
	include './Common/bootstrop.php';
	$url = 'http://'.DOMAIN_NAME.'/index.php?app=app&c=seckill&a=addQsec&gid=2&type=mysql';
	$result = file_get_contents($url);
	
	var_dump($result);
