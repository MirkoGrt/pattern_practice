<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:49
 */

namespace Patterns\Structural\Decorator;


class CarDecorator {
    public $car;
    public function __construct ($car) {
        $this->car = $car;
    }
}