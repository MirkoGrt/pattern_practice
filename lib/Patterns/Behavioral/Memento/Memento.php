<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 22.08.16
 * Time: 11:42
 */

namespace lib\Patterns\Behavioral\Memento;


class Memento {
    private $level;

    public function __construct($level) {
        $this->level = $level;
    }

    public function getLevel () {
        return $this->level;
    }
}