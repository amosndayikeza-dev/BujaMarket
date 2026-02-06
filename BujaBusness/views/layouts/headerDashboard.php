<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
  --danger: #df3b3b;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Inter', sans-serif;
}

body {
  background: var(--bg);
  color: var(--text-main);
}

/* NAVIGATION COMMERÇANT */
.navbar {
  background: var(--card);
  color: var(--text-main);
  padding: 0 40px;
  height: 70px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: sticky;
  top: 0;
  z-index: 1000;
  border-bottom: 1px solid var(--border);
}

.nav-logo {
  font-weight: 800;
  font-size: 18px;
  color: var(--dark-navy);
  display: flex;
  align-items: center;
  gap: 8px;
}

.nav-logo span { color: var(--primary); }

.nav-links {
  display: flex;
  gap: 24px;
}

.nav-item {
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
  color: var(--text-muted);
  transition: color 0.2s;
}

.nav-item:hover { color: var(--primary); }
.user-menu {
  display: flex;
  align-items: center;
  gap: 15px;
}

.profile-link {
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  color: var(--text-main);
  font-size: 14px;
  font-weight: 500;
}

.avatar {
  width: 35px;
  height: 35px;
  background: var(--primary);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
}

.btn-logout {
  color: var(--danger);
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  background: none;
  border: none;
}

/* MAIN CONTENT */
.main-content {
  max-width: 1000px;
  margin: 40px auto;
  padding: 0 20px;
}

.header-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 30px;
}

.header-row h1 {
  font-size: 24px;
  font-weight: 800;
}

/* GRID DES ACTIONS PRODUITS */
.product-management {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 20px;
}

@media (max-width: 768px) {
  .product-management { grid-template-columns: 1fr; }
}
/* ... Tes styles existants ... */

/* ADAPTATION DU HEADER POUR PETITS ÉCRANS */
@media (max-width: 768px) {
    .navbar {
        padding: 0 15px; /* Réduction de l'espace sur les côtés */
        height: 60px; /* Un peu moins haut sur mobile */
    }

    .nav-logo {
        font-size: 16px; /* Texte du logo légèrement plus petit */
    }

    .nav-links {
        display: none; /* Cache les liens centraux pour éviter l'encombrement */
    }

    .user-menu {
        gap: 8px; /* Rapproche l'avatar et le bouton quitter */
    }

    .profile-link span {
        display: none; /* Cache "Mon Profil" pour ne garder que l'avatar sur téléphone */
    }

    .btn-logout {
        font-size: 11px; /* Réduit la taille du bouton déconnexion */
    }
}
</style>

<body>
<!-- Barre de navigation pour les tableaux de bord (Admin/Commerçant) -->
<nav class="navbar">
    <!-- Logo et nom du site -->
    <div class="nav-logo">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="var(--primary)"><path d="M12 2L2 19h20L12 2z"/></svg>
        Bujumbura<span>Market</span>
    </div>
    
    <!-- Liens de navigation principaux du tableau de bord -->
    <div class="nav-links">
        <a href="index.php?page=admin&action=dashboard" class="nav-item">Mes Ventes</a>
        <a href="index.php?page=admin&action=dashboard" class="nav-item">Inventaire</a>
    </div>

    <!-- Menu utilisateur à droite -->
    <div class="user-menu">
        <!-- Lien vers le profil utilisateur -->
        <a href="#" class="profile-link">
        <div class="avatar">C</div>
        <span>Mon Profil</span>
        </a>
        <!-- Bouton de déconnexion -->
        <button class="btn-logout" onclick="alert('Déconnexion...')">
          <a href="index.php?page=auth&action=logout">
            Quitter
          </a>
        </button>
    </div>
</nav>

</body>
</html>