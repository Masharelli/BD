<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css_web/iniciarSesion.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Inicio </title>
  </head>
  <body background="Images/fondo.png">

    <!-- N A V B A R-->
    <nav class="navbar navbar-expand-lg navbar-light bg-gray " >
    <a class="navbar-brand" href="#">E-sport Cup</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" style="color: black" href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/index.php">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  style="color: black" href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/iniciarSesion.php">Iniciar Sesion</a>
        </li>

        <li class="nav-item">
          <a class="nav-link"  style="color: black" href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/registro.php">Registrarse</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Torneos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/torneoEquipos.<?php  ?>">Equipos</a>
            <a class="dropdown-item" href="#">Torneos Activos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Estadisticas</a>
          </div>
        </li>
      </ul>

     

    </div>
  </nav> 
   <!-- N A V B A R-->

    <!-- CARRUSEL-->
  <div class="col-lg-6" >
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" id="imagen1">
    <div class="item active">
      <img src="Images/lol.jpg" alt="League Of Legends">
    </div>

    <div class="item">
      <img src="Images/fifa.jpg" alt="Fifa">
    </div>

    <div class="item">
      <img src="Images/apex.jpg" alt="Apex">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- CARRUSEL-->

<!-- BOTON REGISTRO -->
<br>
<div>
<div class="container" class="row" id="botton1">
<div class="col-lg-6">
  <a href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/registro.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Registro ! </a>
</button>
</div>
<!-- BOTON REGISTRO-->



<!-- BOTON REGISTRO -->
<div class="container" class="row" id="botton2">
<div class="col-lg-6">
  <a href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/registro.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Torneos! </a>
</button>
</div>
<!-- BOTON REGISTRO-->
</div>
</div>
</body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

</html> 