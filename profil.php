<?php
session_start();
require ('fonctions.php');
isConnected();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/inscription.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
    <form action="" method = "POST" class="decoButton">
        <button class = "deco2" type = "submit" name = "deconnexion" value ="Deconnexion">DECONNEXION</button>
    </form>
    <?php disconnect()?>
    </main>
    <?php require ('footer.php');?>
</body>
</html>