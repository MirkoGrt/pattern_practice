<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 22.08.16
 * Time: 10:49
 */

namespace lib\Patterns\Behavioral\Memento;

class Game {
    private $level;

    public function setLevel ($level) {
        $this->level = $level;
    }

    public function getlevel () {
        return $this->level;
    }

    public function saveGame () {
        return new Memento($this->level);
    }

    public function loadGame (Memento $memento) {
        $this->level = $memento->getLevel();
    }
}