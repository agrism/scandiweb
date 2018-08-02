<?php

namespace App\Controllers;


use PDO;
use PDOException;

class Controller
{

    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host='.env("DB_HOST").';dbname='.env("DB_NAME"), env('DB_USER'), env('DB_PASSWORD'));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }
}