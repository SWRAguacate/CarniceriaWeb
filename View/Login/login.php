<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./CSS/login.style.css" rel="stylesheet">
    <script src="./JS/login.js"></script>
    <title>Login</title>
</head>
<body style="background-color: #eee;">

<section class="h-100 gradient-form mt-5">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="Logo2.svg"
                    style="width: 185px; height: 100px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Fond carnes finas express</h4>
                </div>

                <form>
                  <p>Favor de iniciar sesión</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Usuario/Correo</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example22">Constraseña</label>
                    <input type="password" id="contra" name="contra" class="form-control" />
                  </div>

                  <div class="text-center pt-1 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2" id="btnLogin" name="btnLogin" type="button">Acceder</button>
                  </div>

                  <div class="text-center">
                    <p>¿No tienes cuenta aún? <a href="http://localhost/CarniceriaWeb/register.php">Regístrate</a></p>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">!Bienvenido de vuelta!</h4>
                <p class="small mb-0">Las mejores carnes y la mejor experiencia te esperan.</p>
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