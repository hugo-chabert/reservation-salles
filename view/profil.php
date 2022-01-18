<?php
require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../database/database.php');
require_once(__DIR__ . '/../controller/User.php');
session_start();


/* if (!isset($_SESSION['user']['login'])) {
    $User->isConnected();
}
if (isset($_POST['changeLogin'])) {
    $User->updateLogin($_POST['login']);
}
if (isset($_POST['changePassword'])) {
    $User->updatePassword($_POST['password'], $_POST['Npassword'], $_POST['CNpassword']);
} */

//affiche les infos profil
if (isset($_SESSION['objet_utilisateur'])) {
    $objet_user_info = $_SESSION['objet_utilisateur']->info_user();
}

//modifier les infos profil
if (isset($_POST['submit'])) {
    if (!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email'])) {
        $_SESSION['objet_utilisateur']->modifier_profil_user($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password']);
    } else {
        Toolbox::ajouterMessageAlerte("Remplir tous les champs.", Toolbox::COULEUR_ROUGE);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <title>Profil</title>
</head>

<body>
    <?php require('header_spe.php'); ?>
    <main>
        <div class="container_profil">
            <section>
                <div class="form_profil">
                    <?php require_once(__DIR__ . '/gestion_erreur.php'); ?>

                    <h2>Mon profil : </h2>

                    <form action="profil.php" method="post">
                        <label for="login"> Login </label>
                        <input type="text" name="login" value="<?= $objet_user_info['login'] ?>" autocomplete="off">
                        <label for="prenom"> Prenom </label>
                        <input type="text" name="prenom" value="<?= $objet_user_info['prenom'] ?>" autocomplete="off">
                        <label for="nom"> Nom </label>
                        <input type="text" name="nom" value="<?= $objet_user_info['nom'] ?>" autocomplete="off">
                        <label for="email"> Email </label>
                        <input type="text" name="email" value="<?= $objet_user_info['email'] ?>" autocomplete="off">
                        <input type="password" name="password" value="<?= $objet_user_info['password'] ?>" autocomplete="off">

                        <button type="submit" name="submit">Modifier</button>
                    </form>

                </div>

            </section>
        </div>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>