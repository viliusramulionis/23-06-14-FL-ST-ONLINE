<?php

//rmdir('./Folderis');

function remove_recursively($path) {
    $contents = scandir($path);

    for($i = 2; $i < count($contents); $i++) {
        $target = $path . '/' . $contents[$i];

        if(is_dir($target)) {
            remove_recursively($target);
            //rmdir($target);
        } else {
            unlink($target);
        }
    }

    rmdir($path);
}

$path = './Folderis';
remove_recursively($path);