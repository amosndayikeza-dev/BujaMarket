<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ ."/../dao/ProductDAO.php";
require_once __DIR__."/../config/Database.php";

/**
 * Service gérant la logique métier liée aux produits.
 */
class ProduitService{
    private ProductDAO $product_dao;
    public function __construct()
    {
        $this->product_dao = new ProductDAO;
    }

    /**
     * Publie un nouveau produit.
     */
    public function publishProduit($nom_produit, $prix, $description, $image, $quartier, $id_commercant, $id_categorie){
        $produit = new Produit(null, $nom_produit, $prix, $description, $image, $quartier, date('Y-m-d H:i:s'), 'actif', $id_commercant, $id_categorie);
        return $this->product_dao->CreateProduit($produit);
    
    }
    public function removeProduit($id_produit){
        return $this->product_dao->DeleteProduit($id_produit);
    }

    /**
     * Désactive un produit (soft delete ou changement de statut).
     */
    public function disableProduit($id_produit){
        $produit = new Produit($id_produit, null, null, null, null, null, null, 'inactif', null, null);
        return $this->product_dao->UpdateProduit($produit);
    }
   
    public function getAllProduits(){
        return $this->product_dao->GetALLProduit();
    }   
    /**
     * Récupère les produits les plus récents pour l'accueil.
     */
    public function getProduitsRecents(){
            return $this->product_dao->getRecentProducts();
    }
    public function getProduitById($id_produit){
        return $this->product_dao->GetProduitByID($id_produit);
    }

    public function search($keyword){
        return $this->product_dao->search($keyword);
    }
    public function updateProduit($id_produit, $nom_produit, $prix, $description, $image, $quartier){  
        return $this->product_dao->UpdateProduit($id_produit);
 
    }
    public function countProduits(){
        return $this->product_dao->countAll();
    }
    public function countProduitsActifs(){
        return $this->product_dao->countActive();
    }
    public function countProduitsInactifs(){
        return $this->product_dao->countInactive();
    }
    /**
     * Trouve les produits appartenant à une catégorie spécifique.
     */
    public function getProduitsByCategorie($id_categorie){
        return  $this->product_dao->findProduitByCategorie($id_categorie);
    }
    /**
     * Trouve les produits d'un commerçant spécifique.
     */
    public function getProduitsByCommercant($id_commercant){

        return  $this->product_dao->findByCommercant($id_commercant);
    }
    /**
     * Récupère les statistiques pour le dashboard commerçant.
     */
    public function getCommercantStats($id_commercant){
        return $this->product_dao->getCommercantStats($id_commercant);
    }
    public function getAdminStats(){
        return $this->product_dao->getAdminStats();
    }



}










?>