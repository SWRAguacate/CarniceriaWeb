<?php
require_once ("./../Model/cart.model.php");

$_cart = new cart_model();

if(isset($_POST["petition"])) {
    $id_producto_carrito = $_POST["id_producto_carrito"];

    $_cart->deleteCartItem($id_producto_carrito);
    echo (1);
}