<?php
class User{
    public $db;

    public function __construct(){
        $this->db = mysqli_connect('localhost', 'root', 'root', 'reservationsalles');
    }

    public function register($login, $password, $Cpassword){
        mysqli_set_charset($this->db,'utf8');
        $User_Exist = mysqli_query($this->db, "SELECT * FROM utilisateurs WHERE login = '".$login."'");
        $Row_Exist = mysqli_num_rows($User_Exist);
        if($Row_Exist == 1){
            echo 'Utilisateur déjà existant';
        }
        else{
            if($login == NULL || $password == NULL || $Cpassword == NULL ) {
                echo'<p class="erreur">Remplissez tous les champs</p>';
            }
            else if($password != $Cpassword) {
                echo'<p class="erreur">Mot de passe Non identique</p>';
            }
            else{
                $Register = mysqli_query($this->db, "INSERT INTO utilisateurs (login, password, id_droits) VALUES ('$login','$password','1')");
            }
        }
    }

    public function connect($login, $password){
        mysqli_set_charset($this->db,'utf8');
        $recupUserConnect = mysqli_query($this->db, "SELECT * FROM utilisateurs WHERE login = '".$login."' AND password ='".$password."'");
        $row = mysqli_num_rows($recupUserConnect);
        $fetch = mysqli_fetch_assoc($recupUserConnect);
        if($row == 1){
            $_SESSION['user'] = $fetch;
        }
        header('Location: index.php');
        exit();
    }

    public function disconnect(){
        session_destroy();
        header('Location: index.php');
        exit();
    }

    public function isConnected(){
        header('Location: index.php');
        exit();
    }

    public function isntConnected(){
        header('Location: index.php');
        exit();
    }

    public function updateLogin($Nlogin){
        mysqli_set_charset($this->db,'utf8');
        $login = $_SESSION['user']['login'];
        $change_login = mysqli_query($this->db,"SELECT * FROM utilisateurs WHERE login = '$login' ");
        $RowLogin = mysqli_num_rows($change_login);
        if($RowLogin == 1){
            $change_login_test = mysqli_query($this->db,"SELECT * FROM utilisateurs WHERE login = '$Nlogin' ");
            $RowLoginTest = mysqli_num_rows($change_login_test);
            if($RowLoginTest == 1){
                echo 'Login déjà existant';
            }
            else{
                $new_login = mysqli_query($this->db, "UPDATE utilisateurs SET login = '$Nlogin' WHERE login = '$login'");
                session_destroy();
                header('Location: index.php');
                exit();
            }
        }
        else{
            echo '<p class="erreur">Veuillez vous déconnecter votre Login est inexistant</p>';
        }
    }

    public function updatePassword($password,$Npassword,$CNpassword){
        mysqli_set_charset($this->db,'utf8');
        $login = $_SESSION['user']['login'];
        $change_password = mysqli_query($this->db,"SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password'");
        $RowPassword = mysqli_num_rows($change_password);
        if($RowPassword == 1){
            if($Npassword == $CNpassword){
                $new_password = mysqli_query($this->db,"UPDATE utilisateurs SET password = '$Npassword' WHERE login = '$login'");
                session_destroy();
                header('Location: index.php');
                exit();
            }
            else{
                echo '<p class="erreur">Vos nouveau mots de passe ne correspondent pas</p>';
            }
        }
        else{
            echo '<p class="erreur">Votre ancien mots de passe est incorrect</p>';
        }
    }
}

class Reservation{
    public $db;

    public function __construct(){
        $this->db = mysqli_connect('localhost', 'root', 'root', 'reservationsalles');
    }

    public function create($title, $desc, $datetime, $datetimeEnd, $id_user){
        mysqli_set_charset($this->db,'utf8');
        $checkDatetime = mysqli_query($this->db, "SELECT * FROM reservations WHERE debut = '$datetime'");
        $RowReserv = mysqli_num_rows($checkDatetime);
        if($RowReserv == 1){
            echo 'Cette horaire est deja reservée';
        }
        else{
            $CreateReservation = mysqli_query($this->db, "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$title', '$desc', '$datetime', '$datetimeEnd', '$id_user')");
        }
    }
}


$User = new User();

$Reservation = new Reservation();
?>