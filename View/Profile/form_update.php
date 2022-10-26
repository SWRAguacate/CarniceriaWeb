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
    <title>Editar Usuario</title>
</head>
<body style="background-color: #eee;">

    <div class="container-xxl mt-5">
        <br><br><br>
        <form>
            <p>Perfil de usuario</p>

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

            <label class="form-label" for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="form-control" />
            </div>

            <div class="text-center pt-1 pb-1">
                <button class="btn btn-primary btn-block fa-lg gradient-custom-2" id="btnRegister" name="btnRegister" type="button">Actualizar</button>
            </div>
        </form>
    </div>

</body>
</html>