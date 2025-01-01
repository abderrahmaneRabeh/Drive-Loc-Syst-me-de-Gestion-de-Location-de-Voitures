<?php
require_once '../Models/Category.php';

class ListCategoriesController extends Category
{
    public function List_Categories()
    {
        $categories = $this->getCategories();
        return $categories;
    }
}