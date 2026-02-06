<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Commerçants - Netlify Style</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/listCommercant.css">
    <style>
        

    </style>
</head>
<body>
    
<!-- Conteneur principal du tableau de bord -->
<div class="dashboard-container">
    <?php
        // Inclusion de l'en-tête commun du tableau de bord
        include __DIR__. "/../layouts/headerDashboard.php";
        
    ?>
    <!-- En-tête de la section de la table -->
    <div class="table-header">
        <div class="table-title">
            <h2>Liste des Commerçants</h2>
            <p>Gestion des comptes et des boutiques partenaires</p>
        </div>
        <!-- Bouton pour ajouter un nouveau commerçant -->
        <a href="index.php?page=admin&action=createCommercant" class="btn-add">
            <i class="fa fa-plus"></i> Nouveau Commerçant
        </a>
    </div>

    <!-- Conteneur responsive pour la table, permet le défilement horizontal sur petits écrans -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Boutique</th>
                    <th>Propriétaire</th>
                    <th>Contact</th>
                    <th>Localisation</th>
                    <th>Date d'inscription</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Vérifie si le tableau des commerçants est vide -->
                <?php if (empty($commercants)): ?>
                    <tr>
                        <!-- Affiche un message si aucun commerçant n'est trouvé -->
                        <td colspan="7" style="text-align: center; padding: 40px;">Aucun commerçant trouvé.</td>
                    </tr>
                <?php else: ?>
                    <!-- Boucle sur chaque commerçant pour l'afficher dans une ligne du tableau -->
                    <?php foreach($commercants as $commercant): ?>
                    <tr>
                        <!-- Colonne Boutique : Affiche l'icône, le nom et l'ID -->
                        <td>
                            <div class="shop-info">
                                <div class="shop-icon"><?= htmlspecialchars(strtoupper(substr($commercant->getNomBoutique(), 0, 1))) ?></div>
                                <div>
                                    <strong><?= htmlspecialchars($commercant->getNomBoutique()) ?></strong><br>
                                    <small style="color:#8899a6">ID: #<?= htmlspecialchars($commercant->getIdCommercant()) ?></small>
                                </div>
                            </div>
                        </td>
                        <!-- Colonne Propriétaire -->
                        <td><?= htmlspecialchars($commercant->getNomProprietaire()) ?></td>
                        <td>
                            <!-- Colonne Contact : Affiche le numéro WhatsApp et l'email -->
                            <span style="font-size: 13px;">
                                <?php if ($commercant->getTelephoneWhatsapp()): ?>
                                <i class="fab fa-whatsapp" style="color:#22c55e"></i> <?= htmlspecialchars($commercant->getTelephoneWhatsapp()) ?><br>
                                <?php endif; ?>
                                <i class="fa fa-envelope" style="color:#a0aec0"></i> <?= htmlspecialchars($commercant->getEmail()) ?>
                            </span>
                        </td>
                        <!-- Colonne Localisation -->
                        <td><?= htmlspecialchars($commercant->getQuartier()) ?></td>
                        <td>
                            <!-- Colonne Date d'inscription : Formate la date pour une meilleure lisibilité -->
                            <?php
                            $dateInscription = $commercant->getDateInscription();
                            if ($dateInscription) {
                                echo date('d M Y', strtotime($dateInscription));
                            } else {
                                echo 'N/A'; // Ou un autre texte de remplacement pour les dates manquantes
                            } ?>
                        </td>
                        <td><span class="status-pill <?= $commercant->getStatut() === 'actif' ? 'actif' : 'inactif' ?>"><?= htmlspecialchars($commercant->getStatut()) ?></span></td>
                        <!-- Colonne Actions : Contient les boutons pour modifier et supprimer -->
                        <td class="actions-cell">
                            <a href="index.php?page=admin&action=editCommercant&id=<?= $commercant->getIdCommercant() ?>" class="btn-icon" title="Modifier"><i class="fa fa-pen"></i></a>
                            <!-- Le lien de suppression inclut une confirmation JavaScript -->
                            <a href="index.php?page=admin&action=deleteCommercant&id=<?= $commercant->getIdCommercant() ?>" class="btn-icon" title="Supprimer" style="color:var(--danger)" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commerçant ?');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>