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

    public function searchProductsByName($nombre) {
        $this->products_model = array();
        $sql = "select * FROM producto where nombre like '%".$nombre."%' or nombre like '%".$nombre."' or nombre like '".$nombre."'";
        $result = $this->db->prepare($sql);
        $result->execute();
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->products_model[] = $filas;
        }
        return $this->products_model;
    }

    public function searchProductsByCat($id_categoria) {
        $this->products_model = array();
        $sql = "select * FROM producto where id_categoria = :id_categoria";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_categoria" => $id_categoria));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->products_model[] = $filas;
        }
        return $this->products_model;
    }

    public function getCategories() {
        $this->products_model = array();
        $sql = "select * from categoria";
        $result = $this->db->prepare($sql);
        $result->execute();
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->products_model[] = $filas;
        }
        return $this->products_model;
    }

    public function getBestOffers() {
        $this->products_model = array();
        $sql = "select * from producto order by descuento desc limit 3";
        $result = $this->db->prepare($sql);
        $result->execute();
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->products_model[] = $filas;
        }
        return $this->products_model;
    }

    public function getCheapestProducts() {
        $this->products_model = array();
        $sql = "select * from producto order by precio_unitario asc limit 3";
        $result = $this->db->prepare($sql);
        $result->execute();
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->products_model[] = $filas;
        }
        return $this->products_model;
    }

    public function getMostPurchasedProducts() {
        $this->products_model = array();
        $sql = "select id_producto, id_categoria, nombre, descripcion, foto, descuento, tipo, precio_unitario, "
        . "fun_total_ventas(id_producto) as total_ventas from producto order by total_ventas desc limit 3";
        $result = $this->db->prepare($sql);
        $result->execute();
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->products_model[] = $filas;
        }
        return $this->products_model;
    }
}
