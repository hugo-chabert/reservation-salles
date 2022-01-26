<?php
require_once(__DIR__ . '/../database/database.php');
require_once(__DIR__ . '/../controller/Securite.php');
require_once(__DIR__ . '/../controller/Toolbox.php');
require_once(__DIR__ . '/../controller/ReservationClass.php');
session_start();

if (!Securite::estConnecte()) {
    header('Location:./connexion.php');
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $currentPage = (int) strip_tags($_GET['id']);
}
else{
    header('Location: ./planning.php');
}

$reservation = new ReservationClass($currentPage);
$resultat = $reservation->display_reservation($currentPage);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Evenement</title>
</head>

<body>
    <?php require('header_spe.php'); ?>
    <main>
    <h1><?php echo $resultat['titre'] ?></h1>
    <p><?php echo $resultat['description']?></p>
    <?php echo $resultat['debut']?>
    <?php echo $resultat['fin']?>
    </main>
    <?php require('footer_spe.php'); ?>
</body>

</html>