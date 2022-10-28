<?php

class cart_model {

    private $db;
    private $carts_model;

    public function __construct() {
        require_once 'connection.model.php';
        $this->db = conectar::conexion();
        $this->carts_model = array();
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
        $sql = "select pc.id_producto_carrito, pc.unidades, pc.kilos, pc.precio_final, p.descuento, "
        . "p.tipo, p.nombre, p.descripcion, p.foto, p.precio_unitario FROM producto_carrito AS pc JOIN producto  AS p ON p.id_producto = pc.id_producto " 
        . "WHERE pc.estatus = 0 and pc.id_carrito = :id_carrito";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_carrito" => $id_carrito));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->carts_model[] = $filas;
        }
        return $this->carts_model;
    }

    public function getTotalCartItems($id_carrito) {
        $this->carts_model = array();
        $sql = "select count(*) as total from producto_carrito where id_carrito = :id_carrito and estatus = 0";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_carrito" => $id_carrito));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->carts_model[] = $filas;
        }
        return $this->carts_model;
    }

    public function updateCartItem($id_producto_carrito, $unidades, $kilos, $precio_final) {
        $sql = "update producto_carrito set "
        . "unidades = :unidades,"
        . "kilos = :kilos," 
        . "precio_final = :precio_final "
        . "where id_producto_carrito = :id_producto_carrito";
        $result = $this->db->prepare($sql);
        $result->execute(array(":unidades" => $unidades, ":kilos" => $kilos, ":precio_final" => $precio_final, ":id_producto_carrito" => $id_producto_carrito));
    }

    public function addProductPurchased($id_compra, $id_usuario, $id_producto_carrito) {
        $sql = "insert into producto_compra (id_compra, id_usuario, id_producto_carrito) values (:id_compra, :id_usuario, :id_producto_carrito)";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_compra" => $id_compra, ":id_usuario" => $id_usuario, ":id_producto_carrito" => $id_producto_carrito));
        return 1;
    }

    public function purchaseProducts($id_carrito) {
        $sql = "update producto_carrito set estatus = 1 where id_carrito = :id_carrito";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_carrito" => $id_carrito));
    }

    public function addPurchase($id_usuario) {
        $sql = "insert into compra (id_usuario) values (:id_usuario)";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_usuario" => $id_usuario));
        return 1;
    }

    public function getLastPurchase($id_usuario) {
        $this->carts_model = array();
        $sql = "select MAX(id_compra) as id_compra from compra where id_usuario = :id_usuario";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_usuario" => $id_usuario));
        while ($filas = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->carts_model[] = $filas;
        }
        $id_compra = 0;
        foreach ($this->carts_model as $renglon) { foreach ($renglon as $columna => $valor) { 
            if ($columna == "id_compra" && $valor != null) {  $id_compra = $valor; }
        } }

        return $id_compra;
    }
    
    public function checkOutCart($id_carrito, $id_usuario, $productos) {
        $this->addPurchase($id_usuario);
        $this->purchaseProducts($id_carrito);
        $id_compra = $this->getLastPurchase($id_usuario);

        foreach ($productos as $renglon) 
        {
            $id_producto_carrito = null;
            foreach ($renglon as $columna => $valor) 
            { 
                if ($columna == "id_producto_carrito" && $valor != null) 
                {  
                    $id_producto_carrito = $valor;
                }
            }
            $this->addProductPurchased($id_compra, $id_usuario, $id_producto_carrito);
        }
    }

    public function deleteCartItem($id_producto_carrito) {
        $sql = "DELETE FROM producto_carrito WHERE id_producto_carrito = :id_producto_carrito";
        $result = $this->db->prepare($sql);
        $result->execute(array(":id_producto_carrito" => $id_producto_carrito));
    }

}
