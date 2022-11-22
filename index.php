<?php

use Solvo\App\Types\ElectronicItemType;
use Solvo\App\Types\ElectronicItemExtraType;
use Solvo\App\ElectronicItem;

require_once realpath("vendor/autoload.php");

/** 
 * Question 1: 
 * Using the code given, create each type of electronic as classes. 
 * Every ElectronicItem must have a function called maxExtras that limits the number of extras an electronic item can have. 
 * The extras are a list of electronic items that are attached to another electronic item to complement it.
 * • ❖ The console can have a maximum of 4 extras
 * • ❖ The television has no maximum extras
 * • ❖ The microwave can't have any extras
 * • ❖ The controller can't have any extras
 * Create a scenario where a person would buy:
 * 1 console, 2 televisions with different prices and 1 microwave
 * The console and televisions have extras; those extras are controllers. 
 * The console has 2 remote controllers and 2 wired controllers. 
 * The TV #1 has 2 remote controllers and the TV #2 has 1 remote controller.
 * Sort the items by price and output the total pricing.
 */

$userInput = [
   [
      'electronic_item' => ElectronicItemType::CONSOLE,
      'extras' => [
         ElectronicItemExtraType::REMOTE_CONTROLLER,
         ElectronicItemExtraType::REMOTE_CONTROLLER,
         ElectronicItemExtraType::WIRED_CONTROLLER,
         ElectronicItemExtraType::WIRED_CONTROLLER,
      ],
   ],
   [
      'electronic_item' => ElectronicItemType::TELEVISION,
      'extras' => [
         ElectronicItemExtraType::REMOTE_CONTROLLER,
         ElectronicItemExtraType::REMOTE_CONTROLLER,
      ],
   ],
   [
      'electronic_item' => ElectronicItemType::TELEVISION,
      'extras' => [
         ElectronicItemExtraType::REMOTE_CONTROLLER,
      ],
   ],
   [
      'electronic_item' => ElectronicItemType::MICROWAVE,
      'extras' => [],
   ],
];

$items = [];
$totalPrice = 0;
$allElectronicItems = [];

foreach ($userInput as $index => $item) {
   $electronicItem = $item['electronic_item'];

   $electronicItem = new ElectronicItem($electronicItem['name'], $electronicItem['price'], $electronicItem['max_extras'], $item['extras']);
   $items[] = $electronicItem;

   $totalPrice += $electronicItem->totalPriceWithExtras();

   $allElectronicItems[$electronicItem->totalPriceWithExtras()] = $item;
}

// Sort the results by price 
ksort($allElectronicItems);
foreach ($allElectronicItems as $item) {
   $electronicItem = $item['electronic_item'];

   printResult($electronicItem['name'], $electronicItem['price'], $item['extras']);
}

function printResult($electronicItemName, $electronicItemPrice, $itemExtras)
{
   $itemExtrasCount = count($itemExtras);

   print_r('==========================================' . PHP_EOL);
   print_r("$electronicItemName costs $$electronicItemPrice with $itemExtrasCount extras:" . PHP_EOL);
   print_r('------------------------------------------' . PHP_EOL);

   $itemExtrasTotalPrice = 0;
   foreach ($itemExtras as $extra) {
      print_r('Extra: ' . $extra['name'] . ' costs $' . $extra['price'] . PHP_EOL);
      $itemExtrasTotalPrice += $extra['price'];
   }

   if ($itemExtrasCount) {
      print_r('------------------------------------------' . PHP_EOL);
   }

   $electronicItemTotalPrice = $electronicItemPrice + $itemExtrasTotalPrice;
   print_r("\t\t $electronicItemName total: $$electronicItemTotalPrice" . PHP_EOL);
}

print_r('==========================================' . PHP_EOL);
print_r('==========================================' . PHP_EOL);
print_r("\t\t\t\t Total: $$totalPrice" . PHP_EOL);


/**
 * Question 2: 
 * That person's friend saw her with her new purchase and asked her how much the console and its controllers had cost her. Give the answer.
 */

$consoleInput = $userInput[0];
$electronicItem = $consoleInput['electronic_item'];
$electronicItem = new ElectronicItem($electronicItem['name'], $electronicItem['price'], $electronicItem['max_extras'], $consoleInput['extras']);
$electronicItemTotal = $electronicItem->totalPriceWithExtras();

print_r('==========================================' . PHP_EOL);
print_r("Second anwser: Console cost: $$electronicItemTotal" . PHP_EOL);
