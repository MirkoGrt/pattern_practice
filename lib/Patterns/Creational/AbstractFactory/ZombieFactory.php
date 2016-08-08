<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 19.07.16
 * Time: 12:53
 */

namespace lib\Patterns\Creational\AbstractFactory;

class ZombieFactory implements WarInterface {

    public function getWarrior() {
        return new Zombie();
    }

    public function horrorSlogan() {
        echo '<h3>We are zombies! We\'l eat you all!!!</h3>';
    }
}