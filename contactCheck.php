<?php
require 'connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['submit'])){
		$email=trim(stripslashes(htmlspecialchars($_POST['email'])));
		$msg=trim(stripslashes(htmlspecialchars($_POST['mssg'])));
		if(empty($email) or empty($msg)){
			echo "fill out all fields";
		}
		$date=date("Y-m-d");
        $stmt=$con->prepare("INSERT INTO reclamations (email, message, date) VALUES (:email,:message,:date)");
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':message',$msg);
        $stmt->bindParam(':date',$date);
        $stmt->execute();
        header('location:index.php');
                }

}else{
	header('location:index.php');
}

?>