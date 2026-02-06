<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ ."/../dao/DashboardDAO.php";
require_once __DIR__."/../config/Database.php";

/**
 * Service pour agréger les données du tableau de bord.
 */
class DashboardService{
    private DashboardDAO $dashboard_dao;
    /**
     * Constructeur, initialise le DAO du tableau de bord.
     */
    public function __construct()
    {
        $this->dashboard_dao = new DashboardDAO;
    }

    /**
     * Récupère un ensemble de statistiques en une seule requête SQL.
     */
    public function getStats(){
        $sql = "SELECT 
                    (SELECT COUNT(*) FROM commercant WHERE statut = 'active') AS total_commercants,
                    (SELECT COUNT(*) FROM commercant WHERE statut = 'inactif') AS total_commercants_inactifs,
                    (SELECT COUNT(*) FROM produit WHERE statut = 'active') AS total_produits,
                    (SELECT COUNT(*) FROM produit WHERE statut = 'inactive') AS total_produits_inactifs,
                    (SELECT COUNT(*) FROM categorie WHERE statut = 'active') AS total_categories,
                    (SELECT COUNT(*) FROM categorie WHERE statut = 'inactive') AS total_categories_inactifs
                ";  
        $stmt = $this->dashboard_dao->getConnection()->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);        
    }
   
}













?>