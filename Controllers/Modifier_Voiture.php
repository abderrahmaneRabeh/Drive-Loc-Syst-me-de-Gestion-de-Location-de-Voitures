<?php
session_start();
require_once '../Models/Voiture.php';

class Modifier_Voiture_Controller extends Voiture
{
    public function Modifier($id, $modele, $marque, $prixJournalier, $transmission, $couleur, $kilometrage, $voiture_img, $disponible, $category)
    {
        return $this->Modifier_Voiture($id, $modele, $marque, $prixJournalier, $transmission, $couleur, $kilometrage, $voiture_img, $disponible, $category);
    }

}

$Modifier_Voiture_Controller = new Modifier_Voiture_Controller();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $modele = $_POST['modele'];
    $marque = $_POST['marque'];
    $prixJournalier = $_POST['prixJournalier'];
    $transmission = $_POST['transmission'];
    $couleur = $_POST['couleur'];
    $kilometrage = $_POST['kilometrage'];
    $voiture_img = $_POST['voiture_img'];
    $disponible = $_POST['disponible'];
    $category = $_POST['category'];

    $result = $Modifier_Voiture_Controller->Modifier($id, $modele, $marque, $prixJournalier, $transmission, $couleur, $kilometrage, $voiture_img, $disponible, $category);
    if ($result) {
        $_SESSION["success"] = "Voiture modifier avec success";
        header("Location: ../dashboard/admin/voiture.php");
        exit;
    } else {
        $_SESSION["error"] = "Voiture non modifier";
        header("Location: ../dashboard/admin/voiture.php");
    }
} else {
    echo "Error dans Traitement  de la requête";
}
