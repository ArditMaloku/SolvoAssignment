<?php

namespace Solvo\App;

class ElectronicItemExtra
{
   private string $name;
   private int $price;

   public function __construct(string $name, int $price)
   {
      $this->name = $name;
      $this->price = $price;
   }

   public function name()
   {
      return $this->name;
   }

   public function price()
   {
      return $this->price;
   }
}
