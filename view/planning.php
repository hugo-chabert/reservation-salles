<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <title>Planning</title>
</head>

<body>
    <?php require('header_spe.php'); ?>
    <main>
        <?php require_once(__DIR__ . '/gestion_erreur.php'); ?>
    </main>
    <?php require('footer.php'); ?>
</body>

</html>