<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css_web/iniciarSesion.css">


    <title>Iniciar Sesion</title>
  </head>
  <body background="Images/fondo.png">
    <!-- N A V B A R-->
      <nav class="navbar navbar-expand-lg navbar-light bg-gray">
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
          <a class="nav-link" style="color: black" href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/iniciarSesion.php">Iniciar Sesion</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: black" href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/registro.php">Registrarse</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link   dropdown-toggle" style="color: black"   href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Torneos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="http://localhost/proyectoBD/bootstrap-4.1.3-dist/torneoEquipos.php">Equipos</a>
            <a class="dropdown-item" href="#">Torneos Activos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Estadisticas</a>
          </div>
        </li>
        
      </ul>
    </div>
  </nav> 
   <!-- N A V B A R-->

   <!-- F O R M U L A R I O-->

  <div class="container" >
	 <form id="registro" action="conn.php">
	  <div class="form-group">
	    <label for="exampleUserName">User Name</label>
	    <input type="text"  class="form-control" id="aliasUsuario"  placeholder="User Name">

	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" id="contrasenaUsuario" placeholder="Password">
	  </div>
	  <button type="submit" value="Enviar" class="btn btn-primary">
      <span class="glyphicon glyphicon-log-in"></span> Sign Me Up !
    </button>
	</form>
  </div>

  <!-- F O R M U L A R I O-->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html> 