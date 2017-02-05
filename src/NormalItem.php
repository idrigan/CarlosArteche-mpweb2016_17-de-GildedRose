<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 3/02/17
 * Time: 19:08
 */

namespace Entregable1;


class NormalItem extends Item implements OperationsInterfaz
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
        $this->sell_in = $this->sell_in - MODIFY_QUALITY;
    }

    function downgradeQuality(){
        if ( $this->quality > 0 ) {
            $this->quality = $this->quality - MODIFY_QUALITY;
        }
    }
}