    <footer>
        <div class="container-footer">
            <div class="part-up">

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
                        if (!isset($_SESSION['user'])) { ?>

                            <li> <a href="connexion.php"> Connexion </a></li>
                            <li> <a href="inscription.php"> Inscription </a></li>
                        <?php }
                        ?>
                        <li> <a href="profil.php"> Profil </a></li>
                    </ul>
                </section>
            </div>
            <hr>
            <div class="part-down">

                <section class="social">
                    <li><button class="facebook"><a href="#"><img src="https://img.icons8.com/ios/30/000000/facebook--v1.png" alt="social" width="30px"></a></button></li>
                    <li><button class="twitter"><a href="#"><img src="https://img.icons8.com/ios/30/000000/twitter--v1.png" alt="social" width="30px"></a></button></li>
                    <li><button class="instagram"><a href="#"><img src="https://img.icons8.com/ios/30/000000/instagram-new--v1.png" alt="social" width="30px"></a></button></li>
                    <li><button class="github"><a href="#"><img src="https://img.icons8.com/ios-glyphs/30/000000/github.png" alt="social" width="30px"></a></button></li>
                </section>
            </div>
        </div>
    </footer>