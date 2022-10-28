<?php
require_once ("./../Model/product.model.php");

$_product = new product_model();

if(isset($_POST["petition"])) {
    $id_categoria = $_POST["id_categoria"];

    $productos = $_product->searchProductsByCat($id_categoria);

    if (Count($productos) != 0) {
        session_start();
        $_SESSION['productos'] = $productos;
        echo (1);
    } else {
        echo (0);
    }
}