<?php

include 'database.php';

class ReservationClass{
    public $pdo;

    public function __construct($pdo){
        $this->db = $pdo;
    }

    public function create($title, $desc, $datetime, $datetimeEnd, $id_user, $semaine){
        $req = "SELECT * FROM reservations WHERE debut = :datetime";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            ":datetime" => $datetime
        ));
        if($stmt->rowCount() == 1){
            echo "<p class='erreur'>Cette horaire est deja reservée !</p>";
        }
        else{
            $req2 = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur, semaine) VALUES (:title, :desc, :datetime, :datetimeEnd, :id_user, :semaine)";
            $stmt2 = $this->db->prepare($req2);
            $stmt2->execute(array(
                ":title" => $title,
                ":desc" => $desc,
                ":datetime" => $datetime,
                ":datetimeEnd" => $datetimeEnd,
                ":id_user" => $id_user,
                ":semaine" => $semaine
            ));
            header('Location: planning.php');
            exit();
        }
    }

    public function delete($id){
        $req = "SELECT * FROM reservation WHERE id = :id";
        $stmt->execute(array(
            ":id" => $id
        ));
        if($stmt->rowCount() == 1){
            $req2 = "DELETE FROM reservation WHERE id = :id";
            $stmt2 = $this->db->prepare($req2);
                $stmt2->execute(array(
                    ":id" => $id
                ));
            header('Location: admin.php');
            exit();
        }
        else{
            echo "<p class='erreur'>Cette reservation n'existe pas !</p>";
        }
    }

    public function deleteReservAsAdmin($id){
        $req = "SELECT * FROM reservations WHERE id = :id";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            ":id" => $id
        ));
        if($stmt->rowCount() == 1){
            $req2 = "DELETE FROM reservations WHERE id = :id";
            $stmt2 = $this->db->prepare($req2);
                $stmt2->execute(array(
                    ":id" => $id
                ));
            header('Location: admin.php');
            exit();
        }
        else{
            '<p class="erreur">Cette reservation est inexistante !</p>';
        }
    }

    public function display_all_reserv(){
        $req = "SELECT * FROM reservations";
        $resultat = $this->db->query($req);
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Heure de début</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach($resultat AS $fu){
            echo '<tr><td>'.$fu['id'].'</td>';
            echo '<td>'.$fu['titre'].'</td>';
            echo '<td>'.$fu['debut'].'</td></tr>';
        }
        ?>
                </tbody>
            </table>
        <?php
    }

    public function planning($semaine){
        $req = "SELECT * FROM reservations WHERE semaine = :semaine";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            ":semaine" => $semaine
        ));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $test =  new DateTime($row['debut']);
            $test2 = new DateTime('2022-01-20 11:11:10');
            echo date_format($test, 'W');
            if($test > $test2){
                echo 'OUI';
            }
            else{
                echo 'NON';
            }
        }
    }
}
$Reservation = new ReservationClass($pdo);

?>