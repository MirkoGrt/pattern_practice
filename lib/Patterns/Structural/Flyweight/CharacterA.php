<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 17.08.16
 * Time: 12:59
 */

namespace lib\Patterns\Structural\Flyweight;


class CharacterA extends Character {

    public function __construct() {
        $this->symbol = 'a';
        $this->fontSize = 15;
        $this->weight = 200;
    }

    public function display() {
        echo "<span class=\"mdl-chip mdl-chip--contact\">
                <span class=\"mdl-chip__contact mdl-color--teal mdl-color-text--white\">{$this->symbol}</span>
                <span class=\"mdl-chip__text\">from factory</span>
            </span>";
    }
}