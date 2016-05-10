<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:04
 */

namespace Patterns\Creational\Builder;


abstract class AbstractPageDirector {
    abstract function __construct (AbstractPageBuilder $builder_in);
    abstract function buildPage();
    abstract function getPage();
}