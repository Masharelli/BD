<?php
require_once 'core/init.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
    Redirect::to('login.php');
}

$username = $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Profile scripts -->
  <title>Dashboard</title>

  <!-- Custom fonts for this template-->

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">E-Sport</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuario.php">
          <i class="far fa-user"></i>
          <span>Usuario</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="torneos.php">
          <i class="fas fa-fw fa-trophy"></i>
          <span>Torneos</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="closesession.php">
          <i class="fas fa-fw fa-power-off"></i>
          <span>Cerrar Sesión</span></a>
      </li>
     
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
        <?php
        if(Afunction::isMod($username)){
          echo '
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Acceso Rapido</li>
        </ol>

        <!------------------ Icon Cards-------------------------->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3" style="margin: auto;">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-trophy"></i>
                </div>
                <div class="mr-5">Crear Torneo</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Ver detalles</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3" style="margin: auto;">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users"></i>
                </div>
                <div class="mr-5">Administrar Torneos</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="registroEquipo.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
          ';
        }
        ?>
        
<!------------------ Icon Cards-------------------------->


<div class="card-header">
    <i class="fas fa-fw fa-trophy"> </i> Administra tu equipo
</div>
<div class="container" style="padding-top: 10px;">
  <div class="row">
    <div class="col-sm-6">
</br>
</br>
<?php
$tRow = Afunction::getTeamInfo($username);
$conexion = oci_connect("diego", "tec2048", "localhost/xe");
$teamname = $tRow['ENOMBRE'];
$querytext = "SELECT USERNAME, LIGA, UNOMBRE, UAPELLIDO, EDAD FROM USUARIO NATURAL JOIN INTEGRANTE NATURAL JOIN EQUIPO WHERE ENOMBRE =	'".$teamname."'";
$stmt = oci_parse($conexion,$querytext);
oci_execute($stmt);
echo '
<table class="table" style="">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Alias</th>
      <th scope="col">Liga</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
    </tr>
  </thead>
  <tbody>
';
while($row=oci_fetch_assoc($stmt)) {
	echo '
	<tr>
      <th scope="row">'.$row['USERNAME'].'</th>
      <td>'.$row['LIGA'].'</td>
      <td>'.$row['UNOMBRE'].'</td>
      <td>'.$row['UAPELLIDO'].'</td>
      <td>'.$row['EDAD'].'</td>
    </tr>
    ';
}
echo '
  </tbody>
</table>

';

?>

    

</div>
</div>
</div>
  
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Los Ansiosos 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>