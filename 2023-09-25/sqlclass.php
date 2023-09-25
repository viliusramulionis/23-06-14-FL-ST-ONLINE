<?php

// MVC
// M - Model 
// V - View 
// C - Controller 

class Sql {
    private $db;
    private $table;

    public function __construct($table) {
        try {
            $this->db = new mysqli('localhost', 'root', '', 'todo');
            $this->table = $table;
        } catch (Exception $klaida) {
            echo 'Nepavyko prisijungti';
            exit;
        }
    }

    public function addRow($data) {
        $keys = implode(',' ,array_keys($data));
        $values = "'" . implode("', '" , $data) . "'";
        $this->db->query("INSERT INTO $this->table ($keys) VALUES ($values)");
    }
}

$tasks = new Sql('tasks');

echo '<pre>';
// print_r($tasks);
$tasks->addRow([
    'name' => 'Išplauti indus',
    'status' => 1,
    'user_id' => 17
]);


$users = new Sql('users');

echo '<pre>';
// print_r($tasks);
$users->addRow([
    'email' => 'info@gmail.com',
    'password' => 'testas'
]);
