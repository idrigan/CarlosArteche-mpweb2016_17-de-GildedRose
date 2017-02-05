<?php

namespace Entregable1;

class GildedRose {
    private $items;
    function __construct($items) {
        $this->items = $items;
    }



    function update_quality() {
        foreach ($this->items as $item) {
            $item->upgrade();
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
