<?php

require_once '../Models/Sinscrire.php';

class SinscrireController extends Sinscrire
{
    public function RegisterController($nom, $email, $pw, $ConfirmPw)
    {
        $result = $this->Register($nom, $email, $pw, $ConfirmPw);
        if ($result) {
            // header("Location: ../index.php");
            echo "success register";
            exit;
        } else {
            // header("Location: ../index.php");
            echo "failed register";
            exit;
        }
    }

}