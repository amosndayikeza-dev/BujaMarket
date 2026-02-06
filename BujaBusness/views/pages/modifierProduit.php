<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier le produit </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../public/assets/css/modifierProduit.css">
<style>

</style>
</head>
<body>

<div class="container">
  <div class="header">
    <button class="back-btn" onclick="history.back()"></button>
    <h2>Détails du produit</h2>
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
        <form method="POST" action="index.php?page=produit&action=update&id=<?= $produit['id_produit'] ?>" enctype="multipart/form-data">
          <div class="field">
            <label>Prix (BIF)</label>
            <input type="number" name="prix"  value="<?= $produit['prix'] ?>">
          </div>

          <div class="field">
            <label>Catégorie</label>
            <select>
              <option>Téléphones</option>
              <option>Électronique</option>
              <option selected>Accessoires</option>
            </select>
          </div>

          <div class="field">
            <label>Description</label>
            <textarea rows="4" name="description" <?= $produit['description'] ?>></textarea>
          </div>

          <div class="field">
            <label>Lieu de vente</label>
            <input type="text" value="Bujumbura - Kamenge">
          </div>

          <div class="form-footer">
            <button class="btn btn-cancel" type="button" onclick="history.back()">Annuler</button>
            <button class="btn btn-save" type="submit">Enregistrer les modifications</button>
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