<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

require_once __DIR__ . '/vendor/autoload.php';

use Entregable1\Item;
use Entregable1\GildedRose;
use Entregable1\NormalItem;
use Entregable1\AgedBrie;
use Entregable1\BackStage;
use Entregable1\Sulfuras;
use Entregable1\Conjured;

echo "OMGHAI!\n";
$items = array(
    new NormalItem('+5 Dexterity Vest', 10, 20),
    new AgedBrie('Aged Brie', 2, 0),
    new NormalItem('Elixir of the Mongoose', 5, 7),
    new Sulfuras('Sulfuras, Hand of Ragnaros', 0, 80),
    new Sulfuras('Sulfuras, Hand of Ragnaros', -1, 80),
    new BackStage('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new BackStage('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new BackStage('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
    new Conjured('Conjured Mana Cake', 3, 6)
);
$app = new GildedRose($items);
$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}
for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------\n");
    echo("name, sellIn, quality\n");
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->update_quality();
}
