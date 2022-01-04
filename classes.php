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
}


$User = new User();
?>