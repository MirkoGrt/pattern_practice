<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 19.07.16
 * Time: 14:28
 */

namespace Patterns\Creational\AbstractFactory;


class People implements WarriorInterface {
    public function sayHello() {
        echo 'I\'m a Human!<br>';
    }
}