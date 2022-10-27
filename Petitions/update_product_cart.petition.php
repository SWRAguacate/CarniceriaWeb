<?php
require_once ("./../Model/cart.model.php");

$_cart = new cart_model();

if(isset($_POST["petition"])) {
    $id_producto_carrito = $_POST["id_producto_carrito"];
    $unidades = $_POST["unidades"];
    $kilos = $_POST["kilos"];
    $tipo = $_POST["tipo"];
    $precio_unitario = $_POST["precio_unitario"];
    $porcentajeDescuento = $_POST["descuento"];

    if($tipo == 0){
        $descuentoDecimal = $porcentajeDescuento/100;
        $descuento = $precio_unitario * $descuentoDecimal;
        $precio_unitario = $precio_unitario - $descuento;
        $precio_final = $precio_unitario * $unidades;
    } else {
        $descuentoDecimal = $porcentajeDescuento/100;
        $descuento = $precio_unitario * $descuentoDecimal;
        $precio_unitario = $precio_unitario - $descuento;
        $precio_final = $precio_unitario * $kilos;
    }

    $_cart->updateCartItem($id_producto_carrito, $unidades, $kilos, $precio_final);
    echo (1);
}