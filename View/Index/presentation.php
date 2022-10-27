<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation</title>
</head>
<body>
<div class="container border-0" style="background: #6C757DBF; height: 50px; max-width: 100%;"></div>
<div class="bg-secondary bg-opacity-75">
    <div class="container">
      <div class="card bg-transparent border-0 pt-5 text-white">
        <h1>¡Encuentra los mejores productos en nuestra tienda!</h1>
        <h6>Contamos con una amplia variedad</h6>
      </div>
      <div class="row pt-5 pb-5">
        <div class="col">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
            <input type="text" class="form-control" id="nameSearch" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-sm">
          </div>
        </div>
        <div class="col">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-sm">Descripcion</span>
            <input type="text" class="form-control" id="descSearch" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-sm">
          </div>
        </div>
        <div class="col">
          <div class="input-group">
            <span class="input-group-text">Categoría</span>
            <select class="form-select" id="categorieSelect">
              <option value="" selected>...</option>
            </select>
          </div>
        </div>
        <div class="col">
          <button class="btn btn-danger"> Buscar </button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>