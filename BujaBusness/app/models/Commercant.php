<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Commercant{
    private $id_commercant;
    private $nom_boutique;
    private $nom_proprietaire;
    private $email;
    private $mot_de_passe;
    private $telephone_whatsapp;
    private $quartier;
    private $date_inscription;
    private $statut;


    public function __construct($id_commercant,$nom_boutique,$nom_proprietaire,$email,$mot_de_passe,$telephone_whatsapp,$quartier,$statut,$date_inscription){
        $this->id_commercant = $id_commercant;
        $this->nom_boutique = $nom_boutique;
        $this->nom_proprietaire = $nom_proprietaire;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->quartier = $quartier;
        $this->date_inscription = $date_inscription;
        $this->telephone_whatsapp = $telephone_whatsapp;
        $this->statut = $statut;
    }
    
    // Getters ET SETTERS
    public function getIdCommercant(){  
        return $this->id_commercant;
    }
    public function getNomBoutique(){
        return $this->nom_boutique;
    }


    public function getNomProprietaire(){
        return $this->nom_proprietaire;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getMotDePasse(){
        return $this->mot_de_passe;
    }
    public function getTelephoneWhatsapp(){
        return $this->telephone_whatsapp;
    }
    public function getQuartier(){
        return $this->quartier;
    }
    public function getDateInscription(){
        return $this->date_inscription;
    }
    public function getStatut(){
        return $this->statut;
    }

    //seters
    public function setIdCommercant($id_commercant){
        $this->id_commercant = $id_commercant;
    }
    public function setNomBoutique($nom_boutique){
        $this->nom_boutique = $nom_boutique;
    }
    public function setNomProprietaire($nom_proprietaire){
        $this->nom_proprietaire = $nom_proprietaire;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setMotDePasse($mot_de_passe){
        $this->mot_de_passe = $mot_de_passe;
    }
    public function setTelephoneWharsapp($telephone_whatsapp){
        $this->telephone_whatsapp = $telephone_whatsapp;
    }
    public function setQuartier($quartier){
        $this->quartier = $quartier;
    }
    public function setDateInscription($date_inscription){
        $this->date_inscription = $date_inscription;
    }
    public function setStatut($statut){
        $this->statut = $statut;
    }
    
}






?>