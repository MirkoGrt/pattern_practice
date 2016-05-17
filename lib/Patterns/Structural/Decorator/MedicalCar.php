<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:50
 */

namespace Patterns\Structural\Decorator;


class MedicalCar extends CarDecorator {
    public $car;
    public function __construct ($car) {
        $this->car = $car;
    }

    public function go () {
        echo 'Now toyota is medical<br>';
        $this->car->go();
    }
}