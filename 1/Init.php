<?php
    header("Content-Type:text/html;charset=utf-8");
	require 'MysqlPdo.class.php';
	$dbConfig=array(
		'user'=>'root',
		'pwd'=>'',
		'dbname'=>'php'
		);
		$db=MysqlPdo::getInstance($dbConfig);
		$error=array();
?>