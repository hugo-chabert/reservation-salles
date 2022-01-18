<?php

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