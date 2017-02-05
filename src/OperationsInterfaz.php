<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 3/02/17
 * Time: 19:50
 */

namespace Entregable1;


interface OperationsInterfaz
{

    const MAX_QUALITY  = 50;
    const MODIFY_QUALITY = 1;
    
    function improveQuality();

    function downgradeSellIn();
}