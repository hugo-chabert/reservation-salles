<?php
include_once(__DIR__ . "/../model/Reservation_model.php");


class ReservationClass
{
    public $id_user;

    public function __construct($id_user)
    {
        $this->id_user = $id_user;
        $this->Reservation_model = new Reservation_model();
    }

    public function create($title, $desc, $datetime, $datetimeEnd)
    {

        if ($this->Reservation_model->sql_check_horaire($datetime) == false) {
            $this->Reservation_model->sql_create($title, $desc, $datetime, $datetimeEnd, $this->id_user);
            Toolbox::ajouterMessageAlerte("Votre horaire est reservée !", Toolbox::COULEUR_VERTE);
            header('Location: ./planning.php');
            exit();
        } else {
            Toolbox::ajouterMessageAlerte("Cette horaire est deja reservée !", Toolbox::COULEUR_ROUGE);
            header('Location: ./reservation-form.php');
            exit();
        }
    }

    public function delete()
    {

        if ($this->Reservation_model->sql_check_delete($this->id_user) < 1) {
            $this->Reservation_model->sql_delete($this->id_user);
            Toolbox::ajouterMessageAlerte("Horraire supprimé !", Toolbox::COULEUR_VERTE);
            header('Location: ../view/admin.php');
            exit();
        } else {
            Toolbox::ajouterMessageAlerte("Cette reservation n'existe pas !", Toolbox::COULEUR_ROUGE);
            header('Location: ../view/admin.php');
            exit();
        }
    }
}
