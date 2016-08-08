<?php

namespace lib\Patterns\Behavioral\Mediator;

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
        if ($part) {
            echo "<p>" . " ^^^  $part  ^^^ " . "</p>";
            echo "<p>" . " --- BRAIN is active --- bip-bip" . "</p>";
            if ($part == 'eie') {
                $this->Eie->seeSomething();
                $this->Hand->hit();
            } elseif ($part == "ear") {
                $this->Ear->hearSomething();
                $this->Hand->takeMyHand();
            }
        } else {
            echo "<p>" . " --- BRAIN is turned off...  please enter a body part to some action" . "</p>";
        }
    }
}