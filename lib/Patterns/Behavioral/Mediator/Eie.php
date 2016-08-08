<?php

namespace lib\Patterns\Behavioral\Mediator;

class Eie extends BodyPart {

    private $eie;

    public function __construct ($eie, $brain) {
        $this->eie = $eie;
        parent::__construct($brain);
    }

    public function seeSomething() {
        echo "<p>" . "Eie: I'm see Picasso (some eie action)" . "</p>";
    }

}