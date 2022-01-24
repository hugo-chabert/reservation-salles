<?php
include_once(__DIR__ . "/../model/Planning_model.php");

class Planning
{

    public function __construct()
    {

        $this->Planning_model = new Planning_model();
    }


    public function planning()
    {
        $resultat = $this->Planning_model->sql_planning();
        return $resultat;
    }
}
