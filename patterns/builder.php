<?php
abstract class AbstractPageBuilder {
    abstract function getPage();
}

abstract class AbstractPageDirector {
    abstract function __construct (AbstractPageBuilder $builder_in);
    abstract function buildPage();
    abstract function getPage();
}

class OneColumnPage {
    private $page = NULL;
    private $pageTitle = NULL;
    private $pageHeading = NULL;
    private $pageText = NULL;

    function __construct () {}

    function showPage () {
        return $this->page;
    }

    function setTitle ($title_in) {
        $this->pageTitle = $title_in;
    }

    function setHeading ($heading_in) {
        $this->pageHeading = $heading_in;
    }

    function setText ($text_in) {
        $this->pageText = $text_in;
    }

    function formatPage () {
        $this->page = "<html>"
                            . "<head>"
                                . "<title>" . $this->pageTitle . "</title>"
                            . "</head>"
                            . "<body>"
                                . "<h1 style='text-align:center'>" . $this->pageHeading . "</h1>"
                                . "<p style='text-align:center'>" . $this->pageText . "</p>"
                            . "</body>"
                    . "</html>";
    }
}

class TwoColumnsRightPage {
    private $page = NULL;
    private $pageTitle = NULL;
    private $pageHeading = NULL;
    private $pageText = NULL;

    function __construct () {}

    function showPage () {
        return $this->page;
    }

    function setTitle ($title_in) {
        $this->pageTitle = $title_in;
    }

    function setHeading ($heading_in) {
        $this->pageHeading = $heading_in;
    }

    function setText ($text_in) {
        $this->pageText = $text_in;
    }

    function formatPage () {
        $this->page = "<html>"
            . "<head>"
            . "<title>" . $this->pageTitle . "</title>"
            . "</head>"
            . "<body>"
            . "<div style='width: 65%; display: inline-block;'>"
            . "<h1 style='text-align:center'>" . $this->pageHeading . "</h1>"
            . "<p style='text-align:center'>" . $this->pageText . "</p>"
            . "</div>"
            . "<div style='width: 30%; display: inline-block; border-left: 1px solid black'>"
            . "<h1 style='text-align:center'>Sidebar</h1>"
            . "</div>"
            . "</body>"
            . "</html>";
    }
}

class OneColumnPageBuilder extends AbstractPageBuilder {
    private $page = NULL;

    function __construct () {
        $this->page = new OneColumnPage();
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

class TwoColumnsRightPageBuilder extends AbstractPageBuilder {
    private $page = NULL;

    function __construct () {
        $this->page = new TwoColumnsRightPage();
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
