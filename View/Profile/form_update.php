<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./JS/profile.js"></script>
    <title>Editar Usuario</title>
</head>
<body style="background-color: #eee;">

    <div class="container-xxl mt-5">
        <br><br><br>
        <form>
            <p>Perfil de usuario</p>
            <input type="text" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario ?>" hidden />

            <div class="form-outline mb-4">
            <label class="form-label" for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo $username ?>" class="form-control" placeholder="Usuario..." />
            <input type="text" id="usuarioOriginal" name="usuarioOriginal" value="<?php echo $username ?>" hidden />

            <label class="form-label" for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre ?>" class="form-control" placeholder="Nombre..." />

            <label class="form-label" for="email">Correo</label>
            <input type="email" id="email" name="email" value="<?php echo $email ?>" class="form-control" placeholder="Correo..." />
            <input type="text" id="emailOriginal" name="emailOriginal" value="<?php echo $email ?>" hidden />

            <label class="form-label" for="contra">Constraseña</label>
            <input type="password" id="contra" name="contra" value="<?php echo $contra ?>" class="form-control" />
            <input type="text" id="contraOriginal" name="contraOriginal" value="<?php echo $contra ?>" hidden />

            <label class="form-label" for="contra2">Confirmar contraseña</label>
            <input type="password" id="contra2" name="contra2" class="form-control" />

            <label class="form-label" for="telefono">Teléfono a 10 dígitos</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $telefono ?>" class="form-control" />
            </div>

            <div class="text-center pt-1 pb-1">
                <button class="btn btn-primary btn-block fa-lg gradient-custom-2" id="btnUpdate" name="btnUpdate" type="button">Actualizar usuario</button>
            </div>
        </form>
    </div>

</body>
</html>