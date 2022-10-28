<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Most Purchased</title>
</head>
<body>
<input type="text" id="id_usuario" value="<?php echo $id_usuario ?>" hidden>
<h2 class="me-5 ms-5 mt-5">Lo más vendido</h2>
<div class="row row-cols-1 row-cols-md-3 g-4 me-5 ms-5 mb-5" id="zona6">
  
<?php 
          foreach ($mostPurchasedProducts as $renglon) 
          {
            $id_producto; $id_categoria; $nombre; $descripcion; $foto; $descuento; $tipo; $precio_unitario;
            foreach ($renglon as $columna => $valor) 
            { 
              if ($columna == "id_producto") 
              {
                $id_producto = $valor; 
              }
              
              if ($columna == "id_categoria") 
              {
                $id_categoria = $valor;
              }
              
              if ($columna == "nombre")
              {
                $nombre = $valor;
              }
              
              if ($columna == "descripcion")
              {
                $descripcion = $valor;
              }
              
              if ($columna == "foto")
              {
                $foto = $valor;
              }
              
              if ($columna == "descuento")
              {
                $descuento = $valor;
              }

              if ($columna == "tipo")
              {
                $tipo = $valor;
              }

              if ($columna == "precio_unitario")
              {
                $precio_unitario = $valor;
              }
            }
    ?>
    <div class="col">
      <div class="card h-100">
        <img src="<?php echo $foto ?>" class="card-img-top"
          alt="Failed to load" />
        <div class="card-body">
          <h5 class="card-title"><?php echo $nombre ?></h5>
          <p class="card-text">
            <?php echo $descripcion ?> <br>
            <?php 
              if($tipo == 1) {
            ?>
            $<?php echo $precio_unitario ?> el kilo
            <?php 
              } else {
            ?>
             $<?php echo $precio_unitario ?> por unidad
            <?php 
              }
            ?>
          </p>
          
          <!-- Button trigger modal -->
          <button type="button" name="btnOpenModal" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar al carrito
            <input type="text" id="id_producto" value="<?php echo $id_producto ?>" hidden>
            <input type="text" id="descuento" value="<?php echo $descuento ?>" hidden>
            <input type="text" id="tipo" value="<?php echo $tipo ?>" hidden>
            <input type="text" id="precio_unitario" value="<?php echo $precio_unitario ?>" hidden>
            <input type="text" id="nombre" value="<?php echo $nombre ?>" hidden>
          </button>

        </div>
        <div class="card-footer">
          <small class="text-muted">Descuento del: <?php echo $descuento ?>%</small>
        </div>
      </div>
    </div>

  <?php } ?>

</div>

</body>
</html>