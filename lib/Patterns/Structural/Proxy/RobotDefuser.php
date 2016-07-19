<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 29.06.16
 * Time: 10:36
 */

namespace Patterns\Structural\Proxy;

class RobotDefuser {

    public $isConnected = false;
    public $configuredWaveLength = 107;

    public function connectRobot ($communicationWaveLength) {
        if ($communicationWaveLength == $this->configuredWaveLength) {
            $this->isConnected = $this->imitateConnectionIssues();
        }
    }

    public function imitateConnectionIssues () {
        $randomNumber = rand(0, 10);
        if ($randomNumber < 4) {
            return true;
        } else {
            return false;
        }
    }

    public function walkLeft () {
        echo '<p> Moving to bomb | go to left ...</p>';
    }

    public function walkRight () {
        echo '<p> Moving to bomb | go to right ...</p>';
    }

    public function walkUp () {
        echo '<p> Moving to bomb | go Up ...</p>';
    }

    public function walkDown () {
        echo '<p> Moving to bomb | go Down ...</p>';
    }

    public function defuseBomb ($trueWire) {
        $wireNumber = $trueWire + 1;
        echo 'THE BOMB IS DEFUSED ... Cutting wire number ' . $wireNumber .'</br>';
    }
    
    public function boom () {
        echo '<h3>BOOOM!</h3>';
    }
}