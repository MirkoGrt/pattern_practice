<?php

namespace Patterns\Behavioral\Mediator;

class Brain {
    public $Eie;
    public $Ear;
    public $Hand;

    public function __construct ($ear, $eie, $hand) {
        $this->Ear = new Ear($ear, $this);
        $this->Eie = new Eie($eie, $this);
        $this->Hand = new Hand($hand, $this);
    }

    public function somethingChangedWithBody ($part) {
        if ($part == 'eie') {
            $this->Eie->seeSomething();
            $this->Hand->hit();
        } elseif ($part == "ear") {
            $this->Ear->hearSomething();
            $this->Hand->takeMyHand();
        }
    }
}