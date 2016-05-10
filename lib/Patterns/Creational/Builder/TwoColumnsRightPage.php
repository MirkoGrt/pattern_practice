<?php
/**
 * Created by PhpStorm.
 * User: user3
 * Date: 10.05.16
 * Time: 10:05
 */

namespace Patterns\Creational\Builder;


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