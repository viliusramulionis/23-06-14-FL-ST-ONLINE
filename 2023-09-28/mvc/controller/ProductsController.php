<?php

class ProductsController {

    public static function index() {
        // global $x; Norint paimti kintamąjį iš už klasės ribų

        //Kreipiamės į modelį
        $products = new Products;
        $products = $products->getAll();

        include './view/products.php';
    }

}