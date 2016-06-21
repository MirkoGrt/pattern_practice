<?php

namespace Patterns\Behavioral\Mediator;

class Ear extends BodyPart {
    private $ear;

    public function __construct ($ear, $brain) {
        $this->ear = $ear;
        parent::__construct($brain);
    }

    public function hearSomething() {
        echo "<p>" . "Ear: I'm hear some music (some ear action)" . "</p>";
    }
}