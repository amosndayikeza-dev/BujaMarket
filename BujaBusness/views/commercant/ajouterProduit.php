<!-- Déclaration du type de document HTML 5 -->
<!DOCTYPE html>
<!-- Début de la balise HTML, avec la langue définie sur "fr" (français) -->
<html lang="fr">
<head>
    <!-- Définit l'encodage des caractères de la page en UTF-8, pour une compatibilité maximale avec les accents et symboles -->
    <meta charset="UTF-8">
    <!-- Titre de la page qui s'affiche dans l'onglet du navigateur -->
    <title>Ajouter un produit - BujaMarket</title>
    <!-- Meta-tag pour le responsive design, assure que la page s'adapte à la largeur de l'écran de l'appareil -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Lien vers Google Fonts pour importer la police 'Inter' -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Lien vers Font Awesome pour utiliser des icônes (via un CDN) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Début de la section de style CSS interne à la page -->
    <style>
        /* Définition des variables de couleur et de style pour une maintenance facile */
        :root {
            --primary: #25c1b1; /* Couleur principale */
            --primary-dark: #1e9d90; /* Variante plus sombre de la couleur principale (pour les survols) */
            --dark-navy: #0e1e25; /* Couleur de texte foncée */
            --bg: #f9fafb; /* Couleur de fond de la page */
            --card: #ffffff; /* Couleur de fond des cartes */
            --border: #e2e8f0; /* Couleur des bordures */
            --text: #1e293b; /* Couleur de texte par défaut */
        }
        
        /* Style pour le corps de la page */
        body { background: var(--bg); font-family: 'Inter', sans-serif; color: var(--text); padding: 20px; }
        
        /* Conteneur principal qui centre le contenu */
        .container { max-width: 600px; margin: 0 auto; }
        
        /* Style de la carte (le conteneur du formulaire) */
        .card {
            background: var(--card); /* Fond blanc */
            padding: 30px; /* Espace intérieur */
            border-radius: 12px; /* Bords arrondis */
            border: 1px solid var(--border); /* Bordure légère */
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); /* Ombre portée subtile */
        }

        /* Style de l'en-tête du formulaire */
        .header { margin-bottom: 25px; text-align: center; }
        .header h2 { color: var(--dark-navy); font-weight: 800; font-size: 24px; }
        .header p { color: #64748b; font-size: 14px; margin-top: 5px; }

        /* Style pour chaque groupe de champ du formulaire (label + input) */
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 8px; color: var(--dark-navy); font-size: 14px; }
        
        /* Style commun pour tous les champs de saisie (input, select, textarea) */
        .form-control {
            width: 100%; /* Prend toute la largeur disponible */
            padding: 12px; /* Espace intérieur */
            border: 1px solid var(--border); /* Bordure */
            border-radius: 8px; /* Bords arrondis */
            font-size: 15px; /* Taille de la police */
            outline: none; /* Supprime le contour par défaut au focus */
            transition: border-color 0.2s; /* Animation douce sur la couleur de la bordure */
            background: #fff; /* Fond blanc */
        }
        
        /* Style appliqué lorsqu'un champ est en focus (cliqué) */
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37, 193, 177, 0.1); }
        
        /* Style spécifique pour les zones de texte (textarea) */
        textarea.form-control { resize: vertical; min-height: 100px; }

        /* Style du bouton de soumission */
        .btn-submit {
            width: 100%; /* Pleine largeur */
            padding: 14px; /* Espace intérieur */
            background: var(--primary); /* Couleur de fond principale */
            color: white; /* Texte en blanc */
            border: none; /* Aucune bordure */
            border-radius: 8px; /* Bords arrondis */
            font-weight: 600; /* Texte en gras */
            font-size: 16px; /* Taille de la police */
            cursor: pointer; /* Curseur en forme de main */
            transition: background 0.2s; /* Animation douce sur la couleur de fond */
        }
        
        /* Style du bouton de soumission au survol de la souris */
        .btn-submit:hover { background: var(--primary-dark); }
        
        /* Style du lien de retour */
        .btn-back {
            display: block; /* Pour qu'il prenne toute la largeur et permette le centrage */
            text-align: center; /* Texte centré */
            margin-top: 15px; /* Marge supérieure */
            color: #64748b; /* Couleur du texte */
            text-decoration: none; /* Pas de soulignement */
            font-size: 14px; /* Taille de la police */
            font-weight: 500; /* Epaisseur de la police */
        }
        /* Style du lien de retour au survol */
        .btn-back:hover { color: var(--dark-navy); }
    </style>
</head>
<body>

<!-- Conteneur principal pour centrer le formulaire -->
<div class="container">
    <!-- La carte qui contient le formulaire -->
    <div class="card">
        <!-- En-tête de la carte -->
        <div class="header">
            <!-- Titre principal -->
            <h2>Nouveau Produit</h2>
            <!-- Paragraphe descriptif -->
            <p>Remplissez les informations pour publier votre article.</p>
        </div>

        <!-- Début du formulaire. Les données seront envoyées à `index.php` avec les paramètres `page=commercant` et `action=storeProduit` -->
        <!-- La méthode est `POST` (les données sont dans le corps de la requête) et `enctype="multipart/form-data"` est crucial pour permettre l'envoi de fichiers (l'image) -->
        <form action="index.php?page=commercant&action=storeProduit" method="POST" enctype="multipart/form-data">
            
            <!-- Groupe pour le nom du produit -->
            <div class="form-group">
                <!-- Étiquette du champ -->
                <label>Nom du produit</label>
                <!-- Champ de saisie de type texte. `name` est la clé qui sera utilisée dans `$_POST`. `required` rend le champ obligatoire. -->
                <input type="text" name="nom_produit" class="form-control" placeholder="Ex: iPhone 13 Pro" required>
            </div>

            <!-- Groupe pour la catégorie du produit -->
            <div class="form-group">
                <!-- Étiquette du champ -->
                <label>Catégorie</label>
                <!-- Champ de sélection (liste déroulante). `required` rend le champ obligatoire. -->
                <select name="id_categorie" class="form-control" required>
                    <!-- Début du code PHP pour générer les options dynamiquement -->
                    <?php if (!empty($categories)): ?>
                        <!-- Si le tableau `$categories` (envoyé par le contrôleur) n'est pas vide -->
                        <!-- Première option, vide et non sélectionnable, qui sert d'instruction -->
                        <option value="">Choisir une catégorie...</option>
                        <!-- Boucle sur chaque catégorie du tableau `$categories` -->
                        <?php foreach($categories as $cat): ?>
                            <!-- Crée une option. La `value` est l'ID de la catégorie, et le texte affiché est son nom. -->
                            <!-- `htmlspecialchars` est une sécurité pour éviter les failles XSS en affichant les données. -->
                            <option value="<?= $cat['id_categorie'] ?>"><?= htmlspecialchars($cat['nom_categorie']) ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Si le tableau `$categories` est vide -->
                        <!-- Affiche une option désactivée pour informer l'utilisateur qu'il n'y a pas de catégories. -->
                        <option value="" disabled selected>Aucune catégorie active trouvée</option>
                    <?php endif; ?>
                    <!-- Fin du code PHP -->
                </select>
            </div>

            <!-- Groupe pour le prix du produit -->
            <div class="form-group">
                <!-- Étiquette du champ -->
                <label>Prix (BIF)</label>
                <!-- Champ de saisie de type nombre. -->
                <input type="number" name="prix" class="form-control" placeholder="Ex: 1500000" required>
            </div>

            <!-- Groupe pour le quartier -->
            <div class="form-group">
                <!-- Étiquette du champ -->
                <label>Quartier</label>
                <!-- Champ de saisie de type texte. -->
                <input type="text" name="quartier" class="form-control" placeholder="Ex: Rohero I" required>
            </div>

            <!-- Groupe pour l'image du produit -->
            <div class="form-group">
                <!-- Étiquette du champ -->
                <label>Image du produit</label>
                <!-- Champ de saisie de type fichier. `accept="image/*"` limite la sélection aux fichiers de type image. -->
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <!-- Groupe pour la description du produit -->
            <div class="form-group">
                <!-- Étiquette du champ -->
                <label>Description</label>
                <!-- Zone de texte pour une description plus longue. Ce champ n'est pas obligatoire. -->
                <textarea name="description" class="form-control" placeholder="Décrivez l'état, les caractéristiques..."></textarea>
            </div>

            <!-- Bouton pour soumettre le formulaire -->
            <button type="submit" class="btn-submit">Publier le produit</button>
            <!-- Lien pour annuler et retourner au tableau de bord du commerçant -->
            <a href="index.php?page=commercant&action=dashboard" class="btn-back">Annuler et retour</a>
        </form>
        <!-- Fin du formulaire -->
    </div>
    <!-- Fin de la carte -->
</div>
<!-- Fin du conteneur principal -->

</body>
</html>