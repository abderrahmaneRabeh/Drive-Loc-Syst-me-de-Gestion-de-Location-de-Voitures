<?php
require_once '../Models/Voiture.php';

class ListVoitureController extends Voiture
{

    public function List_Voitures($page)
    {
        return $this->getVoitures($page);
    }

    public function Get_One_Voiture($id)
    {
        return $this->getOneVoiture($id);
    }

}