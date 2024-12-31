<?php
require_once '../Models/Sinscrire.php';

class SinscrireController extends Sinscrire
{
    public function RegisterController($nom, $email, $pw, $ConfirmPw)
    {
        $result = $this->Register($nom, $email, $pw, $ConfirmPw);
        if ($result) {
            session_start();
            header("Location: ../index.php");
            echo "success register";
            exit;
        } else {
            header("Location: ../index.php");
            echo "failed register";
            exit;
        }
    }

}

// traitement de S'inscrire

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $pw = $_POST['motDePasse'];
    $ConfirmPw = $_POST['confirmerMotDePasse'];

    $AuthController = new SinscrireController();
    $AuthController->RegisterController($nom, $email, $pw, $ConfirmPw);

}