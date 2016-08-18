<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 17.08.16
 * Time: 12:58
 */

namespace lib\Patterns\Structural\Flyweight;


abstract class Character {
    protected $symbol;
    protected $fontSize;
    protected $weight;

    public abstract function display();
}