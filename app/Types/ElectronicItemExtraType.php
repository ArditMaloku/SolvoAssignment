<?php

namespace Solvo\App\Types;

final class ElectronicItemExtraType
{
   const REMOTE_CONTROLLER = [
      'name' => 'Remote controller',
      'price' => 4,
   ];

   const WIRED_CONTROLLER = [
      'name' => 'Wired controller',
      'price' => 2,
   ];

   public static $electronicItems = [
      self::REMOTE_CONTROLLER,
      self::WIRED_CONTROLLER,
   ];
}
