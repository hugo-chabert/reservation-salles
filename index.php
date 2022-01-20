<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Accueil</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
        <div class="container">
            <section class="section-img">
                <div id="sport" class="modal">
                    <div class="content">
                        <h1>Sport</h1>
                    </div>
                    <div class="overlay"></div>
                </div>
                <div id="detente" class="modal">
                    <div class="content">
                        <h1>Détente</h1>
                    </div>
                    <div class="overlay"></div>
                </div>
                <div id="travail" class="modal">
                    <div class="content">
                        <h1>Travail</h1>
                    </div>
                    <div class="overlay"></div>
                </div>
                <div id="event" class="modal">
                    <div class="content">
                        <h1>Évènements</h1>
                    </div>
                    <div class="overlay"></div>
                </div>
            </section>
            <section class="section-txt">
                <h2 data-aos="fade-right" data-aos-duration="3000">Bienvenue parmi nous <?php if(isset($_SESSION['user'])){echo $_SESSION['user']['login'];}?> !!&#128513;</h2>
                <p data-aos="fade-left" data-aos-duration="3000">Une envie d'un endroit où faire la fête, où travailler dans le calme, où organiser vos réunion ou encore 
                    faire du sport ?
                    Eh bien vous tomber à pic !! Venez réserver une salle sur notre site pour profiter d'un espace
                    calme et conviviale pour votre plus grand bonheur. Pour réserver rien de plus simple connectez vous pour
                    réserver une salle, vous n'avez pas de compte ? Ce n'est pas grave inscrivez vous et par la suite vous pourrez
                    reserver votre salle. Choisissez la date, l'heure, donner un titre et une description à votre créneau et une
                    salle vous sera decerné. <a href="reservation-form.php"> Cliquez  ICI </a> pour reserver une salle.</p>
            </section>
        </div>
    </main>
    <?php require ('footer.php');?>
</body>
<script>
  AOS.init();
</script>
</html>