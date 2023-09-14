<?php
//Informacijos paėmimas iš duomenų bazės
function getData($accounts = true) {
    $file = $accounts ? './data/accounts.json' : './data/users.json';

    return json_decode(file_get_contents($file), true);
}

//Informacijos išssaugojimas duomenų bazėje
function saveData($data) {
    return file_put_contents('./data/accounts.json', json_encode($data));
}

//Duomenų validacija
function validate($keys, $data) {
    foreach(array_keys($keys) as $key) {
        if(!isset($data[$key]) OR strlen($data[$key]) <= 3)
            return false;
    }

    return true;
}

//Asmens kodo validacija
function validatePersonalNumber($ak) {
    $genders = [1, 2, 3, 4, 5, 6];
    $coeficient1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 1];
    $coeficient2 = [3, 4, 5, 6, 7, 8, 9, 1, 2, 3];
    
    //https://www.php.net/manual/en/function.is-numeric.php
    if(!is_numeric($ak))
        return false;

    //https://www.php.net/manual/en/function.in-array.php
    if(!in_array($ak[0], $genders))
        return false;
    
    if(strlen($ak) !== 11)
        return false;

    $res = 0;

    foreach($coeficient1 as $i => $digit) {
        $res += $ak[$i] * $digit;
    }

    if($res % 11 < 10 AND $res % 11 != $ak[strlen($ak) - 1]) 
        return false;
    
    $res = 0;

    foreach($coeficient2 as $i => $digit) {
        $res += $ak[$i] * $digit;
    }

    if($res % 11 >= 10 AND $ak[strlen($ak) - 1] != 0)
        return false;
    
    if($res % 11 < 10 AND $res % 11 != $ak[strlen($ak) - 1])
        return false;

    return true;
}

//Sąskaitos numerio validacija
function checkIBAN($code) {
    if(strlen($code) !== 20)
        return false;

    //https://www.php.net/manual/en/function.substr.php
    //https://www.php.net/manual/en/function.strtolower.php
    if(strtolower(substr($code, 0, 2)) !== 'lt')
        return false;

    if(str_contains($code, '.'))
        return false;

    if(!is_numeric(substr($code, 2)))
        return false;

    return true;
}

function generateIBAN() {
    $iban = 'LT';

    for($i = 0; $i < 18; $i++) {
        $iban .= rand(0, 9);
    }
    
    return $iban;
}

function cleanData($keys, $data) {
    foreach(array_keys($data) as $key) {
        if(!array_key_exists($key, $keys))
            unset($data[$key]);
    }

    return $data;
}