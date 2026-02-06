<!-- Page de connexion pour les administrateurs -->
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion Administration - BujaMarket</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
:root {
  --netlify-teal: #20c6b7;
  --netlify-navy: #0e1e25;
  --netlify-dark-teal: #17a097;
  --bg: #ffffff;
  --input-bg: #f9fbfc;
  --border: #e1e8eb;
  --text: #0e1e25;
  --muted: #516773;
  --danger: #ef4444;
  --danger-bg: #fee2e2;
}

* { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

body {
  background-color: var(--bg);
  background-image: radial-gradient(circle at 2px 2px, #e1e8eb 1px, transparent 0);
  background-size: 40px 40px;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  color: var(--text);
}

.card { width: 100%; max-width: 440px; background: #ffffff; padding: 40px; border-radius: 12px; border: 1px solid var(--border); box-shadow: 0 10px 25px rgba(14, 30, 37, 0.08); }
.header { text-align: left; margin-bottom: 30px; }
.header h2 { font-size: 26px; font-weight: 700; color: var(--netlify-navy); letter-spacing: -0.5px; }
.header p { margin-top: 8px; font-size: 15px; color: var(--muted); }
.field { margin-bottom: 20px; display: flex; flex-direction: column; }
.field label { font-size: 14px; font-weight: 600; color: var(--netlify-navy); margin-bottom: 8px; }
.field input { width: 100%; padding: 12px 16px; border-radius: 6px; border: 1px solid var(--border); background: var(--input-bg); font-size: 15px; color: var(--text); transition: all 0.2s ease; outline: none; }
.field input:focus { border-color: var(--netlify-teal); background: #fff; box-shadow: 0 0 0 4px rgba(32, 198, 183, 0.1); }
button { width: 100%; margin-top: 10px; padding: 14px; border: none; border-radius: 6px; background: var(--netlify-teal); color: var(--netlify-navy); font-size: 16px; font-weight: 700; cursor: pointer; transition: 0.2s; }
button:hover { background: var(--netlify-dark-teal); transform: translateY(-1px); }
.footer { margin-top: 25px; padding-top: 20px; text-align: center; font-size: 14px; color: var(--muted); border-top: 1px solid var(--border); }
.footer a { color: var(--netlify-teal); text-decoration: none; font-weight: 600; }
.footer a:hover { text-decoration: underline; }
.alert-error { background-color: var(--danger-bg); color: var(--danger); padding: 12px; border-radius: 6px; font-size: 14px; margin-bottom: 20px; border: 1px solid #fecaca; }
</style>
</head>
<body>

<div class="card">
  <div class="header">
    <h2>Espace Administration</h2>
    <p>Connectez-vous pour gérer la plateforme.</p>
  </div>

  <?php if(isset($_SESSION['error'])): ?>
      <div class="alert-error">
          <?= htmlspecialchars($_SESSION['error']) ?>
          <?php unset($_SESSION['error']); ?>
      </div>
  <?php endif; ?>

  <form method="post" action="index.php?page=admin&action=loginAdmin">
    <div class="field">
      <label>Email Administrateur</label>
      <input type="email" name="email" placeholder="admin@email.com" required>
    </div>
    <div class="field">
      <label>Mot de passe</label>
      <input type="password" name="mot_de_passe" placeholder="Votre mot de passe" required>
    </div>
    <button type="submit">Se connecter</button>
  </form>
</div>

</body>
</html>