<?php

class Planning_model
{

    public function sql_planning()
    {
        $req = "SELECT * FROM reservations INNER JOIN utilisateurs";
        $stmt = Database::connect_db()->prepare($req);
        $stmt->execute();
        $resultat = $stmt->fetchAll();
        return $resultat;
    }
}
