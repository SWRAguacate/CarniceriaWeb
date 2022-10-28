<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>
<body>

<h2 class="me-5 ms-5">Todos tus productos comprados</h2>

<div class="row row-cols-1 mb-5 ms-5 me-5">

<?php
  $nombre; $descripcion; $tipo; $foto; $unidades; $kilos; $precio_final; $fecha_compra; 
  foreach ($purchases as $renglon) 
  { 
      foreach ($renglon as $columna => $valor) 
      { 
          if ($columna == "nombre" && $valor != null) 
          {  
              $nombre = $valor; 
          }

          if ($columna == "descripcion" && $valor != null) 
          {  
              $descripcion = $valor; 
          }

          if ($columna == "tipo" && $valor != null) 
          {  
              $tipo = $valor; 
          }

          if ($columna == "foto" && $valor != null) 
          {  
              $foto = $valor; 
          }

          if ($columna == "unidades" && $valor != null) 
          {  
              $unidades = $valor; 
          }

          if ($columna == "kilos" && $valor != null) 
          {  
              $kilos = $valor; 
          }

          if ($columna == "precio_final" && $valor != null) 
          {  
              $precio_final = $valor; 
          }

          if ($columna == "fecha_compra" && $valor != null) 
          {  
              $fecha_compra = $valor; 
          }
      } 
?>
    <div class="col">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?php echo $foto ?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $nombre ?></h5>
              <p class="card-text"><?php echo $descripcion ?></p>
              <p class="card-text">Comprado el: <?php echo $fecha_compra ?></p>
              <p class="card-text"><small class="text-muted">Pago de: $<?php echo $precio_final ?></small></p>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
<?php 
  } 
?>
</div>

</body>
</html>