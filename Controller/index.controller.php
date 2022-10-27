<?php

require_once ("Model/product.model.php");

$_product = new product_model();
$products = $_product->getProducts();

$usuario = null;
session_start();
if(isset($_SESSION["usuario_logueado"])) {
    $usuario = $_SESSION["usuario_logueado"];
}

require_once ("View/Commons/nav_bar.php");
require_once ("View/Index/presentation.php");
require_once ("View/Index/most_purchased.php");
require_once ("View/Index/best_offers.php");
require_once ("View/Index/cheapest_products.php");
require_once ("View/Index/product_list.php");