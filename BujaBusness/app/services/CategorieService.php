<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ ."/../dao/CategorieDAO.php";
require_once __DIR__."/../config/Database.php";

/**
 * Service gérant la logique métier liée aux catégories.
 */
class CategorieService{
    private CategorieDAO $categorieDAO;
    public function __construct(){
        $this->categorieDAO = new CategorieDAO();
    }
    /**
     * Crée une nouvelle catégorie.
     */
    public function createCategorie($nom_categorie, $description, $icone){
        // Création de l'objet Categorie avec le statut 'actif' par défaut
        $categorie = new Categorie(null, $nom_categorie, $description, 'actif', $icone);
        return $this->categorieDAO->CreateCategorie($categorie);
    }
    public function editCategorie($id_categorie, $nom_categorie, $description, $icone){
        $categorie = new Categorie($id_categorie, $nom_categorie, $description, 'active', $icone);
        return $this->categorieDAO->UpdateCategorie($categorie);
    }
    public function disableCategorie($id_categorie){
        $categorie = new Categorie($id_categorie, null, null, 'inactive', null);
        return $this->categorieDAO->UpdateCategorie($categorie);
    }
    public function updateCategorie($nom_categorie, $description,$statut, $icone){
        $categorie = new Categorie( $nom_categorie, $description, 'active', $icone);
        return $this->categorieDAO->UpdateCategorie($categorie);
    }

    /**
     * Récupère toutes les catégories (actives et inactives).
     */
    public function getAllCategories(){
        return $this->categorieDAO->GetAllCategories();
    }
    /**
     * Récupère uniquement les catégories actives (pour l'affichage public).
     */
    public function getActivesCategories(){
        return $this->categorieDAO->ActivesCategories();
    }
    public function getInactiveCategories(){
        return $this->categorieDAO->InactiveCategories();
    }
}













?>
