<?php

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
        header("Location: /dashboard/admin/categories.php?MsgDelete=Category supprimer avec success");
        exit;
    } else {
        header("Location: /dashboard/admin/categories.php?MsgDelete=L'ajout a echouer");
        exit;
    }
}

