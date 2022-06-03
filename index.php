<?php

require_once __DIR__ . "/classes/Product.class.php";

$produit1 = new Product(10, 20, "Quatre saisons", "Pizza", 1, "Sauce tomate, fromage, artichauts, poivron, jambon cuit, champignons");


var_dump($produit1);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier 5 : e-commerce 1</title>
</head>

<body>

    <!-- Formulaire d'entrée pour création de produit -->
    <section>
        <form action="index.php" method="POST">
            <input type="number" name="prix_HT" placeholder="prix HT">
            <input type="number" name="TVA" placeholder="TVA : %">
            <input type="text" name="nom" placeholder="Nom du produit">
            <input type="text" name="categorie" placeholder="Catégorie">
            <input type="number" name="stock" placeholder="Stock">
            <input type="text" name="description" placeholder="Description">
            <button>Valider</button>

        </form>

    </section>

    <?php
    $produitTest = new Product($_POST["prix_HT"], $_POST["TVA"], $_POST["nom"], $_POST["categorie"], $_POST["stock"], $_POST["description"])
    ?>

    <!-- div d'affichage du produit -->
    <div>
        <h2>Votre produit :</h2>
        <p> Nom : <?php echo $produitTest->nom ?></p>
        <p> Prix HT : <?php echo $produitTest->prix_HT ?></p>
        <p> TVA : <?php echo $produitTest->TVA ?></p>
        <p> Prix TTC : <?php echo $produitTest->prix_TTC ?></p>
        <p> Catégorie : <?php echo $produitTest->categorie ?></p>
        <p> Stock : <?php echo $produitTest->stock ?></p>
        <p> Description : <?php echo $produitTest->description ?></p>


    </div>

</body>

</html>