<?php
require_once '../Models/Voiture.php';

class Ajouter_Voiture_Controller extends Voiture
{

    public function Ajouter($modele, $marque, $prixJournalier, $transmission, $couleur, $kilometrage, $voiture_img, $disponible, $category)
    {
        $this->Ajouter_Voiture($modele, $marque, $prixJournalier, $transmission, $couleur, $kilometrage, $voiture_img, $disponible, $category);
    }
}

$tout_est_effectuer = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modele = $_POST['modele'];
    $marque = $_POST['marque'];
    $prixJournalier = $_POST['prixJournalier'];
    $transmission = $_POST['transmission'];
    $couleur = $_POST['couleur'];
    $kilometrage = $_POST['kilometrage'];
    $voiture_img = $_POST['voiture_img'];
    $disponible = $_POST['disponible'];
    $category = $_POST['category'];

    // You can access each value like this:
    foreach ($modele as $key => $value) {
        $modele_value = $value;
        $marque_value = $marque[$key];
        $prixJournalier_value = $prixJournalier[$key];
        $transmission_value = $transmission[$key];
        $couleur_value = $couleur[$key];
        $kilometrage_value = $kilometrage[$key];
        $voiture_img_value = $voiture_img[$key];
        $disponible_value = $disponible[$key];
        $category_value = $category[$key];

        $Ajouter_Voiture_Controller = new Ajouter_Voiture_Controller();
        $result = $Ajouter_Voiture_Controller->Ajouter($modele_value, $marque_value, $prixJournalier_value, $transmission_value, $couleur_value, $kilometrage_value, $voiture_img_value, $disponible_value, $category_value);
        if ($result == 0) {
            $tout_est_effectuer = false;
        }


    }
}

if ($tout_est_effectuer) {
    header("Location: /dashboard/admin/voiture.php?MsgAjout=L'ajout a fonctionner Succes");
    exit;
} else {
    header("Location: /dashboard/admin/voiture.php?MsgAjout=L'ajout a echouer");
    exit;
}