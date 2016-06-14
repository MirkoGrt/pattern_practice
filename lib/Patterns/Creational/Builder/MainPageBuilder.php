<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:13
 */

namespace Patterns\Creational\Builder;


class MainPageBuilder extends AbstractPageBuilder {
    private $page = NULL;

    function __construct ($pageType) {
        $this->page = $pageType;
    }

    function setTitle ($title_in) {
        $this->page->setTitle($title_in);
    }

    function setHeading($heading_in) {
        $this->page->setHeading($heading_in);
    }

    function setText($text_in) {
        $this->page->setText($text_in);
    }

    function formatPage () {
        $this->page->formatPage();
    }

    function getPage() {
        return $this->page;
    }
}