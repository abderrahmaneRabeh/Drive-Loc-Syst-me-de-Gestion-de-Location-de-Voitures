<?php
require "Database.php";
class Statistique extends Database
{

    private $Conx_DataBase;
    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }

    public function Statistique_utilisateur()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM utilisateurs");
        $query->execute();
        return $query->fetchAll();
    }
}