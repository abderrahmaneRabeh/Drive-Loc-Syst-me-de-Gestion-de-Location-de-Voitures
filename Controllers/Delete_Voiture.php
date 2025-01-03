<?php
session_start();
require_once '../Models/Voiture.php';

class Delete_Voiture_Controller extends Voiture
{

    public function Delete($id)
    {
        return $this->Delete_Voiture($id);
    }
}

$Delete_Voiture_Controller = new Delete_Voiture_Controller();
$result = $Delete_Voiture_Controller->Delete($_GET['id']);

if ($result) {
    $_SESSION["success"] = "Voiture supprimer avec success";
    header("Location: ../dashboard/admin/voiture.php");
    exit;
} else {
    $_SESSION["error"] = "Voiture non supprimer";
    header("Location: ../dashboard/admin/voiture.php");
    exit;
}