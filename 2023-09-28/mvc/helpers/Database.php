<?php

class Database {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'shop';

    protected static $db = false;
    protected $table; 
    
    public function __construct() {
        if(self::$db) 
            return;

        try {
            self::$db = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
        } catch (Exception $klaida) {
            echo 'Nepavyko prisijungti';
            exit;
        }
    }

    public function getAll() {
        $result = self::$db->query("SELECT * FROM $this->table");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addRow($data) {
        $keys = implode(',' ,array_keys($data));
        $values = "'" . implode("', '" , $data) . "'";
        self::$db->query("INSERT INTO $this->table ($keys) VALUES ($values)");
    }

    public function editRow($data, $id) {
        $values = [];

        foreach($data as $key => $val) {
            $values[] = "$key = '$val'";
        }
        $values = implode(',' , $values);

        self::$db->query("UPDATE $this->table SET $values WHERE id = $id");
    }

    public function deleteRow($id) {
        self::$db->query("DELETE FROM $this->table WHERE id = $id");
    }

}
