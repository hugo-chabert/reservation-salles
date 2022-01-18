<?php

include 'database.php';

class User{
    protected $pdo;

    public function __construct($pdo){
        $this->db = $pdo;
    }

    public function register($login, $password, $Cpassword){
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
        $req = "SELECT * FROM utilisateurs WHERE login = :login AND password = :password";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            ":login" => $login,
            ":password" => $password,
        ));
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() == 1){
            $_SESSION['user'] = $resultat;
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

    public function deleteUserAsAdmin($id){
        $userExist = mysqli_query($this->db, "SELECT * FROM utilisateurs WHERE id = '$id'");
        $rowDelUser = mysqli_num_rows($userExist);
        if($rowDelUser == 1){
            $deleteUser= mysqli_query($this->db, "DELETE FROM utilisateurs WHERE id = '$id'");
            header('Location: admin.php');
            exit();
        }
        else{
            '<p class="erreur">Cet utilisateur est inexistant !</p>';
        }
    }
}

$User = new User($pdo);

?>