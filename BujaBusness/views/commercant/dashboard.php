<!-- Tableau de bord du commerçant -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord - Commerçant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #25c1b1;
            --primary-dark: #1e9d90;
            --dark-navy: #0e1e25;
            --bg: #f9fafb;
            --card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        
        body { background: var(--bg); color: var(--text-main); }

        /* Navbar simplifiée pour le commerçant */
        .navbar {
            background: var(--card);
            border-bottom: 1px solid var(--border);
            padding: 0 30px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .brand { font-weight: 800; font-size: 20px; color: var(--dark-navy); display: flex; align-items: center; gap: 8px; text-decoration: none; }
        .brand span { color: var(--primary); }
        
        .nav-menu { display: flex; gap: 20px; }
        .nav-link { text-decoration: none; color: var(--text-muted); font-weight: 600; font-size: 14px; transition: 0.2s; }
        .nav-link:hover, .nav-link.active { color: var(--primary); }
        
        .user-actions { display: flex; align-items: center; gap: 15px; }
        .btn-logout { color: #ef4444; text-decoration: none; font-size: 14px; font-weight: 600; }

        /* Contenu du Dashboard */
        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
        
        .welcome-banner { margin-bottom: 30px; }
        .welcome-banner h1 { font-size: 26px; font-weight: 800; color: var(--dark-navy); }
        .welcome-banner p { color: var(--text-muted); margin-top: 5px; }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--card);
            padding: 25px;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }
        
        .stat-card h3 { font-size: 32px; font-weight: 800; color: var(--dark-navy); margin: 10px 0 5px; }
        .stat-card span { font-size: 14px; color: var(--text-muted); font-weight: 500; }
        .stat-icon { width: 40px; height: 40px; background: #f0fdfa; color: var(--primary); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 18px; margin-bottom: 10px; }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .action-card {
            background: var(--card);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border);
            text-align: center;
            transition: transform 0.2s;
        }
        .action-card:hover { transform: translateY(-3px); border-color: var(--primary); }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
            width: 100%;
            margin-top: 20px;
        }
        
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-dark); }
        
        .btn-outline { background: white; border: 1px solid var(--border); color: var(--text-main); }
        .btn-outline:hover { border-color: var(--primary); color: var(--primary); }

    </style>
</head>
<body>

<!-- Barre de navigation supérieure -->
<nav class="navbar">
    <a href="index.php" class="brand"><i class="fa-solid fa-store"></i> Buja<span>Market</span></a>
    <div class="nav-menu">
        <a href="index.php?page=commercant&action=dashboard" class="nav-link active">Tableau de bord</a>
        <a href="index.php?page=commercant&action=mesProduits" class="nav-link">Mes Produits</a>
    </div>
    <div class="user-actions">
        <span style="font-size: 14px; font-weight: 600;"><?= isset($_SESSION['commercant']['nom_boutique']) ? htmlspecialchars($_SESSION['commercant']['nom_boutique']) : 'Mon Compte' ?></span>
        <a href="index.php?page=commercant&action=logoutCommercant" class="btn-logout">Déconnexion</a>
    </div>
</nav>

<!-- Contenu principal -->
<div class="container">
    <div class="welcome-banner">
        <h1>Bonjour, <?= isset($_SESSION['commercant']['nom_proprietaire']) ? htmlspecialchars($_SESSION['commercant']['nom_proprietaire']) : 'Partenaire' ?> 👋</h1>
        <p>Voici un aperçu de l'activité de votre boutique aujourd'hui.</p>
    </div>

    <!-- Grille des statistiques -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-box"></i></div>
            <span>Total Produits en ligne</span>
            <h3><?= isset($stats) ? $stats : 0 ?></h3>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-check-circle"></i></div>
            <span>Statut du compte</span>
            <h3 style="font-size: 18px; margin-top: 18px; color: var(--primary);">Actif</h3>
        </div>
    </div>

    <!-- Actions rapides -->
    <h3 style="margin-bottom: 20px; color: var(--dark-navy);">Que voulez-vous faire ?</h3>
    <div class="actions-grid">
        <div class="action-card">
            <div style="font-size: 40px; color: var(--primary); margin-bottom: 15px;"><i class="fa-solid fa-plus-circle"></i></div>
            <h3>Ajouter un produit</h3>
            <p>Mettez en ligne un nouvel article avec photos et description.</p>
            <a href="index.php?page=commercant&action=ajouterProduitForm" class="btn btn-primary">Publier maintenant</a>
        </div>

        <div class="action-card">
            <div style="font-size: 40px; color: var(--text-muted); margin-bottom: 15px;"><i class="fa-solid fa-list"></i></div>
            <h3>Gérer l'inventaire</h3>
            <p>Modifiez les prix, supprimez des articles ou mettez à jour les stocks.</p>
            <a href="index.php?page=commercant&action=mesProduits" class="btn btn-outline">Voir mes produits</a>
        </div>
    </div>
</div>

</body>
</html>