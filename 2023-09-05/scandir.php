<?php
//?path=test/test2
$path = isset($_GET['path']) ? $_GET['path'] : '.';

$files = scandir($path);

unset($files[0]);

if($path === '.')
    unset($files[1]);

foreach($files as $file) {
    if($file !== 'index.php')
        echo "<li><a href=\"?path=$path/$file\">$file</a></li>";
}