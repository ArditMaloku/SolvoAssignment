<?php

namespace Solvo\App\Types;

final class ElectronicItemType
{
   const CONSOLE = [
      'name' => 'Console',
      'price' => 10,
      'max_extras' => 4
   ];
   const TELEVISION = [
      'name' => 'Television',
      'price' => 50,
      'max_extras' => -1
   ];
   const MICROWAVE = [
      'name' => 'Microwave',
      'price' => 80,
      'max_extras' => 0
   ];
   const CONTROLLER = [
      'name' => 'Controller',
      'price' => 5,
      'max_extras' => 0
   ];

   public static $electronicItems = [
      self::CONSOLE,
      self::TELEVISION,
      self::MICROWAVE,
      self::CONTROLLER,
   ];
}
