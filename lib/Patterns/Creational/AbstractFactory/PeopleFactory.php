<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 19.07.16
 * Time: 12:57
 */

namespace lib\Patterns\Creational\AbstractFactory;


class PeopleFactory implements WarInterface {

    public function getWarrior() {
        return new People();
    }

    public function horrorSlogan() {
        echo '<h3>We are peoples! Don\'t go here!!!</h3>';
    }
}