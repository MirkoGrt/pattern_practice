<?php

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:48
 */

namespace Patterns\Structural\Decorator;

class Car {
    public $model;
    public function __construct ($model) {
        $this->model = $model;
        $this->go();
    }
    public function go() {
        echo "<p>{$this->model} Is on the road!!!</p>";
    }
    public function getModel () {
        return $this->model;
    }
}