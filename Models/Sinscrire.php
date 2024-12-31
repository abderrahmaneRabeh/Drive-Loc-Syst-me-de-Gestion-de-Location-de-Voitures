<?php

require "Database.php";


class Sinscrire extends Database
{

    private $Conx_DataBase;
    private $nom;
    private $email;
    private $pw;
    private $ConfirmPw;
    private $HashedPassword;

    public function __construct()
    {
        $this->Conx_DataBase = $this->connect_Db();

    }

    public function Register($nom, $email, $pw, $ConfirmPw)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->pw = $pw;
        $this->ConfirmPw = $ConfirmPw;

        if ($this->pw != $this->ConfirmPw) {
            header("Location: ../views/Sinscrire.php?msg=les mots de passe ne correspondent pas");
            exit;
        }
        $this->HashedPassword = password_hash($this->pw, PASSWORD_DEFAULT);

        // check the existant of email
        $query = $this->Conx_DataBase->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $query->bindParam(':email', $this->email);
        $query->execute();
        $Email_Exist = $query->fetch();

        if ($Email_Exist) {
            header("Location: ../views/Sinscrire.php?msg=Email existe déjà");
            exit;
        }

        $stmt = $this->Conx_DataBase->prepare("INSERT INTO utilisateurs (username,email,password,role_id) VALUES (:username,:email,:password,2)");
        $stmt->bindParam(':username', $this->nom);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->HashedPassword);
        $stmt->execute();

        return $stmt->rowCount();
    }

}