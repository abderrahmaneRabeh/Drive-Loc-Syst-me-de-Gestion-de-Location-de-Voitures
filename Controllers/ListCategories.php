<?php
require_once '../Models/Category.php';

class ListCategoriesController extends Category
{
    public function List_Categories()
    {
        $categories = $this->getCategories();
        return $categories;
    }

    public function getOneCategory($id)
    {
        return $this->get_One_Category($id);
    }
}