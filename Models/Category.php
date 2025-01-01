<?php
// require "Database.php";
class Category extends Database
{

    private $Conx_DataBase;
    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }

    public function getCategories()
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM categories");
        $query->execute();
        $categories = $query->fetchAll();
        return $categories;
    }

    public function get_One_Category($id)
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM categories WHERE id_category = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $category = $query->fetch();
        return $category;
    }

    public function Ajouter_Category($category_name)
    {
        $query = $this->Conx_DataBase->prepare("INSERT INTO categories (category_name) VALUES (:category_name)");
        $query->bindParam(':category_name', $category_name);
        $query->execute();
        return $query->rowCount();
    }

    public function DeleteCategory($id)
    {
        $query = $this->Conx_DataBase->prepare("DELETE FROM categories WHERE id_category = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->rowCount();
    }

    public function Modifier_Category($id, $category_name)
    {
        $query = $this->Conx_DataBase->prepare("UPDATE categories SET category_name = :category_name WHERE id_category = :id");
        $query->bindParam(':category_name', $category_name);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->rowCount();
    }
}