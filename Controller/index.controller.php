<?php

require_once ("Model/product.model.php");
require_once ("Model/cart.model.php");

$_product = new product_model();
$_cart = new cart_model();

$products = $_product->getProducts();
$bestProducts = $_product->getBestOffers();
$cheapestProducts = $_product->getCheapestProducts();
$mostPurchasedProducts = $_product->getMostPurchasedProducts();

$usuario = null;
$carrito = null;
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
}

require_once ("View/Commons/nav_bar.php");
require_once ("View/Index/presentation.php");
require_once ("View/Index/most_purchased.php");
require_once ("View/Index/best_offers.php");
require_once ("View/Index/cheapest_products.php");
require_once ("View/Index/product_list.php");