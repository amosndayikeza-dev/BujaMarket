<!-- Page d'accueil principale -->
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Bujua Market | Netlify Style</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="public/assets/css/home.css">
<style>
:root{
  /* Palette Netlify Homepage */
  --netlify-navy: #0e1e25;      /* Le fond sombre iconique */
  --netlify-teal: #25c1b1;      /* La couleur d'accent (logo/boutons) */
  --netlify-teal-dark: #1e9d90;
  --netlify-surface: #172a32;   /* Couleur des cartes et inputs sur fond sombre */
  --netlify-border: #263941;
  --text-white: #ffffff;
  --text-muted: #94a3b8;
  --radius: 12px;               /* Netlify utilise des rayons plus modérés */
}

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Poppins',sans-serif;
  text-decoration: none;
}

body{
  background: var(--netlify-navy);
  color: var(--text-white);
  line-height: 1.5;
}

/* --- HEADER PRINCIPAL --- */
/* --- NOUVEAU HEADER --- */
.main-header {
  padding: 20px 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid var(--netlify-border);
  background: var(--netlify-navy);
  position: sticky;
  top: 0;
  z-index: 100;
}

.brand {
  font-size: 20px;
  font-weight: 800;
  color: var(--text-white);
  display: flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
}

.brand span {
  color: var(--netlify-teal);
}

.nav-icons {
  display: flex;
  gap: 15px;
  color: var(--text-muted);
  font-size: 18px;
}

/* --- BARRE DE RECHERCHE --- */
/* SEARCH */
.search{
  padding: 25px 15px 10px;
}

.search-box{
  background: var(--netlify-surface);
  border: 1px solid var(--netlify-border);
  border-radius: var(--radius);
  display: flex;
  align-items: center;
  padding: 12px 18px;
  transition: border-color 0.3s;
}

.search-box:focus-within {
  border-color: var(--netlify-teal);
}

.search-box i{
  color: var(--text-muted);
  font-size: 18px;
  margin-right: 12px;
}

.search-box input{
  border: none;
  outline: none;
  width: 100%;
  font-size: 15px;
  background-color: transparent;
  color: var(--text-white);
}

.search-box input::placeholder {
  color: var(--text-muted);
}

/* --- LISTE DES CATÉGORIES --- */
/* CATEGORIES */
.categories{
  display: flex;
  gap: 10px;
  padding: 15px;
  overflow-x: auto;
  scrollbar-width: none; /* Cache scrollbar Firefox */
}

.categories::-webkit-scrollbar { display: none; } /* Cache scrollbar Chrome */

.category{
  padding: 8px 20px;
  border-radius: 20px;
  background: var(--netlify-surface);
  border: 1px solid var(--netlify-border);
  font-size: 14px;
  font-weight: 500;
  white-space: nowrap;
  cursor: pointer;
  color: var(--text-muted);
  transition: all 0.2s ease;
}

.category.active,
.category:hover{
  background: var(--netlify-teal);
  border-color: var(--netlify-teal);
  color: var(--netlify-navy);
  font-weight: 600;
}

/* --- GRILLE DES PRODUITS --- */
/* PRODUCTS GRID */
.products{
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 20px;
  padding: 20px;
}

.product{
  background: var(--netlify-surface);
  border-radius: var(--radius);
  overflow: hidden;
  border: 1px solid var(--netlify-border);
  transition: transform 0.3s ease, border-color 0.3s ease;
  animation: fadeUp 0.6s ease;
}

.product:hover{
  transform: translateY(-5px);
  border-color: var(--netlify-teal);
}

.product img{
  width: 100%;
  height: 220px;
  object-fit: cover;
}

.product-info{
  padding: 18px;
}

.price p {
  font-size: 14px;
  color: var(--text-muted);
  margin-bottom: 5px;
}

.price span{
  font-size: 20px;
  font-weight: 700;
  color: var(--text-white);
  display: block;
  margin-bottom: 12px;
}

.location{
  font-size: 13px;
  color: var(--text-muted);
  display: flex;
  align-items: center;
  gap: 6px;
  margin-top: 15px;
  padding-top: 15px;
  border-top: 1px solid var(--netlify-border);
}

.location i { color: var(--netlify-teal); }

/* ACTIONS */
.btn-details-outline {
  display: block;
  text-align: center;
  padding: 10px;
  font-size: 13px;
  border: 1.5px solid var(--netlify-teal);
  color: var(--netlify-teal);
  font-weight: 600;
  text-decoration: none;
  border-radius: 8px;
  transition: all 0.2s;
}

.btn-details-outline:hover {
  background-color: var(--netlify-teal);
  color: var(--netlify-navy);
}

/* FLOAT BUTTON */
.publish-btn{
  position: fixed;
  bottom: 25px;
  right: 25px;
  background: var(--netlify-teal);
  color: var(--netlify-navy);
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  box-shadow: 0 10px 25px rgba(37, 193, 177, 0.3);
  cursor: pointer;
  transition: 0.3s;
}

.publish-btn:hover {
  transform: scale(1.1) rotate(90deg);
  background: var(--netlify-teal-dark);
}

@keyframes fadeUp{
  from{opacity:0; transform:translateY(15px);}
  to{opacity:1; transform:translateY(0);}
}

/* Adaptation Header Navbar Mobile (si inclus via PHP) */
header {
  border-bottom: 1px solid var(--netlify-border);
}

</style>
</head>

<body>
<!-- En-tête avec Logo et Icônes -->
<header class="main-header">
  <a href="#" class="brand">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="var(--netlify-teal)"><path d="M12 2L2 19h20L12 2z"/></svg>
    Buja<span>Market</span>
  </a>
  <div class="nav-icons">
    <i class="fa-regular fa-bell"></i>
    <i class="fa-regular fa-user"></i>
  </div>
</header>

<!-- Barre de recherche -->
<div class="search">
  <div class="search-box">
  <form method="GET" action="index.php">
    <input type="hidden" name="page" value="produit">
    <input type="hidden" name="action" value="search">
    <i class="fa fa-search"></i>
    <input type="text" id="search" name="keyword" placeholder="Rechercher sur le market..." required>
  </form>
  </div>
</div>

<!-- Filtres par Catégories -->
<div class="categories">
  <!-- Le bouton "Tous" est actif si aucun id_categorie n'est dans l'URL -->
  <a href="index.php?page=home&action=index" class="category <?= !isset($_GET['id_categorie']) ? 'active' : '' ?>">
      Tous
  </a>
  <?php foreach($categories as $cat): ?>
  <!-- Le bouton de la catégorie est actif si son ID correspond à celui dans l'URL -->
  <a href="index.php?page=home&action=index&id_categorie=<?= $cat['id_categorie'] ?>" class="category <?= (isset($_GET['id_categorie']) && $_GET['id_categorie'] == $cat['id_categorie']) ? 'active' : '' ?>">
      <?= htmlspecialchars($cat['nom_categorie']) ?>
  </a>
  <?php endforeach; ?>
</div>

<!-- Liste des Produits -->
<div class="products" id="products">
  <?php if (!empty($produits)): ?>
    <?php  foreach($produits as $p):?>
    <div class="product" data-name="<?= htmlspecialchars($p['nom_produit']) ?>" data-cat="<?= $p['id_categorie'] ?>">
      <img src="public/images/uploads/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['nom_produit']) ?>">
      <div class="product-info">
        <div class="price">
          <p><?= htmlspecialchars($p['nom_produit']) ?> </p>
          <span> <?= htmlspecialchars($p['prix']) ?> BIF</span>
          <a href="index.php?page=produit&action=show&id=<?= $p['id_produit'] ?>" class="btn-details-outline">Détails du produit</a>
        </div>
        <div class="location"><i class="fa fa-location-dot"></i> <?= htmlspecialchars($p['quartier']) ?></div>
      </div>
    </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--text-muted);">Aucun produit trouvé dans cette catégorie.</p>
  <?php endif; ?>
</div>

<!-- Bouton flottant pour ajouter un produit -->
<div class="publish-btn">
  <i class="fa fa-plus">
  </i>
</div>

<script>
const search = document.getElementById("search");
const products = document.querySelectorAll(".product");
const categories = document.querySelectorAll(".category");

search.addEventListener("input",()=>{
  const value = search.value.toLowerCase();
  products.forEach(p=>{
    p.style.display = p.dataset.name.toLowerCase().includes(value) ? "block" : "none";
  });
});

/* La logique de filtrage par catégorie est maintenant gérée côté serveur.
   Ce code JS n'est plus nécessaire pour les catégories, mais reste utile pour la recherche. */
</script>
</body>
</html>