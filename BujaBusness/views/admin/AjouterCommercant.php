<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription Commerçant - Style Netlify</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
:root {
  /* La palette officielle de Netlify */
  --netlify-teal: #20c6b7;      /* Le fameux turquoise */
  --netlify-navy: #0e1e25;      /* Le bleu marine profond */
  --netlify-dark-teal: #17a097; /* Pour le hover */
  --bg: #ffffff;
  --input-bg: #f9fbfc;
  --border: #e1e8eb;
  --text: #0e1e25;
  --muted: #516773;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background-color: var(--bg);
  background-image: radial-gradient(circle at 2px 2px, #e1e8eb 1px, transparent 0);
  background-size: 40px 40px; /* Petit effet de grille discret comme sur Netlify */
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  color: var(--text);
}

/* CARD */
.card {
  width: 100%;
  max-width: 1140px;
  background: #ffffff;
  padding: 60px;
  border-radius: 12px; /* Netlify utilise des arrondis moins prononcés (plus pro) */
  border: 1px solid var(--border);
  box-shadow: 0 10px 25px rgba(14, 30, 37, 0.08);
}

/* HEADER */
.header {
  text-align: left; /* Aligné à gauche pour le look "SaaS" */
  margin-top:  60px 0 0 60px;
}

.header h2 {
  font-size: 26px;
  font-weight: 700;
  color: var(--netlify-navy);
  letter-spacing: -0.5px;
}

.header p {
  margin-top: 8px;
  font-size: 15px;
  color: var(--muted);
}

/* FORM - LOGIQUE DE HAUTEUR AUTOMATIQUE */
.field {
  margin-bottom: 20px;
  display: flex;
  flex-direction: column; /* Organise le label au dessus de l'input */
}

.field label {
  font-size: 14px;
  font-weight: 600;
  color: var(--netlify-navy);
  margin-bottom: 8px;
}

.field input {
  width: 100%;
  padding: 12px 16px; /* Le padding crée la hauteur de l'input */
  border-radius: 6px;
  border: 1px solid var(--border);
  background: var(--input-bg);
  font-size: 15px;
  color: var(--text);
  transition: all 0.2s ease;
  outline: none;
}

.field input:focus {
  border-color: var(--netlify-teal);
  background: #fff;
  box-shadow: 0 0 0 4px rgba(32, 198, 183, 0.1);
}

/* BUTTON */
button {
  width: 100%;
  margin-top: 10px;
  padding: 14px; /* Hauteur gérée par l'espace intérieur */
  border: none;
  border-radius: 6px;
  background: var(--netlify-teal);
  color: var(--netlify-navy); /* Le texte sur le bouton est marine chez Netlify */
  font-size: 16px;
  font-weight: 700;
  cursor: pointer;
  transition: 0.2s;
}

button:hover {
  background: var(--netlify-dark-teal);
  transform: translateY(-1px);
}

/* FOOTER */
.footer {
  margin-top: 25px;
  padding-top: 20px;
  text-align: center;
  font-size: 14px;
  color: var(--muted);
  border-top: 1px solid var(--border);
}

.footer a {
  color: var(--netlify-teal);
  text-decoration: none;
  font-weight: 600;
}

.footer a:hover {
  text-decoration: underline;
}
</style>
</head>

<body>

<!-- Carte principale contenant le formulaire -->
<div class="card">
  <?php
  // Inclusion de l'en-tête du tableau de bord
  include __DIR__ ."/../../views/layouts/headerDashboard.php";

?>
  <!-- En-tête du formulaire -->
  <div class="header">
    <h2>Ajouter un Commerçant</h2>
    <p>Créez un nouveau compte vendeur pour la plateforme.</p>
  </div>

  <!-- Formulaire pour ajouter un commerçant -->
  <form method="post" action="index.php?page=admin&action=storeCommercant">
    <!-- Champ pour le nom de la boutique -->
    <div class="field">
      <label>Nom Boutique</label>
      <input type="text" name="nom_boutique" placeholder="Nom">
    </div>
    
    <!-- Champ pour le nom du propriétaire -->
    <div class="field">
      <label>Nom propritaire</label>
      <input type="text" name="nom_proprietaire" placeholder="Nom">
    </div>

    <!-- Champ pour l'email -->
    <div class="field">
      <label>email</label>
      <input type="email" name="email" placeholder="gjjj@gmail.com">
    </div>

    <!-- Champ pour le mot de passe -->
    <div class="field">
      <label>Mot de passe</label>
      <input type="password" name="mot_de_passe" placeholder="Minimum 8 caractères">
    </div>
    <!-- Champ pour le numéro WhatsApp -->
    <div class="field">
      <label> Numero WhatsApp</label>
      <input type="text" name="telephone_whatsapp" placeholder="+257 ...">
    </div>
    <!-- Champ pour le quartier/lieu -->
    <div class="field">
      <label>Lieu de travail</label>
      <input type="text" name="quartier" placeholder="Nom">
    </div>

    <!-- Bouton de soumission -->
    <button type="submit">Enregistrer</button>
  </form>
</div>

</body>
</html>
