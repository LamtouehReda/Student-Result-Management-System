<?php
require 'connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['submit'])){
		$module_id=$_GET['id_module'];
		$stmt=$con->prepare('SELECT cne from infoetudiant');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res=$stmt->fetchAll();
            foreach ($res as $row) {
                $note=$_POST[$row['cne']];
                $stmt2=$con->prepare('SELECT * from notes WHERE cneEtudiant LIKE :cne AND id_module=:id_module');
                $stmt2->bindParam(':cne',$row['cne']);
                $stmt2->bindParam(':id_module',$_GET['id_module']);
                $stmt2->execute();
                $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                if($stmt2->rowCount()>0){
                	if(!empty($note)){
                	$stmt=$con->prepare('UPDATE notes SET note=:note WHERE cneEtudiant LIKE :cne AND id_module=:id_module');
	                $stmt->bindParam(':cne',$row['cne']);
	                $stmt->bindParam(':id_module',$module_id);
	                $stmt->bindParam(':note',$note);
	                $stmt->execute();
	            }
                }
                else{
                    if(!empty($note)){
	                $stmt=$con->prepare('INSERT INTO notes (cneEtudiant,id_module,note) VALUES (:cne,:id_module,:note)');
	                $stmt->bindParam(':cne',$row['cne']);
	                $stmt->bindParam(':id_module',$module_id);
	                $stmt->bindParam(':note',$note);
	                $stmt->execute();
                }
                }
            }
}
header('location:insertNotes.php?prof='.$_GET['prof'].'&nb_module='.$_GET['nb_module']);
}else{
	header('location:index1.html');
}

?>