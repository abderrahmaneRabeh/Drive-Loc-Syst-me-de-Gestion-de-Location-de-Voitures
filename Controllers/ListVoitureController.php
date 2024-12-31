<?php
require_once '../Models/Voiture.php';

class ListVoitureController extends Voiture
{

    public function List_Voitures()
    {
        return $this->getVoitures();
    }

}