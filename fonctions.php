<?php

function connect_database(){
    $db =  mysqli_connect('localhost', 'root', 'root', 'reservationsalles');
    mysqli_set_charset($db, 'utf8');
    return $db;
}

?>