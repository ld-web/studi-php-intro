<?php

require_once 'Produit.php';

class ProduitCirc extends Produit
{
  private int $diameter;

  public function __construct(int $diameter, string $name, float $price)
  {
    parent::__construct($name, $price);
    $this->name .= " - Circulaire";
    $this->diameter = $diameter;
  }

  public function getSurface(): float
  {
    return M_PI * (($this->diameter / 2) ** 2);
  }

  public function getDiameter(): int
  {
    return $this->diameter;
  }

  public function setDiameter(int $diameter): self
  {
    $this->diameter = $diameter;

    return $this;
  }
}
