<?php
require_once '../Models/Voiture.php';

class ListVoitureController extends Voiture
{

    public function List_Voitures($page, $recherche)
    {
        return $this->getVoitures($page, $recherche);
    }

    public function Get_One_Voiture($id)
    {
        return $this->getOneVoiture($id);
    }

}