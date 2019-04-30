
-- ==================== TABLA PRIVILEGIOS

CREATE TABLE PPrivilegio (
    IDPriv int NOT NULL CONSTRAINT pk_IDPriv PRIMARY KEY,
    Nivel VARCHAR(20) NOT NULL
);
INSERT INTO PPrivilegio (IDPriv, Nivel) VALUES (0, 'Usuario');
INSERT INTO PPrivilegio (IDPriv, Nivel) VALUES (1, 'Moderador');
INSERT INTO PPrivilegio (IDPriv, Nivel) VALUES (2, 'Administrador');

-- ==================== TABLA TIPO DE TORNEO

CREATE TABLE PTipoTorneo (
    IDTipo int NOT NULL CONSTRAINT pk_IDTipo PRIMARY KEY,
    Tipo varchar(20) NOT NULL
);
INSERT INTO PTipoTorneo (IDTipo, Tipo) VALUES (0,'Eliminatoria');
INSERT INTO PTipoTorneo (IDTipo, Tipo) VALUES (1,'Puntajes');
INSERT INTO PTipoTorneo (IDTipo, Tipo) VALUES (2,'Amistoso');

-- ==================== TABLA USUARIO
-- IDUsuario se autoincrementa

CREATE TABLE PUsuario(
	IDUsuario int NOT NULL CONSTRAINT pk_IDUsuario PRIMARY KEY,
	NombreU varchar(30) NOT NULL,
	Apellido varchar(30) NOT NULL,
	Edad int NOT NULL check(Edad > 13),
	Username varchar(30) NOT NULL,
	Liga varchar(20) NOT NULL,
	Contra varchar(30) NOT NULL,
	IDPriv int DEFAULT 0 NOT NULL,
	CONSTRAINT  fk_IDPriv FOREIGN KEY (IDPriv) REFERENCES PPrivilegio(IDPriv)
);
INSERT INTO PUsuario (NombreU, Apellido, Edad, Username, Liga, Contra) VALUES ('Diego', 'Solórzano', 20, 'Vanttik', 'Madera 4', '12345');
INSERT INTO PUsuario (NombreU, Apellido, Edad, Username, Liga, Contra) VALUES ('Hugo', 'Masharelli', 21, 'Masha', 'Oro 1', '12345');
INSERT INTO PUsuario (NombreU, Apellido, Edad, Username, Liga, Contra) VALUES ('Javier', 'Aguayo', 20, 'WhackyPage', 'Bronce 4', '12345');

-- ==================== TABLA EQUIPO
-- IDEquipo se autoincrementa

CREATE TABLE PEquipo (
    IDEquipo int NOT NULL CONSTRAINT pk_IDEquipo PRIMARY KEY,
    NombreE varchar(30)
);
INSERT INTO PEquipo (NombreE) VALUES ('EFrenzy');
INSERT INTO PEquipo (NombreE) VALUES ('Zaga');

-- ==================== TABLA TORNEO
-- IDTorneo se autoincrementa

CREATE TABLE PTorneo (
    IDTorneo int NOT NULL CONSTRAINT pk_IDTorneo PRIMARY KEY,
    NoInt int NOT NULL,
    Fecha DATE NOT NULL,
    Activo number(1,0) DEFAULT 0 NOT NULL,
    IDTipo int NOT NULL CONSTRAINT fk_TipoTorneo References PTipoTorneo(IDTipo)
);
INSERT INTO PTorneo (NoInt, Fecha, IDTipo) VALUES (8,'12-4-2019',0);
INSERT INTO PTorneo (NoInt, Fecha, IDTipo) VALUES (8,'13-4-2019',2);
INSERT INTO PTorneo (NoInt, Fecha, IDTipo) VALUES (8,'14-4-2019',0);
INSERT INTO PTorneo (NoInt, Fecha, IDTipo) VALUES (8,'15-4-2019',0);
INSERT INTO PTorneo (NoInt, Fecha, IDTipo) VALUES (8,'16-4-2019',0);

-- ==================== TABLA INTEGRANTES

CREATE TABLE PIntegrantes (
    IDEquipo int NOT NULL CONSTRAINT fk_EquipoInt REFERENCES PEquipo(IDEquipo),
    IDUsuario int NOT NULL CONSTRAINT fk_UsuarioInt REFERENCES PUsuario(IDUsuario),
    CONSTRAINT pk_Integrantes PRIMARY KEY (IDEquipo, IDUsuario)
); 
INSERT INTO PIntegrantes (IDEquipo, IDUsuario) VALUES (1,1);
INSERT INTO PIntegrantes (IDEquipo, IDUsuario) VALUES (1,2);
INSERT INTO PIntegrantes (IDEquipo, IDUsuario) VALUES (2,3);

-- ==================== TABLA PARTICIPANTES 

CREATE TABLE PParticipantes (
    IDEquipo int NOT NULL CONSTRAINT fk_EquipoPart REFERENCES PEquipo(IDEquipo),
    IDTorneo int NOT NULL CONSTRAINT fk_TorneoPart REFERENCES PTorneo(IDTorneo),
    CONSTRAINT pk_Participantes PRIMARY KEY (IDEquipo, IDTorneo)
);
INSERT INTO PParticipantes (IDEquipo, IDTorneo) VALUES (1,1);
INSERT INTO PParticipantes (IDEquipo, IDTorneo) VALUES (1,2);
INSERT INTO PParticipantes (IDEquipo, IDTorneo) VALUES (1,3);
INSERT INTO PParticipantes (IDEquipo, IDTorneo) VALUES (1,4);
INSERT INTO PParticipantes (IDEquipo, IDTorneo) VALUES (2,5);


-- ==================== TABLA ESTADISTICAS
-- IDEstad se autoincrementa

CREATE TABLE PEstadisticas (
    IDEstad int NOT NULL CONSTRAINT pk_IDEstad PRIMARY KEY,
    Puntaje int NOT NULL,
    Posicion int NOT NULL,
    IDEquipo int NOT NULL CONSTRAINT fk_EquipoEstad REFERENCES PEquipo(IDEquipo),
    IDTorneo int NOT NULL CONSTRAINT fk_TorneoEstad REFERENCES PTorneo(IDTorneo)
);
INSERT INTO PEstadisticas (Puntaje, Posicion, IDEquipo, IDTorneo) VALUES (120,1,1,1);
INSERT INTO PEstadisticas (Puntaje, Posicion, IDEquipo, IDTorneo) VALUES (240,1,1,2);
INSERT INTO PEstadisticas (Puntaje, Posicion, IDEquipo, IDTorneo) VALUES (453,3,1,3);
INSERT INTO PEstadisticas (Puntaje, Posicion, IDEquipo, IDTorneo) VALUES (234,2,1,4);
INSERT INTO PEstadisticas (Puntaje, Posicion, IDEquipo, IDTorneo) VALUES (900,1,2,5);