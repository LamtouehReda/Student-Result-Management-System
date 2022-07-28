<?php

$username='root';
$password='';
$dsn='mysql:host=localhost;dbname=etudiants';

try{
	$con=new PDO($dsn,$username,$password);
}catch(PDOException $e){
	echo $e->getMessage();
}

?>