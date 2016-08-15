<?php
/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 11.08.16
 * Time: 14:36
 */

namespace lib\Patterns\Structural\Composite;


class CityComponent extends AbstractComponent {

    public function add(AbstractComponent $city) {
        print ("Cannot add to a city");
    }

    public function remove(AbstractComponent $city) {
        print("Cannot remove from a city");
    }
}