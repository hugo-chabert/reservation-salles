<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Accueil</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
        <div class="container">
            <div class="pic-ctn">
                <img src="https://picsum.photos/200/300?t=1" alt="" class="pic">
                <img src="https://picsum.photos/200/300?t=2" alt="" class="pic">
                <img src="https://picsum.photos/200/300?t=3" alt="" class="pic">
                <img src="https://picsum.photos/200/300?t=4" alt="" class="pic">
                <img src="https://picsum.photos/200/300?t=5" alt="" class="pic">
            </div>
        </div>
    </main>
    <?php require ('footer.php');?>
</body>
</html>