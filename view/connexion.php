<?php

session_start();

if (isset($_POST['connexion'])) {
    $User->connect($_POST['login'], $_POST['password']);
}
if (isset($_SESSION['user']['login'])) {
    $User->isntConnected();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="css/form.css" rel="stylesheet">
    <title>Connexion</title>
</head>

<body>
    <?php require('header.php'); ?>
    <main>
        <div class="container">
            <form action="" method="post">
                <p>Connectez vous dès maintenant !! &#128513;</p>
                <input class="input-form" type="text" name="login" placeholder="Login" />

                <input class="input-form" type="text" name="prenom" placeholder="Prenom" autocomplete="off">

                <input class="input-form" type="text" name="nom" placeholder="Nom" autocomplete="off">

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