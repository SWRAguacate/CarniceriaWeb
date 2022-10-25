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
    <title>Dashboard</title>
</head>
<body>
  
<nav class="navbar fixed-top bg-white shadow" id="idNav">
  <div>
    <button class="navbar-toggler mx-2 btn-lg" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <button type="button" class="btn btn-outline-dark border-0 mx-2 btn-lg" routerLink="/eccomerce">Inicio</button>

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

    <button type="button" class="btn btn-outline-dark border-0 btn-lg" routerLink="/users" (click)="goUser()">
    <i class="fa fa-user" aria-hidden="true"></i>
    </button>

    <form class="d-flex d-inline-flex mx-2">
      <input type="search" class="form-control mx-2" id="desc" placeholder="Nombre del producto..." aria-label="Search">
      <button type="button" class="btn btn-outline-success mx-2" (click)="buscar()">Buscar</button>
    </form>
  </div>
</nav>


<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
  aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h2>Ecommerce</h2>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <hr />
  <div class="offcanvas-body">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action" id="list-settings-list" (click)="goLogin()" data-toggle="list"
        role="tab" aria-controls="Login" *ngIf="!bLogeado">Login</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" (click)="Logout()" data-toggle="list"
        role="tab" aria-controls="Logout" *ngIf="bLogeado">Logout</a>
    </div>
  </div>
</div>

</body>
</html>