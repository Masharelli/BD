<?php
class Afunction {

// Regresa true si es que el usuario es cliente
public static function isClient($username){
	return hasPriv($username,0);
}

// Regresa true si es que el usuario es moderador
public static function isMod($username){
	return hasPriv($username,1);
}

// Regresa true si es que el usuario es administrador
function isAdmin($username){
	return hasPriv($username,2);
}

// Busca un tipo de privilegio en el usuario
function hasPriv($username, $idpriv){
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe"); 
	$querytext = "SELECT IDPRIV FROM USUARIO WHERE USERNAME = '".$username."'";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
	$nrows = oci_fetch_all($stmt, $res);
	if($nrows){
		$row=oci_fetch_assoc($stmt);
		if($row[IDPRIV]==$idpriv){
			return true;
		}
	}
	return false;
}

// Crea un usuario y regresa false si es que un username ya existe
function addUser($nombre, $apellido, $edad, $username, $liga, $pass){
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe"); 
	$querytext = "SELECT * FROM USUARIO WHERE USERNAME = '".$username."'";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
	$nrows = oci_fetch_all($stmt, $res);
	if(!$nrows){
		$querytext = "INSERT INTO USUARIO (UNOMBRE, UAPELLIDO, EDAD, USERNAME, LIGA, PASS) VALUES ('".$nombre."','".$apellido."',".$edad.",'".$username."','".$liga."','".$pass."')";
		$stmt = oci_parse($conexion,$querytext);
		oci_execute($stmt);
		return true;
	}
	return false;
}

function login($username,$pass) {
	$row = getUser($username);
	if($row) {
		$password = $row['PASS'];
		if($password==$pass) {
			return true;
		}
	} else {
		return false;
	}
}

// Regresa los datos del usuario
// Ejemplo de uso
// $row = getUser('Masha');
// $nombre = $row['UNOMBRE'];
function getUser($username){
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe"); 
	$querytext = "SELECT * FROM USUARIO WHERE USERNAME = '".$username."'";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
	$nrows = oci_fetch_all($stmt, $res);
	if($nrows){
		$row=oci_fetch_assoc($stmt);
		return $row;
	}
	return false;
}

// Crea un equipo y regresa false si es que ya existe uno con ese nombre o si el usuario ya pertenece a un equipo
function createTeam($nombre, $username){
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe"); 
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

function joinTeam($username, $idteam){
	// busca el team
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe"); 
	$querytext = "SELECT * FROM EQUIPO  WHERE IDEQUIPO = ".$idteam."";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
	$nrows = oci_fetch_all($stmt, $res);
	if($nrows){
		// si es que hay, checa si son menos de 5, y si si, se une
		$row=oci_fetch_assoc($stmt);
		if($row['NINT']<5){
			$nnint=$row['NINT']+1;
			$querytext = "UPDATE EQUIPO SET NINT=".$nnint." WHERE IDEQUIPO=".$idteam."";
			$stmt = oci_parse($conexion,$querytext);
			oci_execute($stmt);
			$querytext = "INSERT INTO INTEGRANTE (IDEQUIPO, IDUSUARIO) VALUES (".$idteam.",(SELECT IDUSUARIO FROM USUARIO WHERE USERNAME = '".$username."''))";
			$stmt = oci_parse($conexion,$querytext);
			oci_execute($stmt);
			return true;
		}
		return false;	
	}
	// sino, regresa false
	return false;
}


/*
// Mostrar datos de torneos NO activos
$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
$querytext = "SELECT IDTORNEO, TIPO, NOINT, FECHA FROM TORNEO NATURAL JOIN TIPOTORNEO WHERE ACTIVO = 0";
$stmt = oci_parse($conexion,$querytext);
oci_execute($stmt);
$nrows = oci_fetch_all($stmt, $res);
if($nrows){
	while($row=oci_fetch_assoc($stmt)) {

		// CREAR TABLA DE DATOS

	}
}

// Mostrar datos de torneos activos
$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
$querytext = "SELECT IDTORNEO, TIPO, NOINT, FECHA FROM TORNEO NATURAL JOIN TIPOTORNEO WHERE ACTIVO = 1";
$stmt = oci_parse($conexion,$querytext);
oci_execute($stmt);
$nrows = oci_fetch_all($stmt, $res);
if($nrows){
	while($row=oci_fetch_assoc($stmt)) {

		// CREAR TABLA DE DATOS

	}
}

// Mostrar los torneos en los que participas
$enombre = getTeamName($username);
$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
$querytext = "SELECT IDTORNEO, TIPO, NOINT, FECHA FROM TORNEO NATURAL JOIN TIPOTORNEO NATURAL JOIN PARTICIPANTE WHERE ENOMBRE = '".$enombre."'";
$stmt = oci_parse($conexion,$querytext);
oci_execute($stmt);
$nrows = oci_fetch_all($stmt, $res);
if($nrows){
	while($row=oci_fetch_assoc($stmt)) {

		// CREAR TABLA DE DATOS

	}
}

// Mostrar los stats de los torneos donde participas
$enombre = getTeamName($username);
$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
$querytext = "SELECT IDTORNEO, TIPO, NOINT, FECHA FROM TORNEO NATURAL JOIN TIPOTORNEO NATURAL JOIN PARTICIPANTE WHERE ENOMBRE = '".$enombre."'";
$stmt = oci_parse($conexion,$querytext);
oci_execute($stmt);
$nrows = oci_fetch_all($stmt, $res);
if($nrows){
	while($row=oci_fetch_assoc($stmt)) {

		// Se genera tabla de torneo

		$querytext = "SELECT ENOMBRE, PUNTAJE, POSICION FROM PARTICIPANTE NATURAL JOIN EQUIPO WHERE IDTORNEO = ".$row['IDTORNEO']."";
		$stmt2 = oci_parse($conexion,$querytext);
		oci_execute($stmt2);
		$nrows = oci_fetch_all($stmt2, $res);
		if($nrows){
			while($rowt=oci_fetch_assoc($stmt2)) {

				// CREAR TABLA DE DATOS

			}
		}

	}
}*/

// Añade un participante	
function addParticipant($username, $idtorneo) {
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
	$querytext = "SELECT NOINT FROM TORNEO WHERE IDTORNEO = ".$idtorneo."";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
	$nrows = oci_fetch_all($stmt, $res);
	if($nrows){
		$row=oci_fetch_assoc($stmt);
		$noint = $row['NOINT'];
		if($noint>=0 && $noint<8) {
			$noint = $noint+1;
			$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
			$querytext = "UPDATE TORNEO SET NOINT=".$noint." WHERE IDTORNEO=".$idtorneo."";
			$stmt = oci_parse($conexion,$querytext);
			oci_execute($stmt);
			$querytext = "SELECT IDEQUIPO FROM EQUIPO NATURAL JOIN USUARIO WHERE USERNAME = '".$username."'";
			$stmt = oci_parse($conexion,$querytext);
			oci_execute($stmt);
			$nrows = oci_fetch_all($stmt, $res);
			if($nrows){
				$row=oci_fetch_assoc($stmt);
				$idequipo = $row['IDEQUIPO'];
				$querytext = "INSERT INTO PARTICIPANTE (IDEQUIPO, IDTORNEO) VALUES (".$idequipo.",".$idtorneo.")";
				$stmt = oci_parse($conexion,$querytext);
				oci_execute($stmt);
			} else {
				return false;
			}
		} else {
			return false;
		}
}

// Función que crea un torneo
function createTournament($fecha,$idtipo){
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
	$querytext = "INSERT INTO TORNEO (FECHA, IDTIPO) VALUES ('".$fecha."',".$idtipo.")";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
}

// Regresa true si es que tiene equipo
public static function hasTeam($username){
	$conexion = oci_connect("diego", "tec2048", "localhost/xe"); 
	$querytext = "SELECT * FROM USUARIO NATURAL JOIN INTEGRANTE NATURAL JOIN EQUIPO WHERE USERNAME = ".$username."";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
	$nrows = oci_fetch_all($stmt, $res);
	if($nrows){
		return true;
	} else {
		return false;
	}
}

// Regresa el nombre del equipo del usuario
function getTeamInfo($username) {
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
	$querytext = "SELECT ENOMBRE FROM USUARIO NATURAL JOIN INTEGRANTE NATURAL JOIN EQUIPO WHERE USERNAME = ".$username."";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
	$nrows = oci_fetch_all($stmt, $res);
	if($nrows){
		$row=oci_fetch_assoc($stmt);
		return $row;
	} else {
		return false;
	}
}
/*
// Genera la lista de los integrantes del equipo
$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
$teamname = getTeamName($username);
$querytext = "SELECT ALIAS, LIGA, UNOMBRE, UAPELLIDO, EDAD FROM USUARIO NATURAL JOIN INTEGRANTE NATURAL JOIN EQUIPO WHERE ENOMBRE =	'".$teamname."'";
$stmt = oci_parse($conexion,$querytext);
oci_execute($stmt);
$nrows = oci_fetch_all($stmt, $res);
if($nrows){
	while($row=oci_fetch_assoc($stmt)) {

		// CREAR TABLA DE DATOS

	}
}
*/
function changeStat($idequipo, $idtorneo, $puntaje, $posicion) {
	$conexion = oci_connect("system", "Rocha1997", "localhost/xe");
	$querytext = "UPDATE PARTICIPANTE SET PUNTAJE={".$puntaje.", POSICION=".$posicion." WHERE IDEQUIPO=".$idequipo." AND IDTORNEO=".$idtorneo."";
	$stmt = oci_parse($conexion,$querytext);
	oci_execute($stmt);
}

}

