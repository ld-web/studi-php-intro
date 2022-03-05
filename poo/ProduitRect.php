<?php

require_once 'Produit.php';

class ProduitRect extends Produit
{
  private int $width;
  private int $height;

  public function __construct(int $width, int $height, string $name, float $price)
  {
    parent::__construct($name, $price);
    $this->name .= " - Rectangulaire";
    $this->width = $width;
    $this->height = $height;
  }

  public function getSurface(): float
  {
    return $this->width * $this->height;
  }

  public function getWidth(): int
  {
    return $this->width;
  }

  public function setWidth(int $width): self
  {
    $this->width = $width;

    return $this;
  }

  public function getHeight(): int
  {
    return $this->height;
  }

  public function setHeight(int $height): self
  {
    $this->height = $height;

    return $this;
  }
}
