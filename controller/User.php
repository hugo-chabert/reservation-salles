<?php

include 'database.php';

class User
{
    public $id;
    public $email;

    public function __construct($email, $id)
    {
        $this->email = $email;
        $this->id = $id;
        $this->User_model = new User_model();
    }


    //afficher données utilisateurs
    public function info_user()
    {
        $resultat = $this->User_model->info_user_id($this->id);

        return $resultat;
    }

    //modifier les infos du profil
    public function modifier_profil_user($login, $prenom, $nom, $email)
    {
        $login_secure = Securite::secureHTML($login);
        $prenom_secure = Securite::secureHTML($prenom);
        $nom_secure = Securite::secureHTML($nom);
        $email_secure = Securite::secureHTML($email);

        if (filter_var($email_secure, FILTER_VALIDATE_EMAIL)) {

            //profil initiale user à la connexion//
            $profil_user_initial = $this->info_user();

            //Si les champs sont identiques//
            if ($profil_user_initial['login'] == $login_secure && $profil_user_initial['prenom'] == $prenom_secure && $profil_user_initial['nom'] == $nom_secure && $profil_user_initial['email'] == $email_secure) {
                Toolbox::ajouterMessageAlerte("Aucune modification !", Toolbox::COULEUR_ROUGE);
                header("Location: ./profil.php");
                exit();
            }

            //Si l'email reste inchangé, modification des infos//
            elseif ($profil_user_initial['email'] == $email_secure) {
                $this->User_model->sql_modifier_profil($login_secure, $prenom_secure, $nom_secure, $email_secure, $this->id);

                //set les nouvelles valeurs en variable de session
                $resultat = $this->User_model->info_user_id($this->id);
                $_SESSION['user']['email'] = $resultat['email'];
                $_SESSION['user']['id'] = $resultat['id_utilisateur'];

                Toolbox::ajouterMessageAlerte("Modification ok !", Toolbox::COULEUR_VERTE);
                header("Location: ./profil.php");
                exit();
            }

            //Si l'email change et n'est pas en bdd, modification des infos//
            elseif (Register::info_user($email_secure) == false) {
                $this->User_model->sql_modifier_profil($login_secure, $prenom_secure, $nom_secure, $email_secure, $this->id);

                //set les nouvelles valeurs en variable de session
                $resultat = $this->User_model->info_user_id($this->id);
                $_SESSION['user']['email'] = $resultat['email'];
                $_SESSION['user']['id'] = $resultat['id_utilisateur'];

                Toolbox::ajouterMessageAlerte("Modification ok !", Toolbox::COULEUR_VERTE);
                header("Location: ./profil.php");
                exit();
            }

            //Si l'email envoyé match en bdd, refuser la modification//
            elseif (Register::info_user($email_secure) == true) {
                $this->User_model->sql_modifier_profil_sans_email($login_secure, $prenom_secure, $nom_secure, $this->id);

                Toolbox::ajouterMessageAlerte("L'email est déjà utilisé !", Toolbox::COULEUR_ROUGE);
                header("Location: ./profil.php");
                exit();
            }
        } else {
            $this->User_model->sql_modifier_profil_sans_email($login_secure, $prenom_secure, $nom_secure, $this->id);
            Toolbox::ajouterMessageAlerte("Email non valide !", Toolbox::COULEUR_ROUGE);
            header("Location: ./profil.php");
            exit();
        }
    }

    public function deconnexion()
    {
        session_unset();
    }



    public function updatePassword($password, $Npassword, $CNpassword)
    {
        $login = $_SESSION['user']['login'];
        $change_password = mysqli_query($this->db, "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password'");
        $RowPassword = mysqli_num_rows($change_password);
        if ($RowPassword == 1) {
            if ($Npassword == $CNpassword) {
                $new_password = mysqli_query($this->db, "UPDATE utilisateurs SET password = '$Npassword' WHERE login = '$login'");
                session_destroy();
                header('Location: index.php');
                exit();
            } else {
                echo '<p class="erreur">Vos nouveau mots de passe ne correspondent pas</p>';
            }
        } else {
            echo '<p class="erreur">Votre ancien mots de passe est incorrect</p>';
        }
    }

    public function deleteUserAsAdmin($id)
    {
        $userExist = mysqli_query($this->db, "SELECT * FROM utilisateurs WHERE id = '$id'");
        $rowDelUser = mysqli_num_rows($userExist);
        if ($rowDelUser == 1) {
            $deleteUser = mysqli_query($this->db, "DELETE FROM utilisateurs WHERE id = '$id'");
            header('Location: admin.php');
            exit();
        } else {
            '<p class="erreur">Cet utilisateur est inexistant !</p>';
        }
    }
}
