<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 19.07.16
 * Time: 14:28
 */

namespace lib\Patterns\Creational\AbstractFactory;


class Zombie  implements WarriorInterface {
    public function sayHello() {
        echo 'I\'m a Zombie!<br>';
    }
}