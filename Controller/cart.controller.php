<?php

require_once ("Model/cart.model.php");

$_cart = new cart_model();

$usuario = null;
$carrito = null;
$productos_carrito = null;
$cantidad_total = 0;
$precio_con_descuentos = 0;
$precio_sin_descuentos = 0;
session_start();
if(isset($_SESSION["usuario_logueado"])) {
    $usuario = $_SESSION["usuario_logueado"];
    
    $id_usuario;
    foreach ($usuario as $renglon) { foreach ($renglon as $columna => $valor) { 
        if ($columna == "id_usuario" && $valor != null) {  $id_usuario = $valor; }
    } }
    
    $carrito = $_cart->getCartId($id_usuario);

    $id_carrito;
    foreach ($carrito as $renglon) { foreach ($renglon as $columna => $valor) { 
        if ($columna == "id_carrito" && $valor != null) {  $id_carrito = $valor; }
    } }

    $total_fila = $_cart->getTotalCartItems($id_carrito);

    foreach ($total_fila as $renglon) { foreach ($renglon as $columna => $valor) { 
        if ($columna == "total" && $valor != null) {  $cantidad_total = $valor; }
    } }

    $productos_carrito = $_cart->getCartItems($id_carrito);

} else {
    header('Location: index.php');
}

require_once ("View/Commons/nav_bar.php");
require_once ("View/Cart/cart.php");