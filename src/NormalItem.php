<?php


namespace Entregable1;


class NormalItem extends Item implements OperationsInterface
{
    public function  __construct($name,$sellIn,$quaility){
        parent::__construct($name,$sellIn,$quaility);
    }

    function upgrade(){
        $this->downgradeQuality();

        if ($this->sell_in < 0) {
            $this->downgradeQuality();
        }

        $this->downgradeSellIn();

    }

    function improveQuality(){ }


    function downgradeSellIn()
    {
        $this->sell_in = $this->sell_in - OperationsInterface::MODIFY_QUALITY;
    }

    function downgradeQuality(){
        if ( $this->quality > 0 ) {
            $this->quality = $this->quality - OperationsInterface::MODIFY_QUALITY;
        }
    }
}