<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/login.style.css" rel="stylesheet">
    <script src="./JS/register.js"></script>
    <title>Register</title>
</head>
<body style="background-color: #eee;">

<div class="mh-100">
<section class="h-100 gradient-form mt-5">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black mb-5">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="Logo2.svg"
                    style="width: 185px; height: 100px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Fond carnes finas express</h4>
                </div>

                <form>
                  <p>Favor de registrarse</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario..." />

                    <label class="form-label" for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre..." />

                    <label class="form-label" for="email">Correo</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Correo..." />

                    <label class="form-label" for="contra">Constraseña</label>
                    <input type="password" id="contra" name="contra" class="form-control" />

                    <label class="form-label" for="contra2">Confirmar contraseña</label>
                    <input type="password" id="contra2" name="contra2" class="form-control" />

                    <label class="form-label" for="telefono">Teléfono a 10 dígitos</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" />
                  </div>

                  <div class="text-center pt-1 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2" id="btnRegister" name="btnRegister" type="button">Registrar</button>
                  </div>

                  <div class="text-center">
                    <p>¿Ya tienes una cuenta? <a href="http://localhost/CarniceriaWeb/login.php">Inicia sesión</a></p>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Somos más que una carnicería</h4>
                <p class="small mb-0">Conoce los mejores productos de la ciudad en carnes, contando con una gran 
                    variedad de artículos, !disponemos de todo lo que necesitas para cumplir tus antojos!.<i class="fa fa-toggle-down" aria-hidden="true"></i>.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

</body>
</html>