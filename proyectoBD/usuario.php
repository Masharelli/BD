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
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuario.php">
          <i class="far fa-user"></i>
          <span>Usuario</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          <i class="fas fa-sign-in-alt  "></i>
          <span>Login</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">
          <i class="fas fa-clipboard-list"></i>
          <span>Registro</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="registroEquipo.php">
          <i class="fas fa-users"></i>
          <span>Registrar Equipo</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="torneos.php">
          <i class="fas fa-fw fa-trophy"></i>
          <span>Torneos</span></a>
      </li>
     
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

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
                <div class="mr-5">Torneos</div>
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
                <div class="mr-5">Registrar Equipo</div>
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
<!------------------ Icon Cards-------------------------->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-user"></i> Informacion de Usuario
  </div>
<div class="container bootstrap snippet">
  <div class="panel-body inf-content">
    <div class="row">
      <div class="col-md-3" style="margin-top: 10px">
        <img alt="" style="width:600px, padding-top: 50px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/user-453533-fdadfd.png" data-original-title="Usuario"> 
      </div>
    <div class="col-md-3">  
      <strong>Informacion</strong><br>
      <div class="table-responsive">
        <table class="table table-condensed table-responsive table-user-information">
          <tbody>
            <tr>        
              <td>
                <strong>
                  <span class="fas fa-user"></span>
                    Username                                                
                </strong>
              </td>
                <td class="text-primary">
                    Masharelli     
                </td>
            </tr>

            <tr>    
              <td>
                <strong>
                  <span class="fas fa-signature"></span>    
                    Nombre                                                
                </strong>
              </td>
              <td class="text-primary">
                Hugo     
              </td>
            </tr>

            <tr>        
              <td>
                <strong>
                    <span class="fas fa-signature"></span>  
                    Apellido                                                
                </strong>
              </td>
              <td class="text-primary">
                Rocha
              </td>
            </tr>

              <tr>        
                <td>
                  <strong>
                      <span class="far fa-calendar"></span> 
                      Edad                                                
                  </strong>
                </td>
                <td class="text-primary">
                  21 
                </td>
              </tr>

              <tr>        
                <td>
                  <strong>
                    <span class="fas fa-fw fa-trophy"></span> 
                    Liga                                                
                  </strong>
                </td>
                <td class="text-primary">
                    Oro
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--Stats -->
      <div class="col-md-3">  
      <strong>Estadisticas</strong><br>
      <div class="table-responsive">
        <table class="table table-condensed table-responsive table-user-information">
          <tbody>
            <tr>        
              <td>
                <strong>
                  <span class="fas fa-bar-chart "></span>
                    KDA                                                
                </strong>
              </td>
                <td class="text-primary">
                    2.1     
                </td>
            </tr>

            <tr>    
              <td>
                <strong>
                  <span class="fas fa-signature"></span>    
                    Nivel                                                
                </strong>
              </td>
              <td class="text-primary">
                163     
              </td>
            </tr>

            <tr>        
              <td>
                <strong>
                    <span class="fas fa-signature"></span>  
                    Posicion Mas jugada                                                
                </strong>
              </td>
              <td class="text-primary">
                Top
              </td>
            </tr>

              <tr>        
                <td>
                  <strong>
                      <span class="far fa-calendar"></span> 
                      Campeon Mas Jugado                                                
                  </strong>
                </td>
                <td class="text-primary">
                  Malzahar 
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </div>
      <!-- Stats -->
    </div>
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
