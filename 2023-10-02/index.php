<?php 

namespace Centrorokstaras\App;

require_once './vendor/autoload.php';

$climate = new \League\CLImate\CLImate;

// readline('Jūsų vardas: ');

// $climate->green('Whoa now this text is red.');

// \Centrorokstaras\App\A::index();

// B::index();
$climate->style->addColor('lilac', 38);
$terminal = new \Symfony\Component\Console\Terminal;
$terminalWidth = $terminal->getWidth();
$symbols = "ABCDEFGH";

while(true) {
    $res = '';
    
    for($i = 0; $i < $terminalWidth; $i++) {
        if(rand(0, 1) === 1)
            $res .= ' ';
        else
            $res .= $symbols[rand(0, strlen($symbols) - 1)];
    }

    // Nauja eilutė
    // echo "\n";

    $climate->green($res);

    usleep(50000);
}