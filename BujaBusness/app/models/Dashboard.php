<?php

class DashboardDAO{
    private static $pdo;

    public function __construct()
    {
        $conn = new Database();
        self::$pdo = $conn->getConnection();
    }

    //Compter les produit 

}












?>