<?php


	defined('SEC_ROOT_PATH') or define('SEC_ROOT_PATH',dirname(dirname(__FILE__)));
	defined('DOMAIN_NAME') or define('DOMAIN_NAME',$_SERVER['SERVER_NAME']);

	include 'function.php';
	include 'app/common.php';
	include 'Model/Model.php';
	include 'Model/OrderModel.php';
	include 'Model/GoodsModel.php';
	include 'Redis/QRedis.php';
