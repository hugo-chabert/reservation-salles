<?php
session_start();
ob_start();
require ('fonctions.php');
isAdmin();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
    <?php $User->display_all_users();?>
    <form action="" method="post">
        <input type="text" name="ID" placeholder="Entrez l'ID"/>
        <button type="submit" name="Delete">Supprimer l'utilisateur</button>
    </form>
    <?php $Reservation->display_all_reserv();?>
    <form action="" method="post">
        <input type="text" name="IDR" placeholder="Entrez l'ID"/>
        <button type="submit" name="DeleteR">Supprimer la reservation</button>
    </form>
    </main>
    <?php require ('footer.php');?>
</body>
</html>

<?php

if(isset($_POST['Delete'])){
    $User->deleteUserAsAdmin($_POST['ID']);
}

if(isset($_POST['DeleteR'])){
    $Reservation->deleteReservAsAdmin($_POST['IDR']);
}

ob_end_flush();
?>