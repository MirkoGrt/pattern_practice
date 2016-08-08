<?php

/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:21
 */

namespace lib\Patterns\Structural\Facade;

class SkiRent {
    public function rentBoots ($feetSize, $skierLevel) {
        return 20;
    }
    public function rentSki ($weight, $skierLevel) {
        return 40;
    }
    public function rentPole ($height) {
        return 5;
    }
}