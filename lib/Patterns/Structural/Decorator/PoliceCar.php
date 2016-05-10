<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:49
 */

namespace Patterns\Structural\Decorator;


class PoliceCar extends CarDecorator {
    private $decorator;
    public function __construct ($decorator) {
        $this->decorator = $decorator;
    }

    public function policeModel () {
        $this->decorator->model = "{$this->decorator->model} - Police->->...";
    }
}