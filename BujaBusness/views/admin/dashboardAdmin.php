<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Admin Panel | Marketplace</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="public/assets/css/dashboardAdmin.css">
<style>

</style>
</head>
<body>

<!-- Barre de navigation de l'administration -->
<nav class="navbar">
  <div class="nav-logo">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 19h20L12 2z"/></svg>
    Buja Busness<span>Market</span>
  </div>
  
  <div class="nav-links">
    <a href="index.php?page=admin&action=dashboard" class="nav-item active">Vue d'ensemble</a>
    <a href="index.php?page=admin&action=manageCommercants" class="nav-item">Commerçants</a>
    <a href="index.php?page=admin&action=manageProduits" class="nav-item">Produits</a>
    <a href="index.php?page=admin&action=manageCategories" class="nav-item">Catégories</a>
    <a href="#" class="nav-item">Signalements</a>
  </div>

  <!-- Actions de la barre de navigation (déconnexion) -->
  <div class="nav-actions">
    <button class="btn-nav btn-logout">Déconnexion</button>
  </div>
</nav>

<!-- Conteneur principal du contenu -->
<div class="main-wrapper">
  
  <!-- Section de bienvenue -->
  <div class="welcome-section">
    <h1>Bonjour, Administrateur 👋</h1>
    <p style="color: var(--text-muted);">Voici ce qui se passe sur votre marketplace aujourd'hui.</p>
  </div>

  <!-- Bandeau avec les statistiques clés -->
  <div class="stats-strip">
    <div class="stat-box">
      <span>Ventes Globales</span>
      <h2>1.2M BIF</h2>
    </div>
    <div class="stat-box">
      <span>Nouveaux Inscrits</span>
      <h2>+14</h2>
    </div>
    <div class="stat-box" style="background: white; border: 1px solid var(--border); color: var(--dark-navy);">
      <span style="color: var(--text-muted);">Alertes en attente</span>
      <h2 style="color: var(--danger);">03</h2>
    </div>
  </div>

  <!-- Cartes d'actions rapides -->
  <div class="quick-actions">
    
    <div class="action-card">
      <div>
        <h3>Gestion des Commerçants</h3>
        <p>Validez les nouveaux comptes ou gérez les boutiques existantes.</p>
      </div>
      <div class="btn-group">
        <a href="index.php?page=admin&action=manageCommercants" class="btn-action">Voir la liste</a>
        <!--<a href="index.php?page=admin&action=createCommercant" class="btn-action primary">+ Ajouter</a>-->
      </div>
    </div>

    <div class="action-card">
      <div>
        <h3>Gestion du Catalogue</h3>
        <p>Modifiez les prix, changez les catégories ou supprimez des articles.</p>
      </div>
      <div class="btn-group">
        <a href="index.php?page=admin&action=manageCategories" class="btn-action">Gérer les catégories</a>
        <!--<a href="index.php?page=produit&action=create" class="btn-action primary">+ Publier</a>-->
      </div>
    </div>

  </div>

  <!-- Section pour les activités récentes ou les logs -->
  <div style="background: white; border: 1px solid var(--border); border-radius: 8px; padding: 24px;">
     <h4 style="margin-bottom: 20px;">Dernières activités système</h4>
     <div style="color: var(--text-muted); font-size: 14px; text-align: center; padding: 40px;">
       Aucune action suspecte détectée ces dernières 24h.
     </div>
  </div>

</div>
<!-- Inclusion du pied de page commun -->
<?php
    include __DIR__ ."/../../views/layouts/footer.php";
?>
</body>
</html>