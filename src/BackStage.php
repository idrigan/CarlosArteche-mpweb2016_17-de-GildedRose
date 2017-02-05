<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 3/02/17
 * Time: 19:23
 */

namespace Entregable1;


class BackStage extends Item implements OperationsInterfaz
{
    public function __construct($name, $sell_in, $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    function upgrade(){

        $this->improveQuality();

        if ($this->sell_in < 11) {
            $this->improveQuality();
        }

        if ($this->sell_in < 6) {
            $this->improveQuality();
        }

        if ($this->sell_in <0){

            $this->setQuality(0);
        }

        $this->downgradeSellIn();
    }

    function setQuality($value){
        $this->quality = $value;
    }

    function improveQuality()
    {
        if ($this->quality < MAX_QUALITY) {
            $this->quality = $this->quality + MODIFY_QUALITY;
        }
    }


    function downgradeSellIn()
    {
        $this->sell_in = $this->sell_in -MODIFY_QUALITY;
    }
}