<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 11.08.16
 * Time: 14:36
 */

namespace lib\Patterns\Structural\Composite;


class RegionComponent extends AbstractComponent {
    private $cities = [];

    public function add(AbstractComponent $city) {
        $this->cities[$city->name] = $city;
    }

    public function remove(AbstractComponent $city) {
        unset($this->cities[$city->name]);
    }
}