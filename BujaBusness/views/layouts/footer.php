<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
</head>
<style>
  .footer {
  background-color: #0f172a; /* bleu nuit */
  color: #e5e7eb;
  padding: 40px 20px 20px;
  font-size: 14px;
}

.footer-container {
  max-width: 1200px;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px;
}

.footer h3,
.footer h4 {
  color: #ffffff;
  margin-bottom: 10px;
}

.footer p {
  line-height: 1.6;
  color: #cbd5f5;
}

.footer-links ul {
  list-style: none;
  padding: 0;
}

.footer-links li {
  margin-bottom: 8px;
}

.footer-links a {
  color: #cbd5f5;
  text-decoration: none;
  transition: color 0.2s;
}

.footer-links a:hover {
  color: #14b8a6; /* accent */
}

.footer-contact p {
  margin-bottom: 10px;
}

.whatsapp-btn {
  display: inline-block;
  padding: 8px 14px;
  background-color: #14b8a6;
  color: #ffffff;
  text-decoration: none;
  border-radius: 6px;
  font-weight: 600;
  transition: background 0.2s ease;
}

.whatsapp-btn:hover {
  background-color: #0d9488;
}

.footer-bottom {
  text-align: center;
  margin-top: 30px;
  padding-top: 15px;
  border-top: 1px solid #1e293b;
  color: #94a3b8;
  font-size: 13px;
}

</style>
<body>
    <!-- Début du pied de page -->
    <footer class="footer">
  <!-- Conteneur principal du footer, utilisant une grille pour l'alignement -->
  <div class="footer-container">

    <!-- Colonne 1 : Marque et description -->
    <div class="footer-brand">
      <h3>BujaMarket</h3>
      <p>
        Trouvez des produits près de chez vous à Bujumbura.
        Contact direct avec les commerçants via WhatsApp.
      </p>
    </div>

    <!-- Colonne 2 : Liens de navigation utiles -->
    <div class="footer-links">
      <h4>Liens utiles</h4>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="index.php?page=categories">Catégories</a></li>
        <li><a href="index.php?page=contact">Contact</a></li>
      </ul>
    </div>

    <!-- Colonne 3 : Informations de contact -->
    <div class="footer-contact">
      <h4>Contact</h4>
      <p>Bujumbura, Burundi</p>
      <!-- Bouton menant vers une conversation WhatsApp -->
      <a href="https://wa.me/257XXXXXXXX" class="whatsapp-btn">
        💬 WhatsApp
      </a>
    </div>

  </div>

  <!-- Ligne inférieure du pied de page avec le copyright -->
  <div class="footer-bottom">
    <!-- Affiche l'année en cours dynamiquement -->
    © <?= date('Y') ?> BujaMarket — Tous droits réservés
  </div>
</footer>

</body>
</html>