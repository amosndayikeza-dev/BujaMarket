<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Détail du Produit | Netlify Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../public/assets/css/detailProduit.css">
    <style>
       
    </style>
</head>
<body>

    <div class="header">
        <a href="index.php" class="back-link"><i class="fa fa-arrow-left"></i></a>
    </div>

    <div class="product-hero">
        <span class="status-badge">Disponible</span>
        <img src="../images/a111.jpg" alt="Image du produit" />
    </div>

    <div class="content-card">
        <div class="price-tag">500 000 BIF</div>

        <div class="info-row">
            <span><i class="fa-solid fa-location-dot"></i> Kamenge, Bujumbura</span>
            <span><i class="fa-solid fa-tag"></i> iPhone 13</span>
        </div>

        <div class="description-box">
            <h3>Détails du produit</h3>
            <p>
                Produit ajouté via formulaire. État impeccable, batterie 95%. Vendu
                avec tous les accessoires originaux. Garantie de marche disponible.
            </p>
        </div>
    </div>

    <div class="action-bar">
        <a href="tel:+<?= $produit['whatsapp'] ?>" class="btn btn-call">
            <i class="fa fa-phone"></i> Appeler
        </a>
        <a href="https://wa.me/<?= $produit['whatsapp'] ?>?text=<?= urlencode(
            "Bonjour, je suis interesse par le produit :" .$produit['nom_produit']) ?>" class="btn btn-wa" target="_blank">
            <i class="fa-brands fa-whatsapp"></i> WhatsApp
        </a>
    </div>

</body>
</html>