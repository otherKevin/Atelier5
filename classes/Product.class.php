<?php

/* ---------------- Classe produit : Product ----------------- */

class Product
{

    /* ----- Propriétés */
    protected float $price; // Prix HT
    public float $vat_rate; // Taux de TVA
    protected float $price_with_vat; // Prix TTC
    public string $name; // Nom
    public string $category; // Catégorie
    public string $description; // Description
    public int $stock; // Quantité en stock

    /* ----- Constructeur */
    public function __construct(float $vat_rate, string $name, string $category, string $description, int $stock)
    {
        $this->vat_rate = $vat_rate;
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
        $this->stock = $stock;
    }

    public function setPrice(float $priceValue)
    {
        if ($priceValue >= 0) {
            $this->price = $priceValue;
            $this->price_with_vat = $priceValue * (1 + ($this->vat_rate / 100));
        } else {
            $this->price = 0;
            $this->price_with_vat = 0;
        }
    }

    /* ----- Getters et Setters pour les prix */
    public function getHTPrice(): string
    {
        return number_format($this->price, 2) . " € HT ";
    }

    public function getPriceWithVAT(): string
    {
        return number_format($this->price_with_vat, 2) . " € TTC ";
    }

    /* ----- Métode de calcul pour la valorisation du stock */
    public function valorisation()
    {
        $valor = $this->stock * $this->price;
        return "Valorisation du stock :" . $valor . " € HT";
    }

    /* ----- Méthode d'affichage des informations du produit */
    public function displayProdInfo()
    {

?>
        <h2>Affichage du nouveau produit créé</h2>
        <p> Détails: </p>
        <ul>
            <li>Nom: <?= $this->name; ?></li>
            <li>Categorie: <?= $this->category; ?></li>
            <li>Prix: <?= $this->getHTPrice() ?> (<?= $this->vat_rate; ?> % de TVA) soit <?= $this->getPriceWithVAT(); ?></li>
            <li>Description: <?= $this->description ?></li>
            <li><?= $this->valorisation() ?></li>
        </ul>


<?php }
}
