<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Produit{
    private $id_produit;
    private $nom_produit;
    private $prix;
    private $description;
    private $image;
    private $quartier;
    private $date_publication;
    private $statut;
    private $id_commercant;
    private $id_categorie;

    public function __construct($id_produit,$nom_produit,$prix,$description,$image,$quartier,$date_publication,$statut,$id_commercant,$id_categorie)
    {
        $this->id_produit = $id_produit;
        $this->nom_produit = $nom_produit;
        $this->prix = $prix;
        $this->description = $description;
        $this->image = $image;
        $this->quartier = $quartier;
        $this->date_publication = $date_publication;
        $this->statut = $statut;
        $this->id_commercant = $id_commercant;
        $this->id_categorie = $id_categorie;
    }

    // Getters ET SETTERS
   public function getIdProduit(){
        return $this->id_produit;
    }

    public function getNomProduit(){
        return $this->nom_produit;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

    public function getQuartier(){
        return $this->quartier;
    }


    public function getDatePublication(){
        return $this->date_publication;
    }

    public function getStatut(){
        return $this->statut;
    }

    public function getIdCommercant(){
        return $this->id_commercant;
    }

    public function getIdCategorie(){
        return $this->id_categorie;
    }

    // Setters
    public function setNomProduit($nom_produit){
        $this->nom_produit = $nom_produit;
    }
    public function setPrix($prix){
        $this->prix = $prix;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setImage($image){
        $this->image = $image;
    }
    public function setQuartier($quartier){
        $this->quartier = $quartier;
    }
    public function setDatePublication($date_publication){
        $this->date_publication = $date_publication;
    }
    public function setStatut($statut){
        $this->statut = $statut;
    }
    public function setIdCommercant($id_commercant){
        $this->id_commercant = $id_commercant;
    }
    public function setIdCategorie($id_categorie){
        $this->id_categorie = $id_categorie;
    }

}










?>