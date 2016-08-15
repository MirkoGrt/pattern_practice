<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 11.08.16
 * Time: 14:33
 */

namespace lib\Patterns\Structural\Composite;

abstract class AbstractComponent {

    protected $name;

    // Constructor
    public function __construct($name) {
        $this->name = $name;
    }

    public abstract function add(AbstractComponent $component);
    public abstract function remove(AbstractComponent $component);

}