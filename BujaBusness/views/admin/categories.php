<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Catégories - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/listCommercant.css">
    <style>
        /* Réutilisation des styles de listCommercant.css et ajout de styles spécifiques */
        .form-card {
            background: #f9fbfc;
            padding: 25px;
            border-radius: 12px;
            margin-top: 30px;
            border: 1px solid var(--n-border);
        }
        .form-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        .field {
            display: flex;
            flex-direction: column;
        }
        .field label {
            font-size: 14px;
            font-weight: 600;
            color: var(--n-navy);
            margin-bottom: 8px;
        }
        .field input, .field textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: 6px;
            border: 1px solid var(--n-border);
            background: var(--n-white);
            font-size: 15px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.2s ease;
        }
        .field input:focus, .field textarea:focus {
            outline: none;
            border-color: var(--n-teal);
            box-shadow: 0 0 0 4px rgba(32, 198, 183, 0.1);
        }
        .field textarea {
            resize: vertical;
            min-height: 80px;
        }
        .form-actions {
            margin-top: 20px;
            text-align: right;
        }
        .btn-submit {
            background: var(--n-teal);
            color: var(--n-navy);
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-submit:hover {
            background: #1e9d90; /* darker teal */
        }
    </style>
</head>
<body>

<!-- Conteneur principal du tableau de bord -->
<div class="dashboard-container">
    <?php include __DIR__ ."/../../views/layouts/headerDashboard.php"; ?>

    <!-- En-tête de la section de la table -->
    <div class="table-header">
        <div class="table-title">
            <h2>Gestion des Catégories</h2>
            <p>Ajoutez, modifiez ou supprimez les catégories de produits.</p>
        </div>
    </div>

    <!-- Conteneur responsive pour la table -->
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Icône</th>
                    <th>Nom de la catégorie</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Vérifie si le tableau des catégories est vide -->
                <?php if (empty($categories)): ?>
                    <tr>
                        <!-- Affiche un message si aucune catégorie n'est trouvée -->
                        <td colspan="6" style="text-align: center; padding: 40px;">Aucune catégorie trouvée.</td>
                    </tr>
                <?php else: ?>
                    <!-- Boucle sur chaque catégorie pour l'afficher dans une ligne du tableau -->
                    <?php foreach($categories as $categorie): ?>
                    <tr>
                        <!-- Affiche l'ID de la catégorie -->
                        <td>#<?= htmlspecialchars($categorie->getIdCategorie()) ?></td>
                        <td>
                            <!-- Affiche l'icône si elle est définie -->
                            <?php if ($categorie->getIcone()): ?>
                                <i class="<?= htmlspecialchars($categorie->getIcone()) ?>" style="font-size: 20px; color: var(--n-teal);"></i>
                            <?php endif; ?>
                        </td>
                        <!-- Affiche le nom de la catégorie -->
                        <td><strong><?= htmlspecialchars($categorie->getNomCategorie()) ?></strong></td>
                        <!-- Affiche une version tronquée de la description -->
                        <td><?= htmlspecialchars(substr($categorie->getDescription() ?? '', 0, 50)) . '...' ?></td>
                        <!-- Affiche le statut (actif/inactif) avec une pastille de couleur -->
                        <td><span class="status-pill <?= $categorie->getStatut() === 'actif' ? 'actif' : 'inactif' ?>"><?= htmlspecialchars($categorie->getStatut()) ?></span></td>
                        <!-- Cellule contenant les boutons d'action (modifier, désactiver) -->
                        <td class="actions-cell">
                            <a href="index.php?page=admin&action=editCategorie&id=<?= $categorie->getIdCategorie() ?>" class="btn-icon" title="Modifier"><i class="fa fa-pen"></i></a>
                            <a href="index.php?page=admin&action=disableCategorie&id=<?= $categorie->getIdCategorie() ?>" class="btn-icon" title="Désactiver" style="color:var(--danger)" onclick="return confirm('Êtes-vous sûr de vouloir désactiver cette catégorie ?');"><i class="fa fa-toggle-off"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Carte contenant le formulaire pour ajouter une nouvelle catégorie -->
    <div class="form-card">
        <h3>Ajouter une nouvelle catégorie</h3>
        <!-- Formulaire de création de catégorie -->
        <form method="post" action="index.php?page=admin&action=storeCategorie">
            <!-- Grille pour aligner les champs -->
            <div class="form-grid">
                <!-- Champ pour le nom de la catégorie -->
                <div class="field">
                    <label for="nom_categorie">Nom de la catégorie</label>
                    <input type="text" id="nom_categorie" name="nom_categorie" placeholder="Ex: Électronique" required>
                </div>
                <!-- Champ pour la classe de l'icône (ex: FontAwesome) -->
                <div class="field">
                    <label for="icone">Classe de l'icône (FontAwesome)</label>
                    <input type="text" id="icone" name="icone" placeholder="Ex: fas fa-mobile-alt">
                </div>
            </div>
            <!-- Champ pour la description -->
            <div class="field" style="margin-top: 20px;">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="3" placeholder="Courte description de la catégorie..."></textarea>
            </div>
            <!-- Actions du formulaire (bouton de soumission) -->
            <div class="form-actions">
                <button type="submit" class="btn-submit">Enregistrer la catégorie</button>
            </div>
        </form>
    </div>

</div>

</body>
</html>