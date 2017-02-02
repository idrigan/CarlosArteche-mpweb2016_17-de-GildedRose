<?php

namespace Entregable1;

class GildedRose {
    private $items;
    function __construct($items) {
        $this->items = $items;
    }

    function improve_quality($item){
        if ($item->quality < 50) {
            $item->quality = $item->quality + 1;
        }
    }

    function twice_downgrade_quality($item){
        if ( $item->quality > 0 ) {
            $item->quality = $item->quality - 2;
        }
    }
    
    function downgrade_quality($item){
        if ( $item->quality > 0 ) {
            $item->quality = $item->quality - 1;
        }
    }

    function set_quality($item,$value){
        $item->quality = $value;
    }

    function downgrade_sell_in($item){
        $item->sell_in = $item->sell_in -1;
    }

    function upgrade_aged_brie($item){
        $this->improve_quality($item);

        if ($item->sell_in < 0) {
           $this->improve_quality($item);
        }
        $this->downgrade_sell_in($item);
    }

    function upgrade_backstage($item){

        $this->improve_quality($item);

        if ($item->sell_in < 11) {
            $this->improve_quality($item);
        }

        if ($item->sell_in < 6) {
            $this->improve_quality($item);
        }

        if ($item->sell_in <0){

            $this->set_quality($item,0);
        }

        $this->downgrade_sell_in($item);
    }

    function upgrade_sulfuras($item){
       $this->improve_quality($item);
    }

    function upgrade_normal_item($item){

        $this->downgrade_quality($item);

        if ($item->sell_in < 0) {
            $this->downgrade_quality($item);
        }

        $this->downgrade_sell_in($item);
    }
    
    function upgrade_conjured($item){

        $this->twice_downgrade_quality($item);

        if ($item->sell_in < 0) {
            $this->twice_downgrade_quality($item);
        }

        $this->downgrade_sell_in($item);
    }

    function update_quality() {
        foreach ($this->items as $item) {

            switch($item->name){

                case "Aged Brie":
                    $this->upgrade_aged_brie($item);
                    break;
                case "Backstage passes to a TAFKAL80ETC concert":
                    $this->upgrade_backstage($item);
                    break;
                case "Sulfuras, Hand of Ragnaros":
                    $this->upgrade_sulfuras($item);
                    break;
                case "Conjured Mana Cake":
					$this->upgrade_conjured($item);
                    break;
                default:
                    $this->upgrade_normal_item($item);
                    break;
            }

        }
    }
}
class Item {
    public $name;
    public $sell_in;
    public $quality;
    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }
    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
