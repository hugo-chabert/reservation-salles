<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>NO-TITLE</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Titre"/>
            <input type="text" name="desc" placeholder="Description"/>
            <select name="jours" size="1">
                <option>Lundi
                <option>Mardi
                <option>Mercredi
                <option>Jeudi
                <option>Vendredi
            </select>
            <select name="horaires" size="1">
                <option value="8">8h - 9h
                <option value="9">9h - 10h
                <option value="10">10h - 11h
                <option value="11">11h - 12h
                <option value="12">12h - 13h
                <option value="13">13h - 14h
                <option value="14">14h - 15h
                <option value="15">15h - 16h
                <option value="16">16h - 17h
                <option value="17">17h - 18h
                <option value="18">18h - 19h
            </select>
            <button type="submit" name="reserver">Reserver</button>
        </form>
    </main>
    <?php require ('footer.php');?>
</body>
</html>
<?php
if(isset($_POST['reserver'])){
    $Reservation->create($_POST['title'],$_POST['desc'],$_POST['jours'],$_POST['horaires']);
    echo $_POST['jours'];
}

?>