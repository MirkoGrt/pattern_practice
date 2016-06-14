<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:05
 */

namespace Patterns\Creational\Builder;


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
        $this->page = "<div>"
            . "<div>"
            . "<p>" . $this->pageTitle . "</p>"
            . "</div>"
            . "<h1 style='text-align:center'>" . $this->pageHeading . "</h1>"
            . "<p style='text-align:center'>" . $this->pageText . "</p>"
            . "</div>";
    }
}