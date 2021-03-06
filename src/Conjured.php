<?php


namespace Entregable1;


class Conjured extends Item implements OperationsInterface
{
    public function __construct($name, $sell_in, $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    public function upgrade(){
        $this->downgradeSellIn();

        for ($i=0;$i<2;$i++){
            $this->downgradeQuality();
            if ($this->sell_in < 0) {
                $this->downgradeQuality();
            }
        }
    }

    function improveQuality()
    { }

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