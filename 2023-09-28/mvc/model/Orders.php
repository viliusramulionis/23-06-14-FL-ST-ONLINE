<?php

class Orders extends Database {
    protected $table = 'orders';

    public function getOrderProduct() {
        $result = $this->db->query("SELECT * FROM $this->table JOIN products ON orders.product_id = products.id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}