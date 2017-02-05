<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 3/02/17
 * Time: 19:27
 */

namespace Entregable1;


class AgedBrie extends Item implements OperationsInterfaz
{
    function __construct($name, $sell_in, $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    function upgrade(){
        $this->improveQuality();

        if ($this->sell_in < 0) {
            $this->improveQuality();
        }
        $this->downgradeSellIn();

    }


    function improveQuality()
    {
        if ($this->quality < MAX_QUALITY) {
            $this->quality = $this->quality + MODIFY_QUALITY;
        }
    }


    function downgradeSellIn()
    {
        $this->sell_in = $this->sell_in - MODIFY_QUALITY;
    }
}