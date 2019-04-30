<?php

session_start();

?>

<?php

		$conn = oci_connect('system','Rocha1997','localhost/XE');

		if(isset($_SESSION["session_username"])){

			echo 'Ya inicio sesion!';

		}

		if(isset($_POST["log-submit"])){

			if(!empty($_POST['Username']) && !empty($_POST['Contra'])) {

		 		$Username=$_POST['Username'];

		 		$Contra=$_POST['Contra'];

				$query ="SELECT * FROM PUsuario WHERE USERNAME ='".$Username."' AND CONTRA ='".$Contra."'";

				$stmt = oci_parse($conn, $query);

				oci_execute($stmt);

				$nrows = oci_fetch_all($stmt, $res);

		 	if($nrows){

		 		//$stmt2 = oci_parse($conn, $query);

				//oci_execute($stmt2);

		 		while($row=oci_fetch_assoc($stmt))

					 {

					 $dbUsername=$row['USERNAME'];

					 $dbContra=$row['CONTRA'];

					 }

				if($dbUsername == $dbContra && $Contra == $dbContra){

		 			$_SESSION['session_username']=$Username;

		 			echo"<script type='text/javascript'>alert('Inicio de Sesion Correcto !!! ');

		 			window.location='http://localhost/proyectoBD/bootstrap-4.1.3-dist/index.php'
		 			;</script>";

				}

			} else {

		 		$message = "Nombre de usuario ó contraseña invalida!";

			 }

			} else {

		 $message = "Todos los campos son requeridos!";

		 echo $message;

		}

		}

?>