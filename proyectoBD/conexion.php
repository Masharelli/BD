<?php
require_once 'core/init.php';
?>



<DOCTYPE HTML>
<meta charset = "utf8" />
<?php  
// crear conexion con oracle
$conexion = oci_connect("diego", "tec2048", "localhost/xe"); 
 
if (!$conexion) {    
  $m = oci_error();    
  echo $m['message'], "n";    
  exit; 
}  else {
	$equipo = 'OtroEquipo';
	$querytext = "INSERT INTO EQUIPO (ENOMBRE) VALUES ('".$equipo."')";
  	$stmt = oci_parse($conexion,$querytext);
  	oci_execute($stmt);
}



	/*$var1 = $_POST["NombreU"];
	$var2 = $_POST["Apellido"];
	$var3 = $_POST["Edad"];
	$var4 = $_POST["Username"];
	$var5 = $_POST["Liga"];
	$var6 = $_POST["Contra"];
		
	$queryy = "INSERT INTO PUsuario (NombreU,Apellido,Edad,Username,Liga,Contra)VALUES('".$var1."','".$var2."',".$var3.",'".$var4."','".$var5."','".$var6."')";

	
	$query = oci_parse($conexion,$queryy);
	echo"<script type='text/javascript'>alert('Inicio de Sesion Correcto !!! ');

		 			window.location='http://localhost/proyectoBD/bootstrap-4.1.3-dist/index.php'
		 			;</script>";
	oci_execute($query);*/

?>
