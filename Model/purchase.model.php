<?php

class purchase_model {

    private $db;
    private $purchases_model;

    public function __construct() {
        require_once 'connection.model.php';
        $this->db = conectar::conexion();
        $this->purchases_model = array();
    }

    public function getPurchases($id_usuario) {
        $this->purchases_model = array();
        $sql = "select p.nombre, p.descripcion, p.tipo, p.foto, pc.unidades, pc.kilos, pc.precio_final, c.fecha_compra from "
        . "producto_compra as pco join compra as c on c.id_compra = pco.id_compra join producto_carrito as pc on "
        . "pc.id_producto_carrito = pco.id_producto_carrito join producto as p on p.id_producto = pc.id_producto where pco.id_usuario = :id_usuario";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_usuario" => $id_usuario));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->purchases_model[] = $filas;
        }
        return $this->purchases_model;
    }
}