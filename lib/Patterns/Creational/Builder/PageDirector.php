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
        $this->builder->setTitle('Page Title');
        $this->builder->setHeading('Page heading');
        $this->builder->setText('Page text');
        $this->builder->formatPage();
    }

    public function getPage() {
        return $this->builder->getPage();
    }
}