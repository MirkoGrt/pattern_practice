<?php

namespace lib\Patterns\Behavioral\Mediator;

class BodyPart {
    public $_brain;

    public function __construct ($brain) {
        $this->_brain = $brain;
    }

    public function getBrain () {
        return $this->_brain;
    }

    public function changed ($changedItem) {
        $this->getBrain()->somethingChangedWithBody($changedItem);
    }
}