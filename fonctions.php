<?php

function connect_database(){
    $db =  mysqli_connect('localhost', 'root', 'root', 'reservationsalles');
    mysqli_set_charset($db, 'utf8');
    return $db;
}

function create_user(){
    $db = connect_database();
    if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['Cpassword'])) {
        $login= $_POST['login'];
        $password=$_POST['password'];
        $Cpassword = $_POST['Cpassword'];
        $check_user = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login='$login'");
        $count= mysqli_num_rows($check_user);
        if($count == 1){
            echo "Utilisateur déja existant";
        }
        else{
            if($login == NULL || $password == NULL || $Cpassword == NULL ) {
                echo'<p class="erreur">Remplissez tous les champs</p>';
            }
            else if($password != $Cpassword) {
                echo'<p class="erreur">Mot de passe Non identique</p>';
            }
            else{
                $requete = mysqli_query($db, "INSERT INTO utilisateurs (login, password, id_droits) VALUES ('$login','$password', 1)");
                header('Location: connexion.php');
                exit();
            }
        }
    }
}

function connect_user() {
    $db = connect_database();
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $pw= $_POST['password'];
        if($login != NULL && $pw != NULL) {
            $requete = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login='$login' ");
            $fetch= mysqli_fetch_assoc($requete);
            if(isset($fetch)) {
                $sql_password= $fetch['password'];
                if($pw == $sql_password) {
                    $_SESSION['user'] = $fetch;
                    header('Location: index.php');
                    exit();
                }
                else{
                    echo '<p class="erreur">Mauvais mot de passe</p>';
                }
            }
            else {
                echo'<p class="erreur">Compte inexistant</p>';
            }
        }
        else {
            echo'<p class="erreur">Remplissez tous les champs</p>';
        }
    }
}

function disconnect(){
    if(isset($_POST['deconnexion'])){
        session_destroy();
        header('Location: index.php');
        exit();
    }
}

function isConnected(){
    if(!isset($_SESSION['user']['login'])){
        header('Location: index.php');
        exit();
    }
}

function isntConnected(){
    if(isset($_SESSION['user']['login'])){
        header('Location: profil.php');
        exit();
    }
}

?>