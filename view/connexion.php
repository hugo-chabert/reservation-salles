<?php
session_start();

require_once(__DIR__ . '/../model/Register_Login_model.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../database/database.php');

/* if (isset($_POST['connexion'])) {
    $User->connect($_POST['login'], $_POST['password']);
}
if (isset($_SESSION['user']['login'])) {
    $User->isntConnected();
} */
if (isset($_POST['connexion'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        Register::connexion($_POST['email'], $_POST['password']);
    } else {
        Toolbox::ajouterMessageAlerte("Remplir tous les champs.", Toolbox::COULEUR_ROUGE);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="../public/css/form.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Connexion</title>
</head>

<body>
    <?php require('header_spe.php'); ?>
    <main>
        <div class="container">
            <form action="" method="post">
                <?php require_once(__DIR__ . '/gestion_erreur.php'); ?>
                <p>Connectez vous dès maintenant !! &#128513;</p>
                <input class="input-form" type="text" name="email" placeholder="Email" autocomplete="off">
                <input class="input-form" type="password" name="password" placeholder="Mot de passe" />
                <button class='button' type="submit" name="connexion">Connexion</button>
                <p class="message">Vous n'avez pas de compte? <br><a class="aa" href="inscription.php">Creez un compte</a></p>
            </form>
        </div>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>