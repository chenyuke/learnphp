<?php
header('content-type:text/html;charset=utf-8');
$username=$_POST['name'];
$pwd=$_POST['pwd'];
try{
	$pdo=new PDO('mysql:host=localhost;dbname=php','root','');
	$pdo->exec("SET NAMES 'utf8';"); 
	$sql="select * from user where name='{$username}' and pwd='{$pwd}'";
	$stmt=$pdo->query($sql);
	echo $stmt->rowCount();
}catch(Exception $e){
	echo $e->getMessage();
}
?>