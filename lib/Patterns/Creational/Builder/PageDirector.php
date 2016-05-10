<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:14
 */

namespace Patterns\Creational\Builder;


class PageDirector extends AbstractPageDirector {
    private $builder = NULL;

    public function __construct(AbstractPageBuilder $builder_in) {
        $this->builder = $builder_in;
    }

    public function buildPage() {
        $this->builder->setTitle('OneColumnPage');
        $this->builder->setHeading('Hello One Column');
        $this->builder->setText('One Column Text');
        $this->builder->formatPage();
    }

    public function getPage() {
        return $this->builder->getPage();
    }
}