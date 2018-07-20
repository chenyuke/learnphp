<?php
	header("content-type:text/html;charset=utf-8");
	//mysql:host:localhost;port=3306;dbname=php;
	$dbms='mysql';
	$host='localhost';
	$port='3306';
	$dbname='php';
	$user='root';
	$pwd='';
	$dsn="$dbms:host=$host;port=$port;dbname=$dbname";
	
	try{
		$pdo=new PDO($dsn,$user,$pwd);
		$pdo->exec("SET NAMES 'utf8';"); 
		
		/*$sql='select * from book';
		$result=$pdo->query($sql);
		$row=$result->fetchAll(PDO::FETCH_ASSOC);
		echo "<pre>";
		print_r($row);
		echo "</pre>";*/
		
		$stmt=$pdo->prepare("insert into book(name,author)values(?,?)");
		//$name='java基础教程111111';
		//$author='smile4444444';
		$data=array(
			array('php预处理批量添加教程11','smile1'),
			array('php预处理批量添加教程21','smile1'),
			array('php预处理批量添加教程31','smile1'),
		);
		$stmt->bindParam(1,$name);
		$stmt->bindParam(2,$author);
		//$stmt->execute();
		foreach ($data as $row){
			$name=$row[0];
			$author=$row[1];
			$stmt->execute();
		}
	}catch(PDOException $exception){
		echo $exception->getMessage().'<br>';
	}
	
	
	
	
	
?>