<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 29.06.16
 * Time: 10:37
 */

namespace Patterns\Structural\Proxy;

class RobotDefuserProxy extends RobotDefuser {

    private $robotDefuser;
    private $communicationWaveLength;
    private $connectionAttempts = 3;
    public $isBoomed = false;
    

    public function __construct($waveLength) {
        $this->communicationWaveLength = $waveLength;
    }
    public function turnLeft () {
        $this->ensureConnectionWithRobot();
        $this->robotDefuser->walkLeft();
    }

    public function turnRight () {
        $this->ensureConnectionWithRobot();
        $this->robotDefuser->walkRight();
    }

    public function turnUp () {
        $this->ensureConnectionWithRobot();
        $this->robotDefuser->walkUp();
    }

    public function turnDown () {
        $this->ensureConnectionWithRobot();
        $this->robotDefuser->walkDown();
    }

    public function defusing ($trueWire, $randomWire) {
        $this->ensureConnectionWithRobot();
        if ($trueWire == $randomWire) {
            $this->robotDefuser->defuseBomb($trueWire);
        } else {
            $this->robotDefuser->boom();
        }
    }

    public function ensureConnectionWithRobot () {
        $this->robotDefuser = new RobotDefuser();
        for ($i = 0; $i < $this->connectionAttempts; $i++) {
            if (!$this->robotDefuser->isConnected) {
                echo 'checking-connection... | Connection attempt: ' . $i . '...</br>';
                $this->robotDefuser->connectRobot($this->communicationWaveLength);
            } else {
                continue;
            }
        }
        if (!$this->robotDefuser->isConnected) {
            echo 'ERROR: no connection with robot!!!</br>';
            $this->robotDefuser->boom();
            $this->isBoomed = true;
        }
    }
}