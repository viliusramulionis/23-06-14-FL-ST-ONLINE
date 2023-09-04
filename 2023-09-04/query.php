<?php
    // $color = 'black';

    // if(isset($_GET['color']))
    //     $color = $_GET['color'];

    //Ternary operatoriaus užrašymas
    $color = isset($_GET['color']) ? $_GET['color'] : 'black';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
            color: white;
        }
    </style>
</head>
<body style="background: <?= $color; ?>;">
    <a href="?color=red">Raudona</a>
    <a href="?color=blue">Mėlyna</a>
    <a href="?color=yellow">Geltona</a>
</body>
</html>