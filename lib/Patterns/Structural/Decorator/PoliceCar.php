<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:49
 */

namespace Patterns\Structural\Decorator;


class PoliceCar extends CarDecorator {
    public $car;
    public function __construct ($car) {
        $this->car = $car;
    }

    public function go () {
        echo 'Now toyota is police<br>';
        $this->car->go();
    }
}