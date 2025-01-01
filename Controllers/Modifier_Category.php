<?php
session_start();
require_once '../Models/Database.php';
require_once '../Models/Category.php';

class Modifier_CategoryController extends Category
{
    public function Modifier($id, $category_name)
    {
        return $this->Modifier_Category($id, $category_name);
    }
}


$Modifier_Category_Controller = new Modifier_CategoryController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category = $_POST['category_name'];
    $id = $_POST['id'];

    $result = $Modifier_Category_Controller->Modifier($id, $category);

    if ($result) {
        $_SESSION["success"] = "Category modifier avec success";
        header("Location: /dashboard/admin/categories.php");
        exit;
    } else {
        $_SESSION["error"] = "Category non modifier";
        header("Location: /dashboard/admin/categories.php");
        exit;
    }

} else {
    echo "Error dans Traitement  de la requête";
}

