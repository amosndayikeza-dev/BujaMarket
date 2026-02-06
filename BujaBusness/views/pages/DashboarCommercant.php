<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Espace Commerçant | Netlify Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../public/assets/css/dashboardCommercant.css">
<style>

</style>
</head>
<body>
<?php
    include_once "../../views/layouts/headerDashboard.php";
?>

<div class="main-content">
  
  <div class="header-row">
    <div>
      <h1>Tableau de bord Vendeur</h1>
      <p style="color: var(--text-muted);">Gérez votre boutique et vos articles en ligne.</p>
    </div>
  </div>

  <div class="product-management">
    
    <div class="card">
      <h3>Gestion du Catalogue</h3>
      <p>Ajoutez de nouveaux articles à votre boutique ou mettez à jour vos stocks et prix actuels pour attirer plus de clients.</p>
      
      <div class="cta-group">
        <a href="index.php?page=produit&action=create" class="btn btn-primary">+ Publier un produit</a>
        <a href="index.php?page=commercant&action=products" class="btn btn-outline">Voir mon inventaire</a>
      </div>
    </div>

    <div class="card">
      <h3 style="font-size: 15px;">Résumé rapide</h3>
      <div class="mini-stats">
        <div class="stat-item">
          <label>Produits en ligne</label>
          <div>14</div>
        </div>
        <div class="stat-item" style="border-left-color: #6366f1;">
          <label>Vues totales</label>
          <div>1,248</div>
        </div>
      </div>
    </div>

  </div>

  <div class="card" style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center; padding: 20px;">
    <div>
      <h4 style="font-size: 14px;">Informations du compte</h4>
      <p style="margin-bottom: 0; font-size: 13px;">Votre boutique est actuellement <strong>Active</strong> et visible.</p>
    </div>
    <a href="profil.html" class="btn btn-outline" style="padding: 8px 16px;">Modifier mon profil</a>
  </div>

</div>

</body>
</html>