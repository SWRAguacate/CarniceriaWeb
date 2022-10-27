<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation</title>
</head>
<body>

<h2 class="me-5 ms-5">Todos nuestros productos</h2>

<?php 
      foreach ($products as $renglon) 
      {
        $id_producto; $id_categoria; $nombre; $descripcion; $foto; $descuento; $tipo; $precio_unitario;
        foreach ($renglon as $columna => $valor) 
        { 
          if ($columna == "id_producto" && $valor != null) 
          {
            $id_producto = $valor; 
          }
          
          if ($columna == "id_categoria" && $valor != null) 
          {
            $id_categoria = $valor;
          }
          
          if ($columna == "nombre" && $valor != null)
          {
            $nombre = $valor;
          }
          
          if ($columna == "descripcion" && $valor != null)
          {
            $descripcion = $valor;
          }
          
          if ($columna == "foto" && $valor != null)
          {
            $foto = $valor;
          }
          
          if ($columna == "descuento" && $valor != null)
          {
            $descuento = $valor;
          }

          if ($columna == "tipo" && $valor != null)
          {
            $tipo = $valor;
          }

          if ($columna == "precio_unitario" && $valor != null)
          {
            $precio_unitario = $valor;
          }
        }
?>
<div class="row row-cols-1 mb-5 ms-5 me-5">
  <div class="col">
    <div class="card" style="max-height: auto;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?php echo $foto ?>" class="img-fluid img-thumbnail rounded-start" style="max-height: auto;" alt="<?php echo $nombre ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $nombre ?></h5>
            <p class="card-text"><?php echo $descripcion ?></p>
            <p class="card-text"><small class="text-muted">Descuento del: <?php echo $descuento ?>%</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</body>
</html>