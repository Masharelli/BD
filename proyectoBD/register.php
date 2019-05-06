<?php
require_once 'core/init.php';
$conexion = oci_connect("diego", "tec2048", "localhost/xe"); 

if(Input::exists()){
  $nombre = Input::get('nombre');
  $apellido = Input::get('apellido');
  $edad = Input::get('edad');
  $username = Input::get('username');
  $liga = Input::get('liga');
  $pass = Input::get('pass');
  if(addUser($conexion, $nombre,$apellido,$edad,$username,$liga,$pass)){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    Redirect::to('index.php');
  } else {
    echo 'Error';
  }
}

function addUser($conexion, $nombre, $apellido, $edad, $username, $liga, $pass){
  $querytext = "SELECT * FROM USUARIO WHERE USERNAME = '".$username."'";
  $stmt = oci_parse($conexion,$querytext);
  oci_execute($stmt);
  $nrows = oci_fetch_all($stmt, $res);
  if(!$nrows){
    $querytext2 = "INSERT INTO USUARIO (UNOMBRE, UAPELLIDO, EDAD, USERNAME, LIGA, PASS) VALUES ('".$nombre."','".$apellido."',".$edad.",'".$username."','".$liga."','".$pass."')";
    $stmt2 = oci_parse($conexion,$querytext2);
    oci_execute($stmt2);
    return true;
  }
  return false;
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

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="nombre" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus" name="nombre">
                  <label for="nombre">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="apellido" class="form-control" placeholder="Apellido" required="required" name="apellido">
                  <label for="apellido">Apellido</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6" >
               <div class="input-group">
               <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
               <input type="number" class="form-control" placeholder="Edad" name="edad" id="edad">
               </div>
               <span class="help-block" id="error"></span>
            </div>
            <div class="form-group col-md-6">
              <div class="form-label-group">
               <input type="text" id="username" class="form-control" placeholder="Usernname" required="required" name="username">
               <label for="username">Username</label>
              </div>
            </div>
           </div>

          <div class="form-group">
            <div class="form-row">
            <div class="form-group col-md-6">
              <div class="form-label-group">
               <input type="text" id="liga" class="form-control" placeholder="Liga" required="required" name="liga">
               <label for="liga">Liga</label>
              </div>
            </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="pass" class="form-control" placeholder="Password" required="required" name="pass">
                  <label for="pass">Password</label>
                </div>
              </div>
            </div>
          </div>
           <div class="form-footer">
                 <button type="submit" value="Enviar" class="btn btn-primary">
                 <span class="glyphicon glyphicon-log-in"></span> Registrarme !
                 </button>
            </div>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
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
