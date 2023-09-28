<?php

require_once('./helpers/Database.php');
require_once('./model/Products.php');
require_once('./model/Orders.php');
require_once('./controller/ProductsController.php');
require_once('./controller/OrdersController.php');
// M - Model. Modelis atsakingas už duomenų paėmimą
// V - View. Atsakingas už duomenų atvaizdavimą
// C - Controller. Atsakingas už duomenų apdorojimą

// $products = new Products();
// $products->editRow([
//     'name' => 'Super duper Televizorius',
//     'description' => 'Labai kietas aprašymas'
// ], 1);
// // print_r($products->getAll());

// $orders = new Orders();
// print_r($order->getOrderProduct());

$page = isset($_GET['page']) ? $_GET['page'] : false;

//Routeris
switch($page) {
    case 'orders':
        //Užsakymai
        OrdersController::index();
        break;
    case 'products':
        //Produktai
        ProductsController::index();
        break;
    default:
        //Titulinis
        break;
}

?>

<a href="?page=orders">Orders</a>
<a href="?page=products">Products</a>


