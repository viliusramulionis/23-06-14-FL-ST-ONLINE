<?php
//Hypertext Preprocessor

echo 'Labas Pasauli <br />';
print '<h1>Sveiki visi</h1>';
print('<h2>Hello World</h2>');

$pirmasZodis = 'Labas';
$antrasZodis = 'Pasauli';

echo $pirmasZodis . ' ' . $antrasZodis; 

echo "<h2>$pirmasZodis $antrasZodis</h2>";

$x = 10;
$x++;

echo $x . '<br />';

$x += 15;

echo $x . '<br />';

echo ++$x. '<br />';

echo --$x. '<br />';

//Masyvo sukūrimas
$masyvas = array('Obuolys', 'Citrina', 'Apelsinas');

//Neteisingas atvaizdavimo būdas
//Warning: Array to string conversion
//echo $masyvas;

//Masyvo atvaizdavimas
echo '<pre>'; //Efektyvesniam masyvo atvaizdavimui

//Naujos reikšmės pridėjimas
$masyvas[] = 'Bananas';

print_r($masyvas);

//Asociatyvus masyvas
$masyvas = array(
    'pirmas' => 'Obuolys', 
    'antras' => 'Citrina',
    'trecias' => 'Apelsinas'
);

print_r($masyvas);

//Reiksmės paėmimas pagal raktinį žodį
echo $masyvas['trecias'] . '<br />';

//Modernus masyvo aprašymo būdas
$masyvas = [
    'pirmas' => 'Obuolys', 
    'antras' => 'Citrina',
    'trecias' => 'Apelsinas'
];

$masyvas['naujaReiksme'] = 'Bananas'; 

print_r($masyvas);

$masyvoIlgis = count($masyvas);

echo "<h3>Masyvo ilgis: $masyvoIlgis</h3>";

for($i = 0; $i < 10; $i++) {
    echo "Iteracijos numeris $i <br />";
    $masyvas[] = 'Pridėta reikšmė';
}

print_r($masyvas);

$masyvas = ['Audi', 'BMW', 'Opel', 'Toyota'];

//Reikšmių iš masyvo paėmimas
foreach($masyvas as $value) {
    echo $value . '<br />';
}

//Indeksu ir reiksmiu paemimas
foreach($masyvas as $indeksas => $reiksme) {
    echo "Indeksas yra $indeksas, o reikšmė: $reiksme <br />";
}

if(is_array($masyvas)) {
    echo 'Tai yra masyvas <br />';
}

$x = false;

if(is_bool($x)) {
    echo 'Tai yra boolean reikšmė <br />';
}

//is_array() - Masyvo tikrinimas
//is_bool() - Boolean tikrinimas
//is_int() - Sveiko skaičiaus tikrinimas
//is_float() - Skaičiaus po kablelio tikrinimas
//is_string() - Stringo tikrinimas

//AND operatorius
if(is_array($masyvas) && is_bool($x)) {
    //...
}

//OR operatorius
if(is_array($masyvas) || is_bool($x)) {
    //...
}

//AND operatorius
if(is_array($masyvas) AND is_bool($x)) {
    //...
}

//OR operatorius
if(is_array($masyvas) OR is_bool($x)) {
    //...
}

//https://www.php.net/manual/en/function.max
echo max(15, 5, 105, 25) . '<br />';
//https://www.php.net/manual/en/function.min
echo min(15, 5, 105, 25) . '<br />';
//https://www.php.net/manual/en/function.round
$round = round(3.4555416);
echo "Suapvalinta reikšmė $round";

