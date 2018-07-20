<?php
$servername = "localhost";
$username = "root";
$password = "";

$dbConfig=array(
        'db'=>'mysql',
        'host'=>'localhost',
        'port'=>'3306',
        'user'=>'root',
        'pwd'=>'',
        'charset'=>'utf8',
        'dbname'=>''
    );

try {
    $conn = new PDO("mysql:host=$servername;dbname=php", $username, $password);
	//$dsn="{$dbConfig['db']}:host={$dbConfig['host']};port={$dbConfig['port']};dbname={$dbConfig['dbname']}}";
	//$conn = new PDO($dsn,$dbConfig['user'],$dbConfig['pwd']);
     echo "连接成功";
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>