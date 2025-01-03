<?php
session_start();
require_once '../Models/Database.php';
require_once '../Models/Category.php';

class DeleteCategoryController extends Category
{
    public function Delete($id)
    {
        return $this->DeleteCategory($id);
    }
}

$deleteCategoryController = new DeleteCategoryController();

if (isset($_GET['id'])) {
    $result = $deleteCategoryController->Delete($_GET['id']);
    if ($result) {
        $_SESSION["success"] = "Category supprimer avec success";
        header("Location: ../dashboard/admin/categories.php");
        exit;
    } else {
        $_SESSION["error"] = "Category non supprimer";
        header("Location: ../dashboard/admin/categories.php");
        exit;
    }
}

