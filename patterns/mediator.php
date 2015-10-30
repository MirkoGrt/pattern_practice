<?php
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

class Ear extends BodyPart {
    private $ear;

    public function __construct ($ear, $brain) {
        $this->ear = $ear;
        parent::__construct($brain);
    }

    public function hearSomething() {
        echo "<p>" . "Ear: I'm hear some music" . "</p>";
    }
}

class Eie extends BodyPart {

    private $eie;

    public function __construct ($eie, $brain) {
        $this->eie = $eie;
        parent::__construct($brain);
    }

    public function seeSomething() {
        echo "<p>" . "Eie: I'm see Picasso" . "</p>";
    }

}

class Hand extends BodyPart {
    private $hand;

    public function __construct ($hand, $brain) {
        $this->hand = $hand;
        parent::__construct($brain);
    }

    public function takeMyHand () {
        echo "<p>" . "Hand: I'm take your hand" . "</p>";
    }

    public function hit () {
        echo "<p>" . "Hand: APPERCOT!!!" . "</p>";
    }
}

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