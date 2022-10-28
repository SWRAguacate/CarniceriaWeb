<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./JS/cart.js"></script>
    <title>Cart</title>
</head>
<body style="background-color: #eee;">

<input type="text" id="id_carrito" value="<?php echo $id_carrito ?>" hidden>
<input type="text" id="id_usuario" value="<?php echo $id_usuario ?>" hidden>

<section class="h-100 h-custom mb-5 mt-5">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="index.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Continuar comprando</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Carrito de compras</p>
                    <p class="mb-0">!Tus productos te esperan!</p>
                    <small class="mb-0">(Todo descuento se aplica por unidad/kilo)</small>
                  </div>
                </div>

                <?php 
                  $id_producto_carrito; $unidades; $kilos; $precio_final; $descuento = 0; $tipo; $precio_unitario; $nombre; $descripcion;
                  foreach ($productos_carrito as $renglon) 
                  { 
                      foreach ($renglon as $columna => $valor) 
                      { 
                          if ($columna == "id_producto_carrito" && $valor != null)
                          {
                              $id_producto_carrito = $valor;
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
                      
                          if ($columna == "descuento" && $valor != null)
                          {
                              $descuento = $valor;
                          }
                      
                          if ($columna == "tipo" && $valor != null) { 
                              $tipo = $valor; 
                          }
                      
                          if ($columna == "precio_unitario" && $valor != null) 
                          { 
                              $precio_unitario = $valor; 
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
                      }
                      if($tipo == 1)
                      {
                        $precio_sin_descuentos = $precio_sin_descuentos + ($kilos * $precio_unitario);
                      } else {
                        $precio_sin_descuentos = $precio_sin_descuentos + ($unidades * $precio_unitario);
                      }
                      $precio_con_descuentos = $precio_con_descuentos + $precio_final;
                ?>

                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="<?php echo $foto ?>"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5><?php echo $nombre ?></h5>
                          <p class="small mb-0"><?php echo $descripcion ?></p>
                          <?php if($descuento > 0) { ?>
                          <small class="small mb-0">Con el <?php echo $descuento ?>% de descuento por unidad/kilo</small>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div class="me-2 ms-2">
                          <?php if($tipo == 1) { ?>
                            <h5 class="fw-normal mb-0"><?php echo $kilos ?>kg: </h5>
                          <?php } else { ?>
                            <h5 class="fw-normal mb-0"><?php echo $unidades ?> unidades: </h5>
                          <?php } ?>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">$<?php echo $precio_final ?></h5>
                        </div>
                        <button name="btnDeleteProductCart" class="btn fas fa-trash-alt" style="color: #cecece;">
                          <input type="text" id="id_producto_carrito" value="<?php echo $id_producto_carrito ?>" hidden>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <?php $descuento = 0; } ?>

              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Detalle de forma de pago</h5>
                    </div>

                    <p class="small mb-2">Tarjetas admitidas de:</p>
                    <a type="submit" class="text-white"><i
                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                    <a type="submit" class="text-white"><i
                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                    <a type="submit" class="text-white"><i
                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                    <a type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                    <form class="mt-4">
                      <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typeName">Titular de la tarjeta</label>
                        <input type="text" id="typeName" class="form-control form-control-lg" size="17"
                          placeholder="Nombre del titular..." />
                      </div>

                      <div class="form-outline form-white mb-4">
                        <label class="form-label" for="typeText">Número de tarjeta</label>
                        <input type="text" id="typeText" class="form-control form-control-lg" size="17"
                          placeholder="1234 5678 9012 3456" minlength="19" maxlength="19" />
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <label class="form-label" for="typeExp">Expiración</label>
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <label class="form-label" for="typeText2">CVV</label>
                            <input type="password" id="typeText2" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal (sin descuentos aplicados)</p>
                      <p class="mb-2">$<?php echo $precio_sin_descuentos ?></p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total (descuentos aplicados)</p>
                      <p class="mb-2">$<?php echo $precio_con_descuentos ?></p>
                    </div>

                    <button type="button" id="btnPagarCarrito" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>Pagar <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        <span> $<?php echo $precio_con_descuentos ?></span>
                      </div>
                    </button>
                    <input type="text" id="pcd" value="<?php echo $precio_con_descuentos ?>" hidden>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>