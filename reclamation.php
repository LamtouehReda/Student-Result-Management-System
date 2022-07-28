
<?php 
    require 'connection.php';
?>
        
<?php
    require "./H & F/header.php";
?>


    <main>
        <h1>Reclamations</h1>
        <div class="toast__container">
            <?php 
                $stmt=$con->prepare('SELECT * FROM reclamations ORDER BY date DESC ');
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $res=$stmt->fetchAll();
                foreach($res as $row){
                    echo'
                        <div class="toast add-margin">
                            <div class="toast__content">
                                <p class="toast__type">'.$row['email'].'</p>
                                <p class="toast__message">'.$row['message'].'</p>
                                <br>
                                <p class="toast__date">'.$row['date'].'</p>
                                <a class="close" href="supprimerRec.php?id='.$row['id'].'" ></a>
                            </div>
                        </div>
                    ';
                }
                echo '
                    <style>
                        .close {
                            position: absolute;
                            right: 10px;
                            top: 4px;
                            width: 20px;
                            height: 20px;
                            opacity: 0.3;
                            }
                            .close:hover {
                            opacity: 1;
                            }
                            .close:before, .close:after {
                            position: absolute;
                            left: 15px;
                            content: " ";
                            height: 17px;
                            width: 2px;
                            background-color: rgba(94,23,235,255);
                            }
                            .close:before {
                            transform: rotate(45deg);
                            }
                            .close:after {
                            transform: rotate(-45deg);
                            }
                    </style>
                ';
            ?>
        </div>
    </main>


<?php
    require "./H & F/footer.php";
?>
