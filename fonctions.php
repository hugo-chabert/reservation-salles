<?php

function connect_database(){
    $db =  mysqli_connect('localhost', 'root', 'root', 'reservationsalles');
    mysqli_set_charset($db, 'utf8');
    return $db;
}

function isAdmin(){
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['id_droits'] != 13){
            header('Location: index.php');
            exit();
        }
    }
    else{
        header('Location: index.php');
        exit();
    }
}

?>