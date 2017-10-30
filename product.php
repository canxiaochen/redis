<?php
//秒杀 消息队列
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
// 添加100件商品到list  生产者
// for($i=1;$i<=100;$i++){
// 	$redis->lPush('goodnum',$i);
// }
//$arr = $redis->lRange('goodnum',0,-1);//list中全部元素数组
