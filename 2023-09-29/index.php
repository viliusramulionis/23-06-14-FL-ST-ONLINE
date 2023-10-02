<?php

// require_once('./model/Orders.php');
// require_once('./controller/Orders.php');

// Model\Orders::index();
// Controller\Orders::index();

//Autoloaderis
spl_autoload_register(function($klase) {
    $filename = $klase . '.php';

    if(is_file($filename))
        include $filename;
});

// Orders::index();

// Model\Orders::index();

// Lib\Movies\OnceUpponATimeInHollywood::index();
// Lib\Sounds\Ocean::index();
Controller\Orders::index();
