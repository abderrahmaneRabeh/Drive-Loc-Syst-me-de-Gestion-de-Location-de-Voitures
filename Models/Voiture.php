<?php

require "Database.php";

class Voiture extends Database
{
    private $Conx_DataBase;
    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }

    public function getVoitures()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM vehicule LIMIT 10");
        $query->execute();
        $listVoiture = $query->fetchAll();
        return $listVoiture;
    }
}