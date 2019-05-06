<?php
require_once 'core/init.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
    Redirect::to('login.php');
}

if(Input::exists()){
  $nombreteam = Input::get('nombre');
  $username = $_SESSION['username'];
  if(is_numeric($nombreteam)){
    if(Afunction::joinTeam($username, $nombreteam)){
      Redirect::to('index.php');
    }
  } else {
    if(Afunction::createTeam($nombreteam, $username)){
      Redirect::to('index.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registro Equipo</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro de Equipo (Crea tu equipo con un nombre o únete a uno con el ID)</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus">
                  <label for="nombre">Nombre de equipo / ID de equipo</label>
                </div>
              </div>
            </div>
          </div>
          <!--
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="UNOMBRE" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus">
                  <label for="UNOMBRE">Imagen</label>
                </div>
              </div>
            </div>
          </div>
          -->
           <div class="form-footer">
                 <button type="submit" value="Enviar" class="btn btn-primary">
                 <span class="glyphicon glyphicon-log-in"></span> Agregar equipo
                 </button>
            </div>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Atrás</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
