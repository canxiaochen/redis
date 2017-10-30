<?php
/**
 * redis队列简单实现秒杀
 */

header("content-type:text/html;charset=utf-8");

//秒杀 消息队列
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
//从goodnum队列中取出一件商品
$goodid = $redis->rPop('goodnum');
if($goodid){
	echo '剩余',$redis->lSize('goodnum');
	$db= mysql_connect('127.0.0.1:3306','root','root');
	mysql_select_db('php60');
	mysql_query('set names utf8');

	//mysql表加锁
	//mysql_query('lock table kucun write');
	//文件锁
	$fh = fopen('./lock.txt','w');
	flock($fh,LOCK_EX);
	$res = mysql_query('select num from kucun where id=2');
	$row = mysql_fetch_assoc($res);
	$num = $row['num'];
	$num = $num - 1;
	mysql_query("update kucun set num=$num where id=2");
  //解锁
	flock($fh,LOCK_UN);
	//mysql_query('unlock table kucun');
	
}else{
	echo 'goods are sold out!';
};
