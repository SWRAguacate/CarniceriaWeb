<?php
require_once ("./../Model/cart.model.php");

$_cart = new cart_model();

if(isset($_POST["petition"])) {
    $id_carrito = $_POST["id_carrito"];
    $id_producto = $_POST["id_producto"];
    $unidades = $_POST["unidades"];
    $kilos = $_POST["kilos"];
    $precio_final = $_POST["precio_final"];

    $_cart->addProductCart($id_carrito, $id_producto, $unidades, $kilos, $precio_final);
    echo (1);
}