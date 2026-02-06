<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <!-- ICONS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>
<style>
  :root{
  /*--primary:#0d6efd;
  --accent:#20c997;
  --bg:#f4f6fb;
  --card:#ffffff;
  --text:#1e1e1e;
  --radius:18px;*/

  /* Brand */
  --primary: #00C7B7;
  --primary-dark: #009E90;

  /* Structure */
  --secondary: #0F1E25;

  /* Background */
  --bg-light: #F6F8FA;
  --bg-white: #FFFFFF;

  /* Text */
  --text-dark: #1F2933;
  --text-muted: #6B7280;

  /* States */
  --success: #00C853;
  --warning: #FFAB00;
  --danger:  #E53935;
  --info:    #0288D1;
}
  *{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Poppins',sans-serif;
  }

    /* HEADER */
header{
  position:sticky;
  top:0;
  z-index:100;
  background: #0F1E25;
  backdrop-filter:blur(20px);
  padding:15px 18px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  box-shadow:0 8px 20px #1a2b33;
}

/* Style pour le titre/logo dans l'en-tête */
header h1{
  color:#00C7B7;
  font-size:22px;
  font-weight:700;
}

/* Style pour l'icône utilisateur */
header i{
  font-size:20px;
  color:#a4a8af;
}
</style>
<body>
    <header>
        <!-- Titre du site -->
        <h1>Buja Market</h1>
        <!-- Icône de l'utilisateur (pour la connexion/profil) -->
        <i class="fa-solid fa-user"></i>
    </header>
</body>
</html>