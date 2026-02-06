<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ ."/../dao/CommercanrDAO.php";
require_once __DIR__."/../config/Database.php";

/**
 * Service gérant la logique métier liée aux commerçants.
 */
class CommercantService{
    private CommercantDAO $commercantDAO;

    public function __construct(){
        $this->commercantDAO = new CommercantDAO();
    }

    /**
     * Enregistre un nouveau commerçant avec hachage du mot de passe.
     */
    public function registerCommercant($nom_boutique, $nom_proprietaire, $email, $mot_de_passe, $telephone_whatsapp, $quartier){
        $hashedPassword = password_hash($mot_de_passe, PASSWORD_BCRYPT);
        $commercant = new Commercant(null, $nom_boutique, $nom_proprietaire, $email, $hashedPassword, $telephone_whatsapp, $quartier, 'actif', date('Y-m-d H:i:s'));
        return $this->commercantDAO->CreateCommercant($commercant);
    }
    /**
     * Vérifie les identifiants pour la connexion.
     */
    public function loginCommercant($email, $mot_de_passe){
        $commercantData = $this->commercantDAO->GetCommercantByEmail($email);
        if($commercantData && password_verify($mot_de_passe, $commercantData->getMotDePasse())){
            return $commercantData;
        }else{
            // Authentication failed
            return null;
        }
    }
    /**
     * Déconnecte le commerçant (détruit la session).
     */
    public function logoutCommercant(){
        // Logic for logging out the commercant (e.g., destroying session)
        session_start();
        session_unset();
        session_destroy();
    }
    public function updateProfile($id_commercant, $nom_boutique, $nom_proprietaire, $email, $telephone_whatsapp, $quartier){
        $commercant = new Commercant($id_commercant, $nom_boutique, $nom_proprietaire, $email, null, $telephone_whatsapp, $quartier, 'active', null);
        return $this->commercantDAO->UpdateCommercant($commercant);
    }

    public function changePassword($id_commercant, $new_mot_de_passe){
        $hashedPassword = password_hash($new_mot_de_passe, PASSWORD_BCRYPT);
        $commercant = new Commercant($id_commercant, null, null, null, $hashedPassword, null, null, 'active', null);
        return $this->commercantDAO->UpdateCommercant($commercant);
    }
    public function suspendCommercant($id_commercant){
        $commercant = new Commercant($id_commercant, null, null, null, null, null, null, 'inactif', null);
        return $this->commercantDAO->UpdateCommercant($commercant);
    }
    public function activateCommercant($id_commercant){
        $commercant = new Commercant($id_commercant, null, null, null, null, null, null, 'actif', null);
        return $this->commercantDAO->UpdateCommercant($commercant);
    }
    public function deleteCommercant($id_commercant){
        return $this->commercantDAO->DeleteCommercant($id_commercant);
    }
    public function getCommercantById($id_commercant){
        return $this->commercantDAO->GetCommercantById($id_commercant);
    }
    public function getAllCommercants(){
        return $this->commercantDAO->GetAllCommercants();
    }

    public function getCommercantStats($id_commercant){
        return $this->commercantDAO->getCommercantStats($id_commercant);
    }
    /*public function getCommercantByEmail($email){
        return $this->commercantDAO->GetCommercantByEmail($email);
    }
    public function countCommercants(){
        return $this->commercantDAO->CountCommercants();
    }
    public function countActiveCommercants(){
        return $this->commercantDAO->CountActiveCommercants();
    }
    public function countSuspendedCommercants(){
        return $this->commercantDAO->CountSuspendedCommercants();
    }
     public function changePassword($id_commercant, $new_mot_de_passe){
        $hashedPassword = password_hash($new_mot_de_passe, PASSWORD_BCRYPT);
        $commercant = new Commercant($id_commercant, null, null, null, $hashedPassword, null, null, 'active', null);
        return $this->commercantDAO->UpdateCommercant($commercant);
}*/
}




?>