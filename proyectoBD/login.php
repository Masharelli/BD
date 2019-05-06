<?php
require_once 'core/init.php';
$conexion = oci_connect("diego", "tec2048", "localhost/xe"); 

if(Input::exists()){
  $username = Input::get('username');
  $pass = Input::get('pass');
  $aRow = getUser($conexion, $username);
  if($aRow['USERNAME']==$username && $aRow['PASS']==$pass){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    Redirect::to('index.php');
  }
}

function getUser($conexion, $username){
  $querytext = "SELECT * FROM USUARIO WHERE USERNAME='".$username."'";
  $stmt = oci_parse($conexion,$querytext);
  oci_execute($stmt);
  if($row=oci_fetch_assoc($stmt)) {
    return $row;
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

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required="required">
              <label for="pass">Password</label>
            </div>
          </div>
          <div class="form-footer">
                 <button type="submit" value="Enviar" class="btn btn-primary">
                 <span class="glyphicon glyphicon-log-in"></span> Log In
                 </button>
            </div>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
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
