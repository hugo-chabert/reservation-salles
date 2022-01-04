<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
    <?php var_dump($_SESSION);?>
    </main>
    <?php require ('footer.php');?>
</body>
</html>