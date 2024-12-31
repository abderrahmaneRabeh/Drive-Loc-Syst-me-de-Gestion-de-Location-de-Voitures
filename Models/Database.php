<?php

class Database
{

    private $host = 'localhost';
    private $dbname = 'drivelocdb';
    private $userName = 'root';
    private $pw = '';

    public $conx;

    public function connect_Db()
    {

        $this->conx = null;

        try {

            $this->conx = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->userName, $this->pw);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Failed Connection : " . $e->getMessage());
        }

        return $this->conx;
    }
}