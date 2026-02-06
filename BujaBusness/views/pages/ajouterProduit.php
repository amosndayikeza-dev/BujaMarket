<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier le produit </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<!--STYEL CSS-->
<link rel="stylesheet" href="../../public/assets/css/ajouterProduit.css">
<style>

</style>
</head>
<body>

<div class="container">
  <div class="header">
    <button class="back-btn" onclick="history.back()"></button>
    <h2>Ajouter produit</h2>
  </div>

  <div class="card">
    <div class="card-content">
      
      <div class="image-section">
        <img src="https://picsum.photos/600/600" id="preview">
        <label class="image-label">
          Changer la photo
          <input type="file" hidden accept="image/*" id="imageInput">
        </label>
      </div>

      <div class="form-section">
        <form method="POST" action="index.php?page=product&action=store" enctype="multipart/form-data">
          <div class="field">
            <label>Prix (BIF)</label>
            <input type="number" name="prix" required>
          </div>

          <div class="field">
            <label>Catégorie</label>
            <select name="id_categorie">
              <?php foreach($categories as $cat):   ?>
              <option value="<?= $cat['id_categorie'] ?>">
                <?= htmlspecialchars($cat['nom_categorie']) ?>
              </option>
              <?php endforeach;?>
            </select>
          </div>

          <div class="field">
            <label>Description</label>
            <textarea name="description" rows="4" required></textarea>
          </div>

          <div class="field">
            <label>Lieu de vente</label>
            <input type="text" name="lieu">
          </div>

          <div class="form-footer">
            <button class="btn btn-cancel" type="button">
              <a href="index.php?page=produit&action=list" class="btn btn-cancel"  type="button">
                Annuler
              </a>
            </button>
            <button class="btn btn-save" type="submit">Ajouter</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
const input = document.getElementById("imageInput");
const preview = document.getElementById("preview");

input.addEventListener("change", () => {
  const file = input.files[0];
  if(file){
    preview.src = URL.createObjectURL(file);
  }
});
</script>

</body>
</html>