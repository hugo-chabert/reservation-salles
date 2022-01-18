<?php
session_start();
if (isset($_POST['inscription'])) {
    $User->register($_POST['login'], $_POST['password'], $_POST['Cpassword']);
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
    <title>Inscription</title>
</head>

<body>
    <?php require('header.php'); ?>
    <main>
        <div class="container">
            <form action="" method="post">
                <p>Rejoignez nous dès maintenant !! &#128513;</p>
                <input class="input-form" type="text" name="login" placeholder="Login" />
                <input class="input-form" type="password" name="password" placeholder="Mot de passe" />
                <input class="input-form" type="password" name="Cpassword" placeholder="Confirmez le mot de passe" />
                <button class="button" type="submit" name="inscription">Creer un compte</button>
                <p class="message">Vous avez déjà un compte ? <br><a class="aa" href="connexion.php">Connectez vous</a></p>
            </form>
        </div>

    </main>
    <?php require('footer.php'); ?>
</body>

</html>