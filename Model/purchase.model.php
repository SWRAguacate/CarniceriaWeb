<?php

class purchase_model {

    private $db;
    private $purchases_model;

    public function __construct() {
        require_once 'connection.model.php';
        $this->db = conectar::conexion();
        $this->purchases_model = array();
    }

}
