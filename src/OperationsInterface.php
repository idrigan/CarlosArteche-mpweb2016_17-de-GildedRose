<?php


namespace Entregable1;


interface OperationsInterface
{

    const MAX_QUALITY  = 50;
    const MODIFY_QUALITY = 1;
    
    function improveQuality();

    function downgradeSellIn();
}