<?php

class User extends Database
{
    private $Conx_DataBase;
    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }

    public function get_User($email)
    {
        $query = $this->Conx_DataBase->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $User_Exist = $query->fetch();
        return $User_Exist;

    }

}