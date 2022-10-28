<?php

require_once ("Model/cart.model.php");
require_once ("Model/purchase.model.php");

$_cart = new cart_model();
$_purchase = new purchase_model();

$usuario = null;
$purchases = null;
$carrito = null;
$cantidad_total = 0;
session_start();
if(isset($_SESSION["usuario_logueado"])) {
    $usuario = $_SESSION["usuario_logueado"];
    
    $id_usuario; $username; $nombre; $email; $contra; $telefono;
    foreach ($usuario as $renglon) { foreach ($renglon as $columna => $valor) { 
        if ($columna == "id_usuario" && $valor != null) {  $id_usuario = $valor; }
        if ($columna == "usuario" && $valor != null) {  $username = $valor; }
        if ($columna == "nombre" && $valor != null) {  $nombre = $valor; }
        if ($columna == "email" && $valor != null) {  $email = $valor; }
        if ($columna == "contra" && $valor != null) {  $contra = $valor; }
        if ($columna == "telefono" && $valor != null) {  $telefono = $valor; }
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

    $purchases = $_purchase->getPurchases($id_usuario);

} else {
    header('Location: index.php');
}

require_once ("View/Commons/nav_bar.php");
require_once ("View/Profile/form_update.php");
require_once ("View/Profile/history.php");