<?php

//https://www.php.net/manual/en/function.file-get-contents.php
$html = file_get_contents('https://15min.lt');
//https://www.php.net/manual/en/function.file-put-contents.php
file_put_contents('15min.html', $html);

//is_dir() - tikrina ar pateiktas kelias yra direktorija

//https://www.php.net/manual/en/function.is-dir
if(is_dir('data'))
    echo 'Data yra direktorija';

echo '<pre>';
//https://www.php.net/manual/en/function.scandir.php
$files = scandir('.');

//Elemento iš masyvo pašalinimas
//https://www.php.net/manual/en/function.unset.php
unset($files[0]);

foreach($files as $file) {
    //https://www.php.net/manual/en/function.pathinfo
    //pathinfo($file);
    //https://www.php.net/manual/en/function.filesize.php
    //filesize($file);
    echo "<li>$file</li>";
}

//Failo ištrynimas
//https://www.php.net/manual/en/function.unlink.php
unlink('15min.html');

