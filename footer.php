<link href="css/footer.css" rel="stylesheet">
<footer>
    <div class="footer">
        <div class="footer1">
        Accueil<a href="index.php"><img class="socialMedia" alt="Accueil" src="https://cdn-icons-png.flaticon.com/512/1239/1239292.png"></a>
        Planning<a href="planning.php"><img class="socialMedia" alt="Planning" src="http://cdn.onlinewebfonts.com/svg/img_351420.png"></a>
        <?php if(!isset($_SESSION['user'])){ echo 'Connexion<a href="connexion.php"><img class="socialMedia" alt="Connexion" src="http://cdn.onlinewebfonts.com/svg/img_201469.png"></a>';} ?>
        <?php if(!isset($_SESSION['user'])){ echo 'Inscription<a href="inscription.php"><img class="socialMedia" alt="Inscription" src="https://www.vbvb.fr/wp-content/uploads/2016/04/icone_sinscrire.png"></a>';} ?>
        <?php if(isset($_SESSION['user'])){ echo 'Profil<a href="profil.php"><img class="socialMedia" alt="Profil" src="http://cdn.onlinewebfonts.com/svg/img_311846.png"></a>';} ?>
        </div>
        <div class="footer2">
            <h2>Copyright © 2022 Hugo, François & Remi. All Rights Reserved</h2>
        </div>
        <div class="footer3">
            <a href="https://twitter.com/"><img class="socialMedia" alt="Twitter" src="images/Twitter.png"></a>
            <a href="https://facebook.com/"><img class="socialMedia" alt="Facebook" src="images/Facebook.png"></a>
            <a href="https://instagram.com/"><img class="socialMedia" alt="Instagram" src="images/Instagram.png"></a>
            <a href="https://youtube.com/"><img class="socialMedia" alt="Youtube" src="images/Youtube.png"></a>
            <a href="https://github.com/hugo-chabert/reservation-salles"><img class="socialMedia2" alt="GitHub" src="images/GitHub-Logo.png"></a>
        </div>
    </div>
</footer>