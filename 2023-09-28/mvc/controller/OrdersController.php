<?php

class OrdersController {
    public static function index() {
        $orders = new Orders;
        $orders = $orders->getAll();

        include './view/orders.php';
    }
}