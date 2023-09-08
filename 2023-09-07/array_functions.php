<?php

$stringas = 'pavadinimas.config.php';
//Stringo išskaidymui į masyvą
$result = explode('.', $stringas);
// print_r($result[count($result) - 1]);

//Paskutinio masyve esančio elemento paėmimas
echo end($result);
echo '<br />';
//Masyvo elementų sujungimui į stringą 
echo implode('.', $result);
echo '<br />';

$masyvas = ['delfi.lt', '15min.lt', 'lrytas.lt', 'tv3.lt'];

// foreach($masyvas as $data) {
//     if($data === '15min.lt')
//         echo 'Toks elementas egzistuoja';
// }

if(in_array('15min.lt', $masyvas)) 
    echo 'Toks elementas egzistuoja';




