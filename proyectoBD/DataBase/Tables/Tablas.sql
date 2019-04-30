CREATE TABLE table_Usuario(
	idUsuario int NOT NULL CONSTRAINT pk_idUsuario PRIMARY KEY,
	nombreUsuario varchar(30),
	apellidoUsuario varchar(30),
	edadUsuario int NOT NULL,
	aliasUsuario varchar(30),
	ligaUsuario varchar(20) NOT NULL,
	contrasenaUsuario varchar(30) NOT NULL,
	idPrivilegio int NOT NULL,
	CONSTRAINT  fk_idprivilegio FOREIGN KEY (idPrivilegio) REFERENCES table_Privilegio(idPrivilegio)
);

CREATE TABLE table_Privilegio (
    idPrivilegio int NOT NULL CONSTRAINT pk_idPrivilegio Primary Key,
    nivel int Not Null
);

Create Table table_Equipo (
    idEquipo int Not Null Constraint pk_idEquipo Primary Key,
    nombreEquipo varchar(30)
);

Create Table table_Integrante (
    idEquipo int Not Null Constraint fk_idEquipo References table_Equipo(idEquipo),
    idUsuario int Not Null Constraint fk_idUsuario References table_Usuario(idUsuario)
);

Create Table table_Estadistica (
    idEstadistica int Not Null Constraint pk_idEstadistica Primary Key,
    puntajeEstadistica Char(10),
    posicionEstadistica char(10),
    idEquipo int Not Null Constraint fk_idEquipo2 References table_Equipo(idEquipo),
    idTipoTorneo int Not Null Constraint fk_idTipo References table_tipoTorneo(idTipoTorneo),
    idTorneo int Not Null Constraint fk_idTorneo References table_Torneo(idTorneo)
);
Create Table table_tipoTorneo (
    idTipoTorneo int Not Null Constraint pk_idTipoTorneo Primary Key,
    tipoTorneo varchar(20)
);
Create Table table_torneo (
    idTorneo int Not Null Constraint pk_idTorneo Primary Key,
    noIntegrantesTorneo Char (8)Not Null,
    fechaTorneo DATE,
    activoTorneo number(1,0),
    idTipoTorneo int not null Constraint fk_idTipoTorneo References table_tipoTorneo(idTipoTorneo)
);