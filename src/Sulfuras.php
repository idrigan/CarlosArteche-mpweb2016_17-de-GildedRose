<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 3/02/17
 * Time: 20:31
 */

namespace Entregable1;


class Sulfuras extends Item
{
    public function __construct($name, $sell_in, $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }


    public function upgrade(){}

}