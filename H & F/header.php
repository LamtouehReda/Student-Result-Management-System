<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/059ac7bb78.js" crossorigin="anonymous"></script>    
    <title>Document</title>
</head>
<body>
    <header>
        <div class="signin-link">
            <?php if(isset($_SESSION['username'])){
                echo'
                    <a href="./proflogout.php">
                        <span>Se déconnecter</span>
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                ';
            }else{
                echo"
                    <a href='./profLogin.php'>
                        <span>S'identifier</span>
                        <i class='fas fa-sign-in-alt'></i>
                    </a>
                    ";
            }
            ?>
        </div>
        <nav class="side_bar active">
            <div class="top_bar">
                <span></span>
                <a class="side_bar_bttn"><i class="fas fa-caret-left"></i></a>
            </div>
            <div class="logo_group">
                <a href="./index.php" class="logo_icon">
                    <img src="./img\Navy Blue Cybertech Company Logo (2).png" alt="">
                </a>
                <a href="./index.php" class="logo">
                    <img src="./img/Navy .png" alt="">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <li class="list">
                        <a href="./index.php">
                            <span class="icon">
                                <i class="fab fa-accusoft"></i>
                            </span>
                            <span class="text">Accueil</span>
                        </a>
                    </li>
                    <?php if(isset($_SESSION['username'])){
                        echo'
                            <li class="list">
                                <a href="./insertNotes.php?prof='.$_SESSION['username'].'&nb_module='.$_SESSION['module_nb'].'">
                                    <span class="icon">
                                        <i class="fa fa-bar-chart"></i>
                                    </span>
                                    <span class="text">Inserer Les Notes</span>
                                </a>
                            </li>';
                    }else{
                        echo'
                            <li class="list">
                                <a href="./gestionDeNotes.php">
                                    <span class="icon">
                                        <i class="fa fa-bar-chart"></i>
                                    </span>
                                    <span class="text">E-résultat</span>
                                </a>
                            </li>';
                    }
                    ?>
                    <li class="list" id="disc">
                        <a href="#">
                            <span class="icon">
                                <i class="far fa-clipboard"></i>
                            </span>
                            <span class="text">Description &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <i class="fas fa-caret-down"></i></span>
                        </a>
                        <div class="extr-disc">
                            <ul>
                                <li class="list" id="prof">
                                    <a href="descriptionLST.php">
                                        <span class="icon">
                                            <i class="fas fa-users"></i>
                                        </span>
                                        <span class="text">LST</span>
                                    </a>
                                </li>
                                <li class="list" id="modl">
                                    <a href="descriptionmodule.php">
                                        <span class="icon">
                                            <i class="fas fa-book"></i>
                                        </span>
                                        <span class="text">Modules</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="list">
                            <?php 
                                if(!isset($_SESSION['chef'])){
                                    echo '
                                        <a href="contacts.php">
                                            <span class="icon">
                                                <i class="far fa-comments"></i>
                                            </span>
                                            <span class="text">Contacts</span>
                                        </a>
                                    ';
                                }else{
                                    echo '
                                        <a href="reclamation.php">
                                            <span class="icon">
                                                <i class="far fa-comments"></i>
                                            </span>
                                            <span class="text">Reclamations</span>
                                        </a>
                                    ';
                                }
                            ?>
                    </li>
                </ul>
            </div>
            <div class="message_group">
                <div class="messages">
                    <ul>
                        <li class="list">
                            <a href="#">
                                <span class="icon">
                                    <i class="fab fa-facebook-f"></i>
                                </span>
                                <span class="text">Facebook</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#">
                                <span class="icon">
                                    <i class="fab fa-twitter"></i>
                                </span>
                                <span class="text">Twitter</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#">
                                <span class="icon">
                                    <i class="fab fa-linkedin-in"></i>
                                </span>
                                <span class="text">LinkedIn</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#">
                                <span class="icon">
                                    <i class="fab fa-github"></i>
                                </span>
                                <span class="text">Github</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="box">