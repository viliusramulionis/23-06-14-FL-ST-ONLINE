<?php

namespace Controller;

use \Lib\Movies\OnceUpponATimeInHollywood;

class Orders {
    public static function index() {
        print_r(\Lib\Sounds\Ocean::index());
        print_r(OnceUpponATimeInHollywood::index());
    }
}