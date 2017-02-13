<?php


namespace Entregable1;


class AgedBrie extends Item implements OperationsInterface
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
        if ($this->quality < OperationsInterface::MAX_QUALITY) {
            $this->quality = $this->quality + OperationsInterface::MODIFY_QUALITY;
        }
    }


    function downgradeSellIn()
    {
        $this->sell_in = $this->sell_in - OperationsInterface::MODIFY_QUALITY;
    }
}