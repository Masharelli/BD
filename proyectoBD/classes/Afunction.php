<?php
class Afunction {


	// Regresa true si es que tiene equipo
	public static function hasTeam($username){
		$conexion = oci_connect("diego", "tec2048", "localhost/xe"); 
		$querytext = "SELECT * FROM USUARIO NATURAL JOIN INTEGRANTE NATURAL JOIN EQUIPO WHERE USERNAME = '".$username."'";
		$stmt = oci_parse($conexion,$querytext);
		oci_execute($stmt);
		$nrows = oci_fetch_all($stmt, $res);
		if($nrows){
			return true;
		} else {
			return false;
		}
	}

	public static function getUser($username){
	$conexion = oci_connect("diego", "tec2048", "localhost/xe"); 
  	$querytext = "SELECT * FROM USUARIO WHERE USERNAME='".$username."'";
  	$stmt = oci_parse($conexion,$querytext);
  	oci_execute($stmt);
  	if($row=oci_fetch_assoc($stmt)) {
    	return $row;
  	}
  		return false;
	}

	// Crea un equipo y regresa false si es que ya existe uno con ese nombre o si el usuario ya pertenece a un equipo
	public static function createTeam($nombre, $username){
		$conexion = oci_connect("diego", "tec2048", "localhost/xe");
		$querytext = "SELECT * FROM EQUIPO  WHERE ENOMBRE = '".$nombre."'";
		$stmt = oci_parse($conexion,$querytext);
		oci_execute($stmt);
		$nrows = oci_fetch_all($stmt, $res);
		if(!$nrows){
			$querytext = "SELECT IDUSUARIO FROM INTEGRANTE WHERE IDUSUARIO = (SELECT IDUSUARIO FROM USUARIO WHERE USERNAME = '".$username."')";
			$stmt = oci_parse($conexion,$querytext);
			oci_execute($stmt);
			$nrows = oci_fetch_all($stmt, $res);
			if(!$nrows){
				$querytext = "INSERT INTO EQUIPO (ENOMBRE) VALUES ('".$nombre."')";
				$stmt = oci_parse($conexion,$querytext);
				oci_execute($stmt);	
				$querytext = "INSERT INTO INTEGRANTE (IDEQUIPO, IDUSUARIO) VALUES ((SELECT IDEQUIPO FROM EQUIPO WHERE ENOMBRE = '".$nombre."'),(SELECT IDUSUARIO FROM USUARIO WHERE USERNAME = '".$username."'))";
				$stmt = oci_parse($conexion,$querytext);
				oci_execute($stmt);
				return true;
			}
			return false;
		}
		return false;
	}

	// Regresa datos del equipo del usuario
	public static function getTeamInfo($username) {
		$conexion = oci_connect("diego", "tec2048", "localhost/xe");
		$querytext = "SELECT * FROM USUARIO NATURAL JOIN INTEGRANTE NATURAL JOIN EQUIPO WHERE USERNAME = '".$username."'";
		$stmt = oci_parse($conexion,$querytext);
		oci_execute($stmt);
		if($row=oci_fetch_assoc($stmt)){
			return $row;
		} else {
			return false;
		}
	}

	// Unete a un equipo
	public static function joinTeam($username, $idteam){
		// busca el team
		$conexion = oci_connect("diego", "tec2048", "localhost/xe"); 
		$querytext = "SELECT * FROM EQUIPO  WHERE IDEQUIPO = ".$idteam."";
		$stmt = oci_parse($conexion,$querytext);
		oci_execute($stmt);
		if($row=oci_fetch_assoc($stmt)){
			// si es que hay, checa si son menos de 5, y si si, se une
			if($row['NINT']<5){
				$nnint=$row['NINT']+1;
				$querytext = "UPDATE EQUIPO SET NINT=".$nnint." WHERE IDEQUIPO=".$idteam."";
				$stmt2 = oci_parse($conexion,$querytext);
				oci_execute($stmt2);
				$querytext = "INSERT INTO INTEGRANTE (IDEQUIPO, IDUSUARIO) VALUES (".$idteam.",(SELECT IDUSUARIO FROM USUARIO WHERE USERNAME = '".$username."''))";
				$stmt3 = oci_parse($conexion,$querytext);
				oci_execute($stmt3);
				return true;
			}
			return false;	
		}
		// sino, regresa false
		return false;
	}

	// Busca un tipo de privilegio en el usuario
	public static function hasPriv($username, $idpriv){
		$conexion = oci_connect("diego", "tec2048", "localhost/xe");
		$querytext = "SELECT IDPRIV FROM USUARIO WHERE USERNAME = '".$username."'";
		$stmt = oci_parse($conexion,$querytext);
		oci_execute($stmt);
		if($row=oci_fetch_assoc($stmt)){
			if($row['IDPRIV']==$idpriv){
				return true;
			}
		}
		return false;
	}

	// Regresa true si es que el usuario es cliente
	public static function isClient($username){
		return Afunction::hasPriv($username,0);
	}

	// Regresa true si es que el usuario es moderador
	public static function isMod($username){
		return Afunction::hasPriv($username,1);
	}

	// Regresa true si es que el usuario es administrador
	public static function isAdmin($username){
		return Afunction::hasPriv($username,2);
	}
}

