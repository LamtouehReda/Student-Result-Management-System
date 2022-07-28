        
<?php
    require "./H & F/header.php";
?>


    <main>
        <h1>Contacts</h1>
        <div class="contact">
            <form action="contactCheck.php" method="POST">
                <table>
                    <tr>
                        <td><input type="text" name="email" placeholder="EMAIL" required></td>
                    </tr>
                    <tr>
                        <td><textarea class="form-control" rows="10" placeholder="MESSAGE" name="mssg" required></textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-primary send-button" name="submit" id="submit" type="submit" value="SEND">
                                <div class="alt-send-button">
                                    <i class="fa fa-paper-plane"></i><span class="send-text">SEND</span>
                                </div>
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="right">
                <ul class="contact-list">
                    <li class="list">
                        <a href="https://goo.gl/maps/i5hQKDLvc5siXBcy6" target="_blank">
                            <span class="icon place"><i class="fa fa-map-marker fa-2x"></i></span>
                            <span class="text place">Mohammedia 28806</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="tel:+212523315353" title="Appele-nous">
                            <span class="icon phone"><i class="fa fa-phone fa-2x"></i></span>
                            <span class="text phone">+(212) 523-315-353</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="mailto:contact@fstm.ac.ma" title="Envoie-nous un email">
                            <span class="icon gmail"><i class="fa fa-envelope fa-2x"></i></span>
                            <span class="text gmail">contact@fstm.ac.ma</a></span>
                        </a>
                    </li>
                </ul>
                <hr>
                <ul class="social-media-list">
                    <li>
                        <a href="#" target="_blank" class="social-media-icon">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" class="social-media-icon">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" class="social-media-icon">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>       
                    <li>
                        <a href="#" target="_blank" class="social-media-icon">
                            <i class="fa fa-github" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="copyright">&copy; TOUS LES DROITS RÉSERVÉS</div>
            </div>
        </div>
    </main>


<?php
    require "./H & F/footer.php";
?>