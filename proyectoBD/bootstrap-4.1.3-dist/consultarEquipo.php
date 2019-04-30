<DOCTYPE HTML>
<meta charset = "utf8" />
<?php  
// crear conexion con oracle
$conexion = oci_connect("system", "Rocha1997", "localhost/xe"); 
 
if (!$conexion) {    
  $m = oci_error();    
  echo $m['message'], "n";    
  exit; 
} 

	$query = oci_parse($conn, "SELECT * FROM PEquipo");
	ociexecute($query);
	while (ocifetch($query)) {
		echo "EQUIPOS ------------>" .ociresult($query, "EQUIPOS");
	}
	ocicommit($conexion);
	ocilogoff($conexion);
?>
