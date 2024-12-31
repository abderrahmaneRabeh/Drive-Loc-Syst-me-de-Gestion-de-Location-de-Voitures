<?php

require "Database.php";

class Voiture extends Database
{
    private $lignes_par_page = 9;
    private $Conx_DataBase;

    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }
    public function getLinesParPage()
    {
        return $this->lignes_par_page;
    }

    public function Nbr_Voiture()
    {
        $query = $this->conx->prepare("SELECT count(*) AS total FROM vehicule");
        $query->execute();
        $result = $query->fetch();
        return $result['total'];
    }

    public function getVoitures($page = 1)
    {
        $offset = ($page - 1) * $this->lignes_par_page;
        $query = $this->Conx_DataBase->prepare("SELECT * FROM vehicule LIMIT :offset, :limit");
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->bindParam(':limit', var: $this->lignes_par_page, type: PDO::PARAM_INT);
        $query->execute();
        $listVoiture = $query->fetchAll();
        return $listVoiture;
    }

    public function getOneVoiture($id)
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM vehicule, categories WHERE id_vehivule = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $voiture = $query->fetch();
        return $voiture;
    }
}