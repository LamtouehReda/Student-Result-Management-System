<?php
session_start();
require 'connection.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
	function moduleName($module_id){
		if($module_id==1) return "Traitement Numérique de l'Information Multimédia";
		if($module_id==2) return "Architecture et programmation réseaux";
		if($module_id==3) return "Théorie de l’Information";
		if($module_id==4) return "Technologie Web pour le Multimédia";
		if($module_id==5) return "Base de Données Multimédia";
		if($module_id==6) return "Conduite de projets Multimédias";
		if($module_id==7) return "Transmission de données multimédia";
		if($module_id==8) return "Programmation Multimédia Mobile";
		if($module_id==9) return "Multimédia sur IP et Qualité de services";
		if($module_id==9) return "Projet dE Fin D’etudes";
	}
	function deliberation($note){
		if($note>=10) return 'V';
		else
		if($note>=5 && $note<10) return 'R';
		else return 'NV';
	}
	if(isset($_POST['submit'])){
		$cne=trim(stripslashes(htmlspecialchars($_POST['cne'])));
		if(empty($cne)){
			header("location:gestionDeNotes.php?error=emptyinput");
			exit();
		}
		$stmt=$con->prepare('SELECT * FROM infoetudiant WHERE cne LIKE :cne ');
		$stmt->bindParam(':cne',$cne);
		$stmt->execute();

		if ($stmt->rowCount()>0){
			$query='SELECT DISTINCT notes.id_module ,notes.note FROM notes JOIN infoetudiant where notes.cneEtudiant like :cne';
			$stmt=$con->prepare($query);
			$stmt->bindParam(':cne',$cne);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$res=$stmt->fetchAll();
			$html='
					<div class="tbl-header">
						<table cellpadding="0" cellspacing="0" border="0" class="results">
						<thead>
							<tr>
							<th>Module</th>
							<th>Note</th>
							<th>Delebration</th>
							</tr>
						</thead>
						</table>
					</div>
					<div class="tbl-content">
						<table cellpadding="0" cellspacing="0" border="0" class="results">
							<tbody>
				';
			foreach($res as $key => $row){
				$html.='<tr><td>'.moduleName($row['id_module']).'</td><td class="NoteD">'.$row['note'].'</td><td class="NoteD">'.deliberation($row['note']).'</td></tr>';
			}
			$html.='
							</tbody>
    					</table>
  					</div>'
					;
			$_SESSION['html']=$html;
			$_SESSION['cne']=$cne;
			header('location:gestionDeNotes.php');
		}else{
			header("location:gestionDeNotes.php?error=wrongCNE");
		}
	}
}else{
	header('location:index1.html');
}

?>