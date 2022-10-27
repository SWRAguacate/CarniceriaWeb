<?php

class product_model {

    private $db;
    private $products_model;

    public function __construct() {
        require_once 'connection.model.php';
        $this->db = conectar::conexion();
        $this->products_model = array();
    }

    public function getProducts() {
        $this->products_model = array();
        $sql = "select * from producto";
        $result = $this->db->prepare($sql);
        $result->execute();
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->products_model[] = $filas;
        }
        return $this->products_model;
    }
}
