<?php
class Product
{
    public float $prix_HT;
    public float $TVA;
    public float $prix_TTC;
    public string $nom;
    public string $categorie;
    public int $stock;
    public string $description;

    public function __construct(float $prix_HT, float $TVA, string $nom, string $categorie, int $stock, string $description)
    {
        $this->prix_HT = $prix_HT;
        $this->TVA = $TVA / 100;
        $this->prix_TTC = $prix_HT + ($prix_HT * $TVA / 100);
        $this->nom = $nom;
        $this->categorie = $categorie;
        $this->stock = $stock;
        $this->description = $description;
    }
}
