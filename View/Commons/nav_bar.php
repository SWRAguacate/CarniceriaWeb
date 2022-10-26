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
    <link href="./CSS/index.style.css" rel="stylesheet">
    <title>Navbar</title>
</head>
<body>
  
<nav class="navbar fixed-top bg-white shadow" id="idNav">
  <div>

    <a type="button" class="btn border-0 mx-2 btn-lg" href="index.php">
      <img src="./Logo2.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Fond
    </a>

    <a type="button" class="btn btn-outline-dark border-0 mx-2 btn-lg" href="index.php">Inicio</a>

    <button type="button" class="btn btn-outline-dark border-0 mx-2 btn-lg" routerLink="/cart">
        <?php 
            $x = 1;
            if($x != 0) { 
        ?>
            <i class="fa fa-shopping-cart" value= <?php echo $x ?>></i>
        <?php } else { ?>
            <i class="fa">&#xf07a;</i>
        <?php } ?>
    </button>

    <button type="button" class="btn btn-outline-dark border-0 btn-lg dropdown" routerLink="/users" (click)="goUser()">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user" aria-hidden="true"></i>
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php
          if(!isset($_SESSION["usuario_logueado"])){
        ?>
        <li><a class="dropdown-item" href="http://localhost/CarniceriaWeb/login.php">Iniciar sesión</a></li>
        <?php
          } else {
        ?>
        <li><a class="dropdown-item" href="http://localhost/CarniceriaWeb/profile.php">Perfil</a></li>
        <li><a class="dropdown-item" href="http://localhost/CarniceriaWeb/Petitions/sign_out.petition.php">Cerrar sesión</a></li>
        <?php
          }
        ?>
      </ul>
    </button>

    <form class="d-flex d-inline-flex mx-2">
      <input type="search" class="form-control mx-2" id="desc" placeholder="Nombre del producto..." aria-label="Search">
      <button type="button" class="btn btn-outline-success mx-2" (click)="buscar()">Buscar</button>
    </form>

  </div>
</nav>

</body>
</html>