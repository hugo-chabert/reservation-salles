<?php

include 'database.php';

class User{
    protected $pdo;

    public function __construct($pdo){
        $this->db = $pdo;
    }

    public function register($login, $password, $Cpassword){
        $req = "SELECT * FROM utilisateurs WHERE login = :login";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            ":login" => $login
        ));
        if($stmt->rowCount() == 1){
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
                $req = "INSERT INTO utilisateurs (login, password, id_droits) VALUES (:login,:password,:id_droits)";
                $stmt = $this->db->prepare($req);
                $stmt->execute(array(
                    ":login" => $login,
                    ":password" => $password,
                    ":id_droits" => 1
                ));
                header('Location: connexion.php');
                exit();
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
        $req = "SELECT * FROM utilisateurs WHERE login = :login";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            ":login" => $login
        ));
        if($stmt->rowCount() == 1){
            $req2 = "SELECT * FROM utilisateurs WHERE login = :Nlogin";
            $stmt2 = $this->db->prepare($req2);
            $stmt2->execute(array(
                ":Nlogin" => $Nlogin
            ));
            if($stmt2->rowCount() == 1){
                echo 'Login déjà existant';
            }
            else{
                $req3 = "UPDATE utilisateurs SET login = :Nlogin WHERE login = :login";
                $stmt3 = $this->db->prepare($req3);
                $stmt3->execute(array(
                    ":login" => $login,
                    ":Nlogin" => $Nlogin
                ));
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
        $req = "SELECT * FROM utilisateurs WHERE login = :login AND password = :password";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            ":login" => $login,
            ":password" => $password,
        ));
        if($stmt->rowCount() == 1){
            if($Npassword == $CNpassword){
                $req2 = "UPDATE utilisateurs SET password = :Npassword WHERE login = :login";
                $stmt2 = $this->db->prepare($req2);
                $stmt2->execute(array(
                    ":login" => $login,
                    ":Npassword" => $Npassword
                ));
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
        $req = "SELECT * FROM utilisateurs WHERE id = :id";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            ":id" => $id
        ));
        if($stmt->rowCount() == 1){
            $req2 = "DELETE FROM utilisateurs WHERE id = :id";
            $stmt2 = $this->db->prepare($req2);
                $stmt2->execute(array(
                    ":id" => $id
                ));
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