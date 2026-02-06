<?php
class Categorie{
    private $id_categorie;
    private $nom_categorie;
    private $description;
    private $statut;
    private $icone;

    public function __construct($id_categorie = null,$nom_categorie = null,$description = null,$statut = null,$icone = null)
    {
        $this->id_categorie = $id_categorie;
        $this->nom_categorie = $nom_categorie;
        $this->description = $description;
        $this->statut = $statut;
        $this->icone = $icone;
    }

    // Getters ET SETTERS
   public function getIdCategorie(){    
        return $this->id_categorie;
    }

    public function getNomCategorie(){
        return $this->nom_categorie;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getStatut(){
        return $this->statut;
    }

    public function getIcone(){
        return $this->icone;
    }

    //seters
    public function setIdCategorie($id_categorie){  
        $this->id_categorie = $id_categorie;
    }
    public function setNomCategorie($nom_categorie){
        $this->nom_categorie = $nom_categorie;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setStatut($statut){
        $this->statut = $statut;
    }
    public function setIcone($icone){
        $this->icone = $icone;
    }
    
}










?>