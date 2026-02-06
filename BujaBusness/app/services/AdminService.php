<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ ."/../dao/AdminDAO.php";
require_once __DIR__."/../config/Database.php";
require_once __DIR__ ."/../dao/CommercanrDAO.php";
require_once __DIR__."/../dao/ProductDAO.php";
require_once __DIR__ ."/../dao/CategorieDAO.php";


/**
 * Service gérant la logique métier pour la section administration.
 */
class AdminService{
    private AdminDAO $adminDAO;
    private CommercantDAO $commercant;
    private CategorieDAO $categorie;
    private  ProductDAO $produit;


    /**
     * Constructeur, initialise tous les DAOs nécessaires.
     */
    public function __construct(){
        $this->adminDAO = new AdminDAO();
        $this->commercant = new CommercantDAO();
        $this->categorie = new CategorieDAO();
        $this->produit = new ProductDAO();
    }

    /**
     * Gère la connexion d'un administrateur.
     * @param string $email_admin L'email de l'admin.
     * @param string $mot_de_passe Le mot de passe en clair.
     * @return Admin|false L'objet Admin si la connexion réussit, sinon false.
     */
    public function loginAdmin($email_admin, $mot_de_passe){
        // Récupère l'admin par email
        $admin = $this->adminDAO->getAdminByEmail($email_admin);
        if(!$admin){
            return false;
        }

        // Vérification du mot de passe haché
        if(!password_verify($mot_de_passe, $admin->getMotDePasse())){
            return false;
        }

        return $admin;
    }

    /**
     * Gère la déconnexion de l'administrateur en détruisant la session.
     */
    public function logoutAdmin(){
        // Logic for logging out the admin (e.g., destroying session)
        session_unset();
        session_destroy();
    }

    /**
     * Crée un nouvel administrateur.
     * @param Admin $admin L'objet Admin à créer.
     * @return bool
     */
    public function createAdmin(Admin $admin){
        return $this->adminDAO->createAdmin($admin);
    }
    /**
     * Récupère les statistiques pour le tableau de bord admin.
     * @return int
     */
    public function getAdminStats(){
       return $this->adminDAO->getAdminStats();
    }
    /**
     * Récupère les statistiques pour un commerçant.
     * @param int $id_commercant
     * @return int
     */
    public function getCommercantStats($id_commercant){
        return $this->commercant->getCommercantStats($id_commercant);
    }
    /**
     * Récupère tous les commerçants.
     * @return array
     */
    public function getAllCommerants(){
        return $this->commercant->getAllCommercants();
    }

    /**
     * Met à jour le profil d'un commerçant.
     */
    public function updateCommercant($id_commercant, $nom_boutique, $nom_proprietaire, $email, $telephone_whatsapp, $quartier){
        $commercant = new Commercant($id_commercant, $nom_boutique, $nom_proprietaire, $email, null, $telephone_whatsapp, $quartier, 'active', null);
        return $this->commercant->UpdateCommercant($commercant);
    }
    /**
     * Active un commerçant.
     * @param int $id_commercant
     * @param string $statut
     * @return bool
     */
    public function activateCommercant($id_commercant,$statut){
        return $this->commercant->activateStatutCommercant($id_commercant,"actif");
    }
    //suspendre commercant
    public function suspendCommercant($id_commercant){
        return $this->commercant->desactiveStatutCommercant($id_commercant,"inactif");    
    }
    //delete commercant
    public function deleteCommercant($id_commercant){
        return $this->commercant->DeleteCommercant($id_commercant);
    }

    // --- LOGIQUE MÉTIER POUR LES PRODUITS (CÔTÉ ADMIN) ---
    public function getAllProduits(){
        return $this->produit->GetALLProduit();
    }
    public function getProduitById($id_produit){
        return $this->produit->getProduitById($id_produit);
    }
    public function desableProduit($id_produit){
        return $this->produit->desableProduit($id_produit,"inactive");
    }
    public function activateProduit($id_produit){
        return $this->produit->activateProduit($id_produit,"active");
    }
    public function deleteProduit($id_produit){
        return $this->produit->deleteProduit($id_produit);
    }


    // --- LOGIQUE MÉTIER POUR LES CATÉGORIES (CÔTÉ ADMIN) ---
    public function getAllCategories(){
        return $this->categorie->getAllCategories();
    }
    public function getActivesCategories(){
        return $this->categorie->ActivesCategories();
    }
    public function getInactiveCategories(){
        return $this->categorie->InactiveCategories();
    }
    public function getCategoriesById($id_categorie){
        return $this->categorie->getCategoriesById($id_categorie);
    }
    /**
     * Crée une catégorie après avoir vérifié si elle n'existe pas déjà.
     * @param array $data Les données de la catégorie.
     * @return bool
     */
    public function createCategorie($data){
        if($this->categorie->ExistsByName($data['nom_categorie'])){
            throw new Exception("Category already exists");
        }
        return $this->categorie->createCategorie($data);
    }

    //update categorie
    public function updateCategorie($id_categorie, $nom_categorie, $description, $icone){
        $categorie = new Categorie($id_categorie, $nom_categorie, $description, 'active', $icone);
        return $this->categorie->updateCategorie($categorie);
    }

    //delete categorie
    public function deleteCategorie($id_categorie){
        return $this->categorie->deleteCategorie($id_categorie);
    }
}













?>
