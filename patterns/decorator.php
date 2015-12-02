<?php
class Car {
    public $model;
    public function __construct ($model) {
        $this->model = $model;
        $this->go();
    }
    public function go() {
        echo "<p>{$this->model} Is on the road!!!</p>";
    }
    public function getModel () {
        return $this->model;
    }
}

class CarDecorator {
    public $car;
    public $model;
    public function __construct ($car) {
        $this->car = $car;
        $this->resetModel();
    }
    public function resetModel() {
        $this->model = $this->car->getModel();
    }

    public function showModel () {
        echo "<p>{$this->model}</p>";
        $this->resetModel();
    }
}

class PoliceCar extends CarDecorator {
    private $decorator;
    public function __construct ($decorator) {
        $this->decorator = $decorator;
    }

    public function policeModel () {
        $this->decorator->model = "{$this->decorator->model} - Police->->...";
    }
}

class MedicalCar extends CarDecorator {
    private $decorator;
    public function __construct ($decorator) {
        $this->decorator = $decorator;
    }

    public function medicalModel () {
        $this->decorator->model = "{$this->decorator->model} - Medical->->...";
    }
}