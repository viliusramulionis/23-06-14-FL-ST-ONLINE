<?php

//https://www.php.net/manual/en/function.define.php
define('URL', 'https://google.com');

echo URL . '<br />';

class Movies {
    const PAVADINIMAS = 'American Beauty';

    public static $counter = 0;

    public function __construct() {
        self::$counter++;
    }

    public static function getNumber() {
        return rand(0, 1000);
    }

    public static function getTitle() {
        return self::PAVADINIMAS;
    }
}

echo Movies::PAVADINIMAS . '<br />';

echo Movies::getNumber() . '<br />';

new Movies;
new Movies; 
new Movies;
new Movies;

echo Movies::$counter . '<br />';
echo Movies::getTitle(). '<br />';