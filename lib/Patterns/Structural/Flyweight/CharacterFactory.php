<?php

/**
 * Created by PhpStorm.
 * User: mirko
 * Date: 17.08.16
 * Time: 12:49
 */

namespace lib\Patterns\Structural\Flyweight;

class CharacterFactory {
    
    private $characters = array();
    
    public function getCharacter ($key) {
        
        if (!array_key_exists($key, $this->characters)) {
            switch ($key) {
                case 'a': $this->characters[$key] = new CharacterA(); break;
                case 'b': $this->characters[$key] = new CharacterB(); break;
                case 'c': $this->characters[$key] = new CharacterC(); break;
                case 'd': $this->characters[$key] = new CharacterD(); break;
                default: $this->showKeyNotFromArray($key); break;
            }
        }
        return $this->characters[$key];
    }

    protected function showKeyNotFromArray ($key) {
        echo "<span class=\"mdl-chip mdl-chip--contact\">
                <span class=\"mdl-chip__contact mdl-color--red mdl-color-text--white\">{$key}</span>
                <span class=\"mdl-chip__text\">not from factory</span>
            </span>";
    }

    public function displayAllFactoryCharacters () {
        var_dump($this->characters);
    }
}