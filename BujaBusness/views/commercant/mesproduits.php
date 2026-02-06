<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Produits - BujaMarket</title>
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
            --danger: #ef4444;
            --success: #22c55e;
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        
        body { background: var(--bg); color: var(--text-main); }

        /* Navbar (Identique au Dashboard) */
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

        /* Contenu Principal */
        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .page-header h2 { font-size: 24px; font-weight: 800; color: var(--dark-navy); }
        
        .btn-add {
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }
        .btn-add:hover { background: var(--primary-dark); }

        /* Tableau */
        .table-card {
            background: var(--card);
            border-radius: 12px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }

        table { width: 100%; border-collapse: collapse; text-align: left; }
        
        th {
            background: #f8fafc;
            padding: 15px 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }
        
        td { padding: 15px 20px; border-bottom: 1px solid var(--border); font-size: 14px; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        
        .product-img {
            width: 50px; height: 50px;
            border-radius: 8px;
            object-fit: cover;
            background: #f1f5f9;
        }

        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .status-actif { background: #dcfce7; color: var(--success); }
        .status-inactif { background: #fee2e2; color: var(--danger); }

        .actions { display: flex; gap: 10px; }
        .btn-icon { color: var(--text-muted); font-size: 16px; transition: 0.2s; }
        .btn-icon:hover { color: var(--primary); }
        .btn-icon.delete:hover { color: var(--danger); }

    </style>
</head>
<body>

<!-- Navbar Commerçant -->
<nav class="navbar">
    <a href="index.php" class="brand"><i class="fa-solid fa-store"></i> Buja<span>Market</span></a>
    <div class="nav-menu">
        <a href="index.php?page=commercant&action=dashboard" class="nav-link">Tableau de bord</a>
        <a href="index.php?page=commercant&action=mesProduits" class="nav-link active">Mes Produits</a>
    </div>
    <div class="user-actions">
        <span style="font-size: 14px; font-weight: 600;"><?= isset($_SESSION['commercant']['nom_boutique']) ? htmlspecialchars($_SESSION['commercant']['nom_boutique']) : 'Mon Compte' ?></span>
        <a href="index.php?page=commercant&action=logoutCommercant" class="btn-logout">Déconnexion</a>
    </div>
</nav>

<div class="container">
    <div class="page-header">
        <h2>Gestion de l'inventaire</h2>
        <a href="index.php?page=commercant&action=ajouterProduitForm" class="btn-add"><i class="fa-solid fa-plus"></i> Ajouter un produit</a>
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Nom du produit</th>
                    <th>Prix</th>
                    <th>Statut</th>
                    <th>Date Ajout</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($produits)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-muted);">
                            Vous n'avez pas encore ajouté de produits.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $i = 1; // Initialisation du compteur ?>
                    <?php foreach($produits as $produit): ?>
                    <tr>
                        <td style="font-weight: 600; color: var(--text-muted);">
                            <?= $i++ // Affiche et incrémente le compteur ?>
                        </td>
                        <td>
                            <?php if(!empty($produit['image'])): ?>
                                <img src="public/images/uploads/<?= htmlspecialchars($produit['image']) ?>" alt="Img" class="product-img">
                            <?php else: ?>
                                <div class="product-img" style="display:flex;align-items:center;justify-content:center;"><i class="fa-solid fa-image"></i></div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong><?= htmlspecialchars($produit['nom_produit']) ?></strong><br>
                            <span style="font-size:12px; color:var(--text-muted);"><?= htmlspecialchars($produit['quartier']) ?></span>
                        </td>
                        <td style="font-weight: 600;"><?= number_format($produit['prix'], 0, ',', ' ') ?> BIF</td>
                        <td>
                            <span class="status-badge <?= ($produit['statut'] == 'actif') ? 'status-actif' : 'status-inactif' ?>">
                                <?= htmlspecialchars($produit['statut']) ?>
                            </span>
                        </td>
                        <td><?= date('d/m/Y', strtotime($produit['date_publication'])) ?></td>
                        <td class="actions">
                            <a href="index.php?page=commercant&action=updateProduitForm&id=<?= $produit['id_produit'] ?>" class="btn-icon" title="Modifier"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="index.php?page=commercant&action=deleteProduit&id=<?= $produit['id_produit'] ?>" class="btn-icon delete" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')"><i class="fa-solid fa-trash"></i></a>
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