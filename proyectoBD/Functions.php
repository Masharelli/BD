<?php
	function borrarUsuario( $conexion, $id)
	{
		$sql = "DELETE FROM table_Usuario";

		//si el id es null, solo se borra la persona
		if( $id != null)
			$sql .= "WHERE id=".$id;
	
	$stmt = oci_parse($conexion, $sql); // Preparar
	$ok = oci_execute($stmt); // Ejecuta
	oci_free_statement($stmt); //Libera los recursos

	return $ok;
	}
///////////////////////////////////////////////////////////
	function borrarUsuario( $conexion, $id)
	{
		$sql = "DELETE FROM table_Usuario";

		//si el id es null, solo se borra la persona
		if( $id != null)
			$sql .= "WHERE id=".$id;
	
	$stmt = oci_parse($conexion, $sql); // Preparar
	$ok = oci_execute($stmt); // Ejecuta
	oci_free_statement($stmt); //Libera los recursos

	return $ok;
	}
?>