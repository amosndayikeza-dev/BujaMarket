<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription Commerçant - Style Netlify</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../public/assets/css/connexion.css">
<style>

</style>
</head>

<body>

<div class="card">
  <div class="header">
    <h2>Démarrer avec nous</h2>
    <p>Créez votre boutique en quelques secondes.</p>
  </div>

  <form method="POST" action="index.php?page=commercant&action=login">

    <div class="field">
      <label>E-mail</label>
      <input type="email" placeholder="votre@email.com">
    </div>

    <div class="field">
      <label>Mot de passe</label>
      <input type="password" placeholder="Minimum 8 caractères">
    </div>

    <button type="submit">Se connecter</button>
  </form>

  <div class="footer">
    Vous n'avez pas encore de compte ? 
    <a href="#">Creez-en Un</a>
  </div>
</div>

</body>
</html>