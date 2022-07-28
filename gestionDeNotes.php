        
<?php
    require "./H & F/header.php";
?>


    <main>
        <div class="notesask">
            <h1>Session d'automne 2021/2022 : Résultats Modules</h1>
            <h3>Veuillez saisir votre CNE ou votre code Massar</h3>
            <form action="resultats.php" method="POST">
                <input type="text" name="cne" placeholder="CNE / code Massar">
                <button type="submit" name="submit">Resultats</button>    
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"]=="wrongCNE") {
                        echo "<p class='err'>CNE n'existe pas</p>";
                    } elseif($_GET["error"]=="emptyinput"){
                        echo "<p class='err'>La case du CNE est obligatoire</p>";
                    }
                }
                ?>
            </form>
        </div>
        <?php 
        if(isset($_SESSION['html'])){
            echo $_SESSION['html'];
            session_destroy();
        }?>
    </main>


<?php
    require "./H & F/footer.php";
?>