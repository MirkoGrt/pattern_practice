<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 23.08.16
 * Time: 10:08
 */

namespace lib\Patterns\Behavioral\Memento;


class GameLoader {
    private $memento;

    public function getMemento() {
        return $this->memento;
    }

    public function setMemento(Memento $memento) {
        $this->memento = $memento;
    }
}