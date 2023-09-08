<?php
echo '<pre>';

function divide($a, $b) {
    return $a / $b;
}

echo divide(10, 2) . '<br />';

//Arrow funkcija
$multiply = fn($a, $b) => $a * $b;

echo $multiply(10, 2). '<br />';

$array = [10, 20, 30, 40];
$array2 = [20, 30, 40, 50];

// $newArray = array_map(fn($value) => $value + 5, $array);

// print_r($newArray);


// $newArray = [];

// foreach($array as $index => $value) {
//     $newArray[] = $value + 5;
// }

// print_r($newArray);

$newArray = array_map(function($value, $value2) {
    return $value + $value2;
}, $array, $array2);

print_r(array_keys($newArray));
print_r($newArray);

//Padauginkite masyvo reikšmes iš to elemento indekso
$newArray = array_map(fn($value, $index) => $value * $index, 
                        $newArray, array_keys($newArray)
                    );
print_r($newArray);

//Fukcija grąžinanti atgal funkciją

function sum($a) {
    return fn($b) => $a + $b;
}

$result = sum(5);

echo $result(10);

