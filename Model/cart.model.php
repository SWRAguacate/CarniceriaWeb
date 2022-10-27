<?php

class cart_model {

    private $db;
    private $carts_model;

    public function __construct() {
        require_once 'connection.model.php';
        $this->db = conectar::conexion();
        $this->carts_model = array();
    }

    public function addUserCart($id_usuario) {
        $sql = "insert into carrito (id_usuario) values (:id_usuario)";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_usuario" => $id_usuario));
    }

    public function addProductCart($id_carrito, $id_producto, $unidades, $kilos, $precio_final) {
        $sql = "insert into producto_carrito (id_carrito, id_producto, unidades, kilos, precio_final, estatus) "
        . "values (:id_carrito, :id_producto, :unidades, :kilos, :precio_final, 0)";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_carrito" => $id_carrito, ":id_producto" => $id_producto, ":unidades" => $unidades, ":kilos" => $kilos, ":precio_final" => $precio_final));
    }

    public function getCartId($id_usuario) {
        $this->carts_model = array();
        $sql = "select * from carrito where id_usuario = :id_usuario";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_usuario" => $id_usuario));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->carts_model[] = $filas;
        }
        return $this->carts_model;
    }

    public function getCartItems($id_carrito) {
        $this->carts_model = array();
        $sql = "select pc.id_producto_carrito, pc.id_carrito, pc.unidades, pc.kilos, pc.precio_final, p.descuento, "
        . "p.tipo, p.precio_unitario FROM producto_carrito AS pc JOIN producto  AS p ON p.id_producto = pc.id_producto " 
        . "WHERE pc.estatus = 0 and pc.id_carrito = :id_carrito";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_carrito" => $id_carrito));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->carts_model[] = $filas;
        }
        return $this->carts_model;
    }

    public function updateCartItem($id_producto_carrito, $unidades, $kilos, $precio_final) {
        $sql = "update producto_carrito set "
        . "unidades = IFNULL (:unidades, unidades),"
        . "kilos = IFNULL (:kilos, kilos)," 
        . "precio_final = (:precio_final, precio_final) "
        . "where id_producto_carrito = :id_producto_carrito and estatus = 0";
        $result = $this->db->prepare($sql);
        $result->execute(array(":unidades" => $unidades, ":kilos" => $kilos, ":precio_final" => $precio_final, ":id_producto_carrito" => $id_producto_carrito));
    }
    
    public function checkOutCart($id_carrito, $id_usuario, $productos) {
        $products_injection = "";
        foreach ($productos as $renglon) 
        { 
            foreach ($renglon as $columna => $valor) 
            { 
                if ($columna == "id_producto_carrito" && $valor != null) 
                {  
                    $products_injection = $products_injection . "insert into producto_compra (id_usuario, id_producto_carrito) values (" . $id_usuario . ", " .$valor . "); ";
                }
            } 
        }

        $sql = "insert into compra (id_usuario) values (:id_usuario); " . $products_injection
        . "update producto_carrito set estatus = 1 where id_carrito = :id_carrito and estatus = 0;";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_usuario" => $id_usuario, ":id_carrito" => $id_carrito));
    }

    public function deleteCartItem($id_producto_carrito) {
        $sql = "DELETE FROM producto_carrito WHERE id_producto_carrito = :id_producto_carrito";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_producto_carrito" => $id_producto_carrito));
    }

}
