<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 11.08.16
 * Time: 14:36
 */

namespace lib\Patterns\Structural\Composite;


class CountryComponent extends AbstractComponent {

    private $regions = [];

    public function add(AbstractComponent $region) {
        $this->regions[$region->name] = $region;
    }

    public function remove(AbstractComponent $region) {
        unset($this->regions[$region->name]);
    }

    public function display() {
        echo "<h5> Country Name - " . $this->name . "</h5>";
        var_dump($this->regions);
    }
}