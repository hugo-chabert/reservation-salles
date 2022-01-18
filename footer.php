<link href="css/footer.css" rel="stylesheet">
<footer>
    <div class="container-footer">
        <div class="part-up">
            <section class="about">
                <h2>About</h2>
                <p>
                    Une envie d'un endroit où faire la fête, où travailler dans le calme, où organiser vos réunion ?
                    Eh bien vous tomber à pic !! Venez réserver une salle sur notre site pour profiter d'un espace
                    calme et conviviale pour votre plus grand bonheur. Pour réserver rien de plus simple connectez vous pour
                    réserver une salle, vous n'avez pas de compte ? Ce n'est pas grave inscrivez vous et par la suite vous pourrez
                    reserver votre salle. Choisissez la date, l'heure, donner un titre et une description à votre créneau et une
                    salle vous sera decerné.
                </p>
            </section>
            <section class="category">
                <h2>Catégories</h2>
                <ul>
                    <li> <a href="index.php"> Accueil </a></li>
                    <li> <a href="planning.php"> Planning </a></li>
                    <li> <a href="my-res.php"> Mes reservations </a></li>
                </ul>
            </section>
            <section class="link">
                <h2>Liens</h2>
                <ul>
                    <li> <a href="reservation-form.php"> Reserver une salle </a></li>
                    <?php
                    if(!isset($_SESSION['user'])){
                    echo '
                    <li> <a href="connexion.php"> Connexion </a></li>
                    <li> <a href="inscription.php"> Inscription </a></li>';
                    }
                    ?>
                    <li> <a href="profil.php"> Profil </a></li>
                </ul>
            </section>
        </div>
        <hr>
        <div class="part-down">
            <section class="copy">
                <p class="copyright-text">Copyright &copy; All Rights Reserved by <a href="#">Francois Niang</a>, <a href="#">Hugo Chabert</a></p>
            </section>
            <section class="social">
                <li><button class="facebook"><a  href="#"><img src="https://img.icons8.com/ios/30/000000/facebook--v1.png" alt="social" width="30px"></a></button></li>
                <li><button class="twitter"><a  href="#"><img src="https://img.icons8.com/ios/30/000000/twitter--v1.png" alt="social"width="30px" ></a></button></li>
                <li><button class="instagram"><a  href="#"><img src="https://img.icons8.com/ios/30/000000/instagram-new--v1.png" alt="social"width="30px"></a></button></li>
                <li><button class="github"><a  href="https://github.com/hugo-chabert/reservation-salles"><img src="https://img.icons8.com/ios-glyphs/30/000000/github.png" alt="social"width="30px"></a></button></li>
            </section>
        </div>
    </div>
</footer>