<?php
session_start();
require ('fonctions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Planning</title>
</head>
<body>
    <?php require ('header.php');?>
    <main>
    <form action="" method="post">
        <button type="submit" name="test">+1</button>
    </form>
    <?php
    $datetime = date("H");
    echo $datetime;
    if(isset($_POST['test'])){
        $datetime++;
        echo $datetime;
    }
    ?>
    </main>
    <?php require ('footer.php');?>
</body>
</html>