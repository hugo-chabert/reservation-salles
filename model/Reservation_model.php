<?php

class Reservation_model
{

    public function sql_create($title, $desc, $datetime, $datetimeEnd, $id)
    {
        $req = "INSERT INTO reservations (titre, description, debut, fin, fk_id_utilisateur, semaine) VALUES (:titre, :description, :debut, :fin, :fk_id_utilisateur, 0)";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":titre" => $title,
            ":description" => $desc,
            ":debut" => $datetime,
            ":fin" => $datetimeEnd,
            ":fk_id_utilisateur" => $id
        ));
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function sql_delete($id)
    {
        $req = "DELETE FROM reservations WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id" => $id
        ));
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }


    public function sql_check_delete($id)
    {
        //requete sql
        $req = "SELECT * FROM reservations WHERE id = :id";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":id" => $id
        ));
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $count = $resultat->fetchColumn();
        return $count;
    }


    public function sql_check_horaire($datetime)
    {
        //requete sql
        $req = "SELECT * FROM reservations WHERE debut = :debut";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute(array(
            ":debut" => $datetime
        ));
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }
}