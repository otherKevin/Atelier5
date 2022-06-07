<?php

/* ---------- Imports ---------- */
require_once __DIR__ . "/classes/Product.class.php";

/* ----- Traitement de la requête si le verbe HTTP est POST */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* ----- Récupération des valeurs du body de la requête */
    $priceValue = $_POST["priceValue"];
    $vat_rate = $_POST["vat_rate"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $stock = $_POST["stock"];

    /* ----- Création de l'instance de Product */
    $new_product = new Product($vat_rate, $name, $category, $description, $stock);
    $new_product->setPrice($priceValue);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-commerce</title>
</head>

<body>
    <!-- Formulaire de saisie des infos du produit -->
    <form action="index.php" method="POST">
        <input type="number" name="priceValue" placeholder="Prix HT" step="0.01" required />
        <input type="number" name="vat_rate" placeholder="Taux de TVA" step="0.1" required />
        <input type="text" name="name" placeholder="Nom" required />

        <select name="category">
            <option value="fruit">Fruit</option>
            <option value="vegetable">Légume</option>
            <option value="drink">Boisson</option>
        </select>

        <textarea name="description"></textarea>

        <input type="number" name="stock" placeholder="Quantité" required>

        <input type="submit" value="valider" />

    </form>
    <!-- Appel de la méthode pour afficher les infos du produit -->
    <?php if (isset($new_product)) {
        $new_product->displayProdInfo();
    } ?>
</body>

</html>