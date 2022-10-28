<?php
require_once ("./../Model/product.model.php");

$_product = new product_model();

if(isset($_POST["petition"])) {
    $nombre = $_POST["nombre"];

    $productos = $_product->searchProductsByName($nombre);

    if (Count($productos) != 0) {
        session_start();
        $_SESSION['productos'] = $productos;
        echo (1);
    } else {
        echo (0);
    }
}