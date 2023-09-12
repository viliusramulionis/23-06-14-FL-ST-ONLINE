<?php

function getData() {
    return json_decode(file_get_contents('./data/db.json'), true);
}

function validate($keys, $data) {
    foreach(array_keys($keys) as $key) {
        if(!isset($data[$key]) OR strlen($data[$key]) <= 3)
            return false;
    }

    return true;
}