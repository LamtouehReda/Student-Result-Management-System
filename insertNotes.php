<?php
    require "./H & F/header.php"; 
    require 'connection.php'; 
    if(!isset($_SESSION['username']) OR !isset($_GET['nb_module'])){
        header('location:index1.html');
    }else{
        $stmt=$con->prepare('SELECT DISTINCT modules.nom, modules.module_id from proffesors JOIN modules ON proffesors.proffesor_id=modules.professor_id WHERE username LIKE :username');
        $username=$_GET['prof'];
        $stmt->bindParam(':username',$username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res=$stmt->fetchAll();
        $modules_ids=[];
        $modules_noms=[];
        $i=0;
        foreach ($res as $row) {
            $modules_ids[$i]=$row['module_id'];
            $modules_noms[$i]=$row['nom'];
            $i++;
        }
    }
?>
        


    <main>
        <h1 id="noteaddh1">Gestion Des Notes</h1>
        <div class="nbox-cont">
            <?php 
                if($_GET['nb_module']>1){
                    for($j=0;$j<$_GET['nb_module'];$j++){
                        echo'
                        <div class="noteboxe">
                            <h3>Module : '.$modules_noms[$j].'</h3>
                            <form action="insertNotesTodb.php?id_module='.$modules_ids[$j].'&nb_module='.$_GET['nb_module'].'&prof='.$_SESSION['username'].'" method="POST">';
                                $stmt=$con->prepare('SELECT cne from infoetudiant');
                                $stmt->execute();
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $res=$stmt->fetchAll();
                                $html='
                                        <div class="tbl-header">
                                            <table cellpadding="0" cellspacing="0" border="0" class="addnote">
                                            <thead>
                                                <tr>
                                                <th>CNE</th>
                                                <th>Note</th>
                                                </tr>
                                            </thead>
                                            </table>
                                        </div>
                                        <div class="tbl-content">
                                            <table cellpadding="0" cellspacing="0" border="0" class="addnote">
                                                <tbody>';
                                $i=1;
                                foreach ($res as $row) {
                                    $stmt2=$con->prepare('SELECT note from notes WHERE cneEtudiant LIKE :cne AND id_module=:id_module');
                                    $stmt2->bindParam(':cne',$row['cne']);
                                    $stmt2->bindParam(':id_module',$modules_ids[$j]);
                                    $stmt2->execute();
                                    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                                    $res2=$stmt2->fetchAll();
                                    if($stmt2->rowCount()>0){
                                    $html.='<tr><td class="tdcne_addnote">'.$row['cne'].'</td><td><input name='.$row['cne'].' type="float" value='.$res2[0]['note'].'></td></tr>';}
                                    else{
                                        $html.='<tr><td class="tdcne_addnote">'.$row['cne'].'</td><td><input name='.$row['cne'].' type="float"></td></tr>';
                                    }
                                    $i++;
                                }
                                $html.='
                                                </tbody>
                                            </table>
                                        </div>';
                                echo $html;

                                echo'<button type="submit" name="submit">Enregistrer</button>
                            </form>
                        </div>';
                    }
                }else{
                    $id_module=$modules_ids[0];
                    $module_nom=$modules_noms[0];
                    echo'
                        <div class="noteboxe">
                            <h3>Module : '.$module_nom.'</h3>
                            <form action="insertNotesTodb.php?id_module='.$id_module.'&nb_module='.$_GET['nb_module'].'&prof='.$_SESSION['username'].'" method="POST">';
                                $stmt=$con->prepare('SELECT cne from infoetudiant');
                                $stmt->execute();
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $res=$stmt->fetchAll();
                                $html='<div class="tbl-header">
                                            <table cellpadding="0" cellspacing="0" border="0" class="addnote">
                                            <thead>
                                                <tr>
                                                <th>CNE</th>
                                                <th>Note</th>
                                                </tr>
                                            </thead>
                                            </table>
                                        </div>
                                        <div class="tbl-content">
                                            <table cellpadding="0" cellspacing="0" border="0" class="addnote">
                                                <tbody>';
                                $i=1;
                                foreach ($res as $row) {
                                    $stmt2=$con->prepare('SELECT note from notes WHERE cneEtudiant LIKE :cne AND id_module=:id_module');
                                    $stmt2->bindParam(':cne',$row['cne']);
                                    $stmt2->bindParam(':id_module',$id_module);
                                    $stmt2->execute();
                                    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                                    $res2=$stmt2->fetchAll();
                                    if($stmt2->rowCount()>0){
                                    $html.='<tr><td class="tdcne_addnote">'.$row['cne'].'</td><td><input name='.$row['cne'].' type="float" value='.$res2[0]['note'].'></td></tr>';}
                                    else{
                                        $html.='<tr><td class="tdcne_addnote">'.$row['cne'].'</td><td><input name='.$row['cne'].' type="float"></td></tr>';
                                    }
                                    $i++;
                                }
                                $html.='
                                                </tbody>
                                            </table>
                                        </div>';
                                echo $html;

                                echo'<button type="submit" name="submit">Enregistrer</button>
                            </form>
                        </div>';
                }
            ?>
        </div>
    </main>


<?php
    require "./H & F/footer.php";
?>