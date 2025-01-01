<?php
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
    header("Location: /dashboard/admin/voiture.php?MsgDelete=Voiture supprimer avec success");
    exit;
} else {
    header("Location: /dashboard/admin/voiture.php?MsgDelete=L'ajout a echouer");
    exit;
}