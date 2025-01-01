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

}