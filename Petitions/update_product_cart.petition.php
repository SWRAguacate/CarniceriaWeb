<?php
require_once ("./../Model/cart.model.php");

$_cart = new cart_model();

if(isset($_POST["petition"])) {
    $id_producto_carrito = $_POST["id_producto_carrito"];
    $unidades = $_POST["unidades"];
    $kilos = $_POST["kilos"];
    $precio_final = $_POST["precio_final"];

    $_cart->updateCartItem($id_producto_carrito, $unidades, $kilos, $precio_final);
    echo (1);
}