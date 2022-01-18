<?php

class ReservationClass{
    public $db;

    public function __construct(){
        $this->db = mysqli_connect('localhost', 'root', 'root', 'reservationsalles');
    }

    public function create($title, $desc, $datetime, $datetimeEnd, $id_user){
        mysqli_set_charset($this->db,'utf8');
        $checkDatetime = mysqli_query($this->db, "SELECT * FROM reservations WHERE debut = '$datetime'");
        $RowReserv = mysqli_num_rows($checkDatetime);
        if($RowReserv == 1){
            echo "<p class='erreur'>Cette horaire est deja reservée !</p>";
        }
        else{
            $CreateReservation = mysqli_query($this->db, "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$title', '$desc', '$datetime', '$datetimeEnd', '$id_user')");
            header('Location: planning.php');
            exit();
        }
    }

    public function delete($id){
        mysqli_set_charset($this->db,'utf8');
        $checkIfExist = mysqli_query($this->db, "SELECT * FROM reservation WHERE id = '$id'");
        $rowCheckId = mysqli_num_rows($checkIfExist);
        if($rowCheckId == 1){
            $deleteReserv = mysqli_query($this->db, "DELETE FROM reservation WHERE id = '$id'");
            header('Location: admin.php');
            exit();
        }
        else{
            echo "<p class='erreur'>Cette reservation n'existe pas !</p>";
        }
    }
}

$Reservation = new ReservationClass();

?>