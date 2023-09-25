<?php

//OOP - Object oriented programming
//Klasė yra objekto šablonas

class Cars {
    //Savybės - properties
    //https://www.php.net/manual/en/language.oop5.properties.php
    private $brands = [
        'BMW', 'Audi', 'Tesla', 'Opel'
    ];
    public static $stock = 0;

    //Startinis metodas, pavadinimas turi būti nurodomas būtent toks (__construct())
    public function __construct($makers) {
        self::$stock++;

        foreach($makers as $brand) {
            $this->setBrand($brand);
        }
    }

    //Getteris (Getter)
    public function getBrands() {
        return $this->brands;
    }
    
    //Setteris (Setter)
    private function setBrand($add) {
        $this->brands[] = $add;
    }
}

//Objekto kūrimas be klasės
// $cars = (object) ['pirmas' => 'antras'];
// print_r($cars);

//Generuojamas objektas pasitelkiant klasės šabloną
//Gaunama instancija (Instance)

echo Cars::$stock .'<br />';

$cars = new Cars(['Peugeot', 'Jaguar']);
// $cars->addBrand('Toyota');
echo '<pre>';
var_dump($cars);

echo Cars::$stock .'<br />';

$cars1 = new Cars([]);
var_dump($cars1->getBrands());

echo Cars::$stock .'<br />';



// print_r($cars->brands);