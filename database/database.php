<?php

namespace Database;

use PDO;
use PDOException;

class Database
{
    public static function connect_db(): PDO
    {
        try {
            $bdd = new PDO("mysql:host=localhost:3306;dbname=hugo-chabert_reservationsalles;charset=utf8", "hugo-chabertRS", "Chabert13");
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$bdd) {
                die("Connexion a la bdd impossible");
            }
            return $bdd;
        } catch (PDOException $e) {

            echo 'echec : ' . $e->getMessage();
            var_dump($e);
        }
    }
}
