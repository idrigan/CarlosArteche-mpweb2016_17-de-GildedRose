<?php


namespace Entregable1;


class BackStage extends Item implements OperationsInterface
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
        if ($this->quality < OperationsInterface::MAX_QUALITY) {
            $this->quality = $this->quality + OperationsInterface::MODIFY_QUALITY;
        }
    }


    function downgradeSellIn()
    {
        $this->sell_in = $this->sell_in - OperationsInterface::MODIFY_QUALITY;
    }
}