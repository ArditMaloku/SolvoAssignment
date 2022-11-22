<?php

namespace Solvo\App;

use Exception;

class ElectronicItem
{
  private string $name;
  private int $price;
  private int $maxExtras;
  private array $extras;

  public function __construct(string $name, int $price, int $maxExtras, array $extras)
  {
    $this->name = $name;
    $this->price = $price;
    $this->maxExtras = $maxExtras;
    $this->extras = $extras;

    $givenExtrasNumber = count($this->extras);

    if ($this->maxExtras !== -1 && count($this->extras) > $this->maxExtras) {
      throw new Exception("Item: $this->name has the number of $this->maxExtras of extras items, $givenExtrasNumber given!");
    }

    $this->addExtrasToItem();
  }

  public function maxExtras(): int
  {
    return $this->maxExtras;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function electronicItemPrice(): int
  {
    return $this->price;
  }

  public function totalPriceWithExtras(): int
  {
    return $this->electronicItemPrice() + $this->extrasTotalPrice();
  }

  public function addExtrasToItem()
  {
    $extras = $this->extras;
    $this->extras = [];

    foreach ($extras as $extra) {
      $this->extras[] = new ElectronicItemExtra($extra['name'], $extra['price']);
    }
  }

  public function extras(): array
  {
    return $this->extras;
  }

  public function extrasTotalPrice(): int
  {
    $extras = $this->extras();
    $sum = 0;

    foreach ($extras as $extra) {
      $sum += $extra->price();
    }

    return $sum;
  }
}
