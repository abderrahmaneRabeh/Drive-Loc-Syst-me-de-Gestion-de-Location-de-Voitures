<?php

require_once '../Models/Database.php';
require_once '../Models/Category.php';

class Ajouter_CategoryController extends Category
{

    public function Ajouter($category_name)
    {
        return $this->Ajouter_Category($category_name);
    }
}


$Ajouter_Category_Controller = new Ajouter_CategoryController();
$tout_est_effectuer = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category = $_POST['category_name'];

    foreach ($category as $key => $value) {

        $category_value = $category[$key];

        $result = $Ajouter_Category_Controller->Ajouter($category_value);

        if ($result == 0) {
            $tout_est_effectuer = false;
        }

    }

} else {
    $tout_est_effectuer = false;
}

if ($tout_est_effectuer) {
    header("Location: /dashboard/admin/categories.php?MsgAjout=L'ajout a fonctionner Succes");
    exit;
} else {
    header("Location: /dashboard/admin/categories.php?MsgAjout=L'ajout a echouer");
    exit;
}