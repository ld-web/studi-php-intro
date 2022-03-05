<?php

require_once 'ProduitRect.php';
require_once 'ProduitCirc.php';

$produitRect = new ProduitRect(150, 120, "Téléviseur", 400);
$produitCirc = new ProduitCirc(30, "Ballon", 25);

echo $produitRect->getName();

$produitRect->setName("Autre produit");
echo $produitRect->getName();

var_dump($produitRect);
var_dump($produitCirc);