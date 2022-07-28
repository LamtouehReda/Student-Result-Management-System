<?php
require 'connection.php';

$id=$_GET['id'];
$stmt=$con->prepare("DELETE FROM reclamations WHERE id=:id");
$stmt->bindParam(':id',$id);
$stmt->execute();
header('location:reclamation.php');


?>