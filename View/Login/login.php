<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="./CSS/login.style.css" rel="stylesheet">
    <script src="./JS/login.js"></script>
    <title>Login</title>
</head>
<body>

<section class="h-100 gradient-form mt-5" style="background-color: #eee;">
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
                    <label class="form-label" for="form2Example11">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control"
                      placeholder="Phone number or email address" />
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example22">Constraseña</label>
                    <input type="password" id="contra" name="contra" class="form-control" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" id="btnLogin" name="btnLogin" type="button">Acceder</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">¿No tienes cuenta aún?</p>
                    <button type="button" class="btn btn-outline-danger">Regístrate aquí</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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