<?php

require "Database.php";

class Seconnecter extends Database
{
    private $Conx_DataBase;
    private $email;
    private $pw;

    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();
    }

    public function Login($email, $pw)
    {
        $this->email = $email;
        $this->pw = $pw;

        // checking for existing user
        $query = $this->Conx_DataBase->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $query->bindParam(':email', $this->email);
        $query->execute();
        $User_Exist = $query->fetch();

        if ($User_Exist) {
            $pw_matched = password_verify($this->pw, $User_Exist['password']);

            if ($pw_matched) {
                return true;
            } else {
                return false;
            }

        } else {
            header("Location: ../views/Seconnecter.php?email=Incorrect Email");
            exit;
        }
    }
}