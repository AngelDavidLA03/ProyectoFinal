/* 
CREACION DE BASE DE DATOS db_serviciosocial
INTEGRANTES:
- JESUS ESTRADA GOMEZ -20660051
- ANGEL DAVID LOPEZ ALVAREZ - 20660062
- PABLO ROCHA VARGAS - 20660075
*/

/* ------------------------------- CREACION DE LA BASE DE DATOS ------------------------------- */

CREATE DATABASE db_servicioSocial;

USE db_servicioSocial;

/* TABLA USUARIO */
CREATE TABLE usuario (
	codUser VARCHAR(10) PRIMARY KEY NOT NULL COMMENT 'Vincular de los codigos ya generados',
	username VARCHAR(5) NOT NULL COMMENT 'Generar automaticamente y no sera posible modificarlo',
	pass VARCHAR(10) NOT NULL COMMENT 'Sera igual al codigo secundario del tipo de usuario',
	tipoUser VARCHAR(11) NOT NULL COMMENT 'Solo permitir valores como Dependencia, Alumno y Coordinador'
	) ENGINE=INNODB;
	
INSERT INTO usuario (`codUser`, `username`, `pass`, `tipoUser`) VALUES ('2366ALU000', '00000', '1234', 'Alumno');
INSERT INTO usuario (`codUser`, `username`, `pass`, `tipoUser`) VALUES ('2366COR000', '00000', '567', 'Coordinador');
INSERT INTO usuario (`codUser`, `username`, `pass`, `tipoUser`) VALUES ('2366DEP000', '00000', '890', 'Dependencia');


/* TABLA DEPENDENCIA */
CREATE TABLE dependencia(
	codUserDepend VARCHAR(10) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, identificador de la institucion, tipo de usuario simplificado (DEP), y numeros siguiendo el orden del 001 hasta el 999',
	idDepend VARCHAR(7) NOT NULL COMMENT 'Generar automaticamente con el año de generacion del documento de convenio, el separador "-" y el numero de convenio arrojado por el documento de convenio',
	nomDepend VARCHAR(32) NOT NULL COMMENT 'Introducir el nombre de la dependencia (abreviado o completo dependiendo el caso) en un maximo de 32 caracteres',
	RFC VARCHAR(13) NOT NULL,
	califDepend VARCHAR(9) NOT NULL COMMENT 'Solo permitir valores como Terrible, Mala, Regular, Buena y Excelente',
	numTrabajadores INT(2) NOT NULL,
	enfoqueDepend VARCHAR(24) NOT NULL COMMENT 'Introducir a que se dedica la empresa en un maximo de 24 caracteres',
	/* CONTACTO */
	emailDepend VARCHAR(128) NOT NULL,
	numTelfDepend VARCHAR(18) NOT NULL,
	/* --------- */
	/* DIRECCION */
	calleDepend VARCHAR(21) NOT NULL,
	numExtDepend INT(3) NOT NULL,
	numIntDepend INT(3) NOT NULL,
	coloniaDepend VARCHAR(15) NOT NULL,
	cpDepend INT(5) NOT NULL COMMENT 'Codigo Postal',
	ciudadDepend VARCHAR(20) NOT NULL,
	efDepend VARCHAR(20) NOT NULL COMMENT 'Entidad Federativa',
	/* --------- */
	logo LONGBLOB NULL COMMENT 'Imagen de logo de la dependencia',
	tipoDepend VARCHAR(7) NOT NULL COMMENT 'Solo permitir valores como Publica, Social y Privada'
	) COMMENT 'CREAR UNICAMENTE CUANDO EXISTA UN CONVENIO ENTRE LA INSTITUCION Y LA DEPENDENCIA',
	ENGINE=INNODB;

/* SUBTABLA PUBLICA */
CREATE TABLE publica (
	codUserDependPublic VARCHAR(10) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `codUserDependPublic` (`codUserDependPublic`) USING BTREE,
	CONSTRAINT `ESPEC_codUserDependPublic` FOREIGN KEY (`codUserDependPublic`) REFERENCES `db_servicioSocial`.`dependencia` (`codUserDepend`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

/* SUBTABLA SOCIAL */
CREATE TABLE social (
	codUserDependSoc VARCHAR(10) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `codUserDependSoc` (`codUserDependSoc`) USING BTREE,
	CONSTRAINT `ESPEC_codUserDependSoc` FOREIGN KEY (`codUserDependSoc`) REFERENCES `db_servicioSocial`.`dependencia` (`codUserDepend`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

/* SUBTABLA PRIVADA */
CREATE TABLE privada (
	codUserDependPriv VARCHAR(10) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `codUserDependPriv` (`codUserDependPriv`) USING BTREE,
	CONSTRAINT `ESPEC_codUserDependPriv` FOREIGN KEY (`codUserDependPriv`) REFERENCES `db_servicioSocial`.`dependencia` (`codUserDepend`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

/* TABLA ESTADO DE VERIFICACION */
CREATE TABLE estadoVerif (
	idEstado INT(1) PRIMARY KEY NOT NULL,
	nomEstado VARCHAR(11) NOT NULL COMMENT 'Solo permitir valores como Espera, Verificando, Aprobada, Rechazada'
) COMMENT 'NO INTRODUCIR VALORES EN ESTA TABLA',
ENGINE=INNODB;

INSERT INTO estadoVerif (`idEstado`, `nomEstado`) VALUES (1, 'Espera');
INSERT INTO estadoVerif (`idEstado`, `nomEstado`) VALUES (2, 'Verificando');
INSERT INTO estadoVerif (`idEstado`, `nomEstado`) VALUES (3, 'Aprobada');
INSERT INTO estadoVerif (`idEstado`, `nomEstado`) VALUES (4, 'Rechazada');


/* TABLA DIRECTOR GENERAL */
CREATE TABLE directorGeneral (
	idDirector VARCHAR(10) PRIMARY KEY NOT NULL COMMENT 'Formado por letra inicial de su nombre(s), apellidos y fecha de registro',
	/* NOMBRE */
	nomDirector VARCHAR(24) NOT NULL,
	apDirector VARCHAR(16) NOT NULL,
	amDirector VARCHAR(16) NOT NULL,
	/* ------ */
	edadDirector INT(2) NOT NULL,
	curpDirector VARCHAR(18) NOT NULL,
	/* CONTACTO */
	emailDirector VARCHAR(128) NOT NULL,
	numTelfDirector VARCHAR(18) NOT NULL
	/* --------- */
) ENGINE=INNODB;

/* TABLA AREA */
CREATE TABLE area (
	idArea VARCHAR(7) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el numero de convenio arrojado por el documento de convenio, un separador "-" y el numero de area que puede ser desde 01 hasta 99',
	nomArea VARCHAR(18) NOT NULL,
	desArea VARCHAR(32) NOT NULL COMMENT 'Introducir la descripcion de la area en un maximo de 32 caracteres'
) ENGINE=INNODB;

/* TABLA ALUMNO */
CREATE TABLE alumno (
	codUserAlumn VARCHAR(10) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, identificador de la institucion, tipo de usuario simplificado (ALU), y numeros siguiendo el orden del 001 hasta el 999',
	matricula VARCHAR(10) NOT NULL COMMENT 'Modificar la longitud segun si es requerido por la institucion',
	/* NOMBRE */
	nomAlumn VARCHAR(24) NOT NULL,
	apAlumn VARCHAR(16) NOT NULL,
	amAlumn VARCHAR(16) NOT NULL,
	/* ------ */
	curpAlumn VARCHAR(18) NOT NULL,
	edadAlumn INT(2) NOT NULL,
	generoAlumn VARCHAR(1) NOT NULL COMMENT 'Solo permitir valores como M (Masculino), F (Femenino) y S (Sin Especificar)',
	semestre INT(1) NOT NULL COMMENT 'Colocar el numero de semestre',
	especialidad VARCHAR(5) NOT NULL COMMENT 'Solo permitir el nombre de la especialidad abreviado',
	creditosAcum INT(3) NOT NULL,
	localidadAlum VARCHAR(15) NOT NULL,
	/* CONTACTO */
	emailAlumn VARCHAR(128) NOT NULL,
	numTelfAlumn VARCHAR(18) NOT NULL,
	/* --------- */
	foto LONGBLOB NULL COMMENT 'Foto del alumno'
) ENGINE=INNODB;

/* TABLA COORDINADOR */
CREATE TABLE coordinador (
	codUserCoord VARCHAR(10) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, identificador de la institucion, tipo de usuario simplificado (COR), y numeros siguiendo el orden del 001 hasta el 999',
	idCoord VARCHAR(10) NOT NULL COMMENT 'Generar automaticamente con el año de registro, codigo de la escuela, letra inicial de su nombre(s) y apellidos',
	/* NOMBRE */
	nomCoord VARCHAR(24) NOT NULL,
	apCoord VARCHAR(16) NOT NULL,
	amCoord VARCHAR(16) NOT NULL,
	/* ------ */
	/* CONTACTO */
	emailCoord VARCHAR(128) NOT NULL,
	numTelfCoord VARCHAR(18) NOT NULL
	/* --------- */
) ENGINE=INNODB;

/* TABLA SERVICIO SOCIAL */
CREATE TABLE servicioSocial (
	idServicio VARCHAR(11) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, letra inicial del nombre(s) y apellidos del director general y especialidad solicitada',
	actividades VARCHAR(256) NOT NULL COMMENT 'Introducir las actividades que se realizaran durante el servicio social en un maximo de 256 caracteres',
	/* HORARIO */
	horaInicio TIME NOT NULL,
	diasPorSem INT(1) NOT NULL COMMENT 'Cantidad de dias entre semana los que se tendran que asistir',
	horaFin TIME NOT NULL,
	/* ------- */
	fechaInicio DATE NOT NULL,
	fechaFin DATE NOT NULL
) ENGINE=INNODB;

/* TABLA DOCUMENTO */
CREATE TABLE documento (
	idDocument VARCHAR(11) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el tipo de documento abreviado y año de generacion',
	fechaEntrega DATE NOT NULL,
	document LONGBLOB NOT NULL COMMENT 'Documentos subidos por los usuarios',
	tipoDocument VARCHAR(18) NOT NULL COMMENT 'Solo permitir valores como CartaAceptacion, CartaFinalizacion, ReporteActividades, Honorarios y Convenio'
) ENGINE=INNODB;

/* SUBTABLA CONVENIO */
CREATE TABLE convenio (
	idDocumentConv VARCHAR(11) PRIMARY KEY NOT NULL,
	numConv INT(4) NOT NULL,
	UNIQUE INDEX `idDocumentConv` (`idDocumentConv`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentConv` FOREIGN KEY (`idDocumentConv`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CNV',
ENGINE=INNODB;

/* SUBTABLA CARTA DE PRESENTACION */
CREATE TABLE cartaPresentacion (
	idDocumentPresent VARCHAR(11) PRIMARY KEY NOT NULL,
	matriculaPresent VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentPresent` (`idDocumentPresent`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentPresent` FOREIGN KEY (`idDocumentPresent`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CPE',
ENGINE=INNODB;

/* SUBTABLA CONSTANCIA DE ESTUDIOS */
CREATE TABLE constancia (
	idDocumentConst VARCHAR(11) PRIMARY KEY NOT NULL,
	matriculaConst VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentConst` (`idDocumentConst`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentConst` FOREIGN KEY (`idDocumentConst`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CON',
ENGINE=INNODB;

/* SUBTABLA REPORTE DE ACTIVIDADES */
CREATE TABLE reporteActividades (
	idDocumentReportAct VARCHAR(11) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `idDocumentReportAct` (`idDocumentReportAct`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentReportAct` FOREIGN KEY (`idDocumentReportAct`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = NRE',
ENGINE=INNODB;

/* SUBTABLA DECRETOS */
CREATE TABLE decretos (
	idDocumentDec VARCHAR(11) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `idDocumentDec` (`idDocumentDec`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentDec` FOREIGN KEY (`idDocumentDec`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = DEC',
ENGINE=INNODB;

/* SUBTABLA NOMBRAMIENTO DEL REPRESENTANTE */
CREATE TABLE nombramientoRepresentante (
	idDocumentNomRep VARCHAR(11) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `idDocumentNomRep` (`idDocumentNomRep`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentNomRep` FOREIGN KEY (`idDocumentNomRep`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = NRE',
ENGINE=INNODB;

/* SUBTABLA IDENTIFICACION OFICIAL DEL REPRESENTANTE */
CREATE TABLE identificacionRepresentante (
	idDocumentINE VARCHAR(11) PRIMARY KEY NOT NULL,
	documentCURP VARCHAR(18) NOT NULL,
	UNIQUE INDEX `idDocumentINE` (`idDocumentINE`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentINE` FOREIGN KEY (`idDocumentINE`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = INE',
ENGINE=INNODB;

/* SUBTABLA COMPROBANTE DE DOMICILIO */
CREATE TABLE comprobanteDomicilio (
	idDocumentDomic VARCHAR(11) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `idDocumentDomic` (`idDocumentDomic`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentDomic` FOREIGN KEY (`idDocumentDomic`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = DOM',
ENGINE=INNODB;

/* SUBTABLA REGISTRO FEDERAL DEL CONTRIBUYENTE */
CREATE TABLE regFedCont (
	idDocumentRFC VARCHAR(11) PRIMARY KEY NOT NULL,
	documentRFC VARCHAR(13) NOT NULL,
	UNIQUE INDEX `idDocumentRFC` (`idDocumentRFC`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentRFC` FOREIGN KEY (`idDocumentRFC`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = RFC',
ENGINE=INNODB;

/* SUBTABLA CARTA DE ACEPTACION */
CREATE TABLE cartaAceptacion (
	idDocumentAcept VARCHAR(11) PRIMARY KEY NOT NULL,
	matriculaAcept VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentAcept` (`idDocumentAcept`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentAcept` FOREIGN KEY (`idDocumentAcept`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
)COMMENT 'ABREVIACION = CAC',
ENGINE=INNODB;

/* SUBTABLA LISTADO DE ACTIVIDADES */
CREATE TABLE listaActividades (
	idDocumentAct VARCHAR(11) PRIMARY KEY NOT NULL,
	listAct VARCHAR(128) NOT NULL COMMENT 'Introducir las actividades a realizar en un maximo de 128 caracteres',
	UNIQUE INDEX `idDocumentAct` (`idDocumentAct`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentAct` FOREIGN KEY (`idDocumentAct`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = LAC',
ENGINE=INNODB;

/* SUBTABLA HONORARIOS */
CREATE TABLE honorarios (
	idDocumentHon VARCHAR(11) PRIMARY KEY NOT NULL,
	monto DECIMAL(6,2) NULL COMMENT 'Cantidad de dinero a recibir',
	motivo VARCHAR(24) NULL COMMENT 'Motivo de los honorarios',
	matriculaHon VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentHon` (`idDocumentHon`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentHon` FOREIGN KEY (`idDocumentHon`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = HON',
ENGINE=INNODB;

/* SUBTABLA REPORTE DE ALUMNOS EN SERVICIO SOCIAL */
CREATE TABLE reportAlumnos (
	idDocumentReportAlumn VARCHAR(11) PRIMARY KEY NOT NULL,
	documentMotivoAlumn VARCHAR(24) NOT NULL COMMENT 'Motivo de la realizacion del reporte',
	UNIQUE INDEX `idDocumentReportAlumn` (`idDocumentReportAlumn`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentReportAlumn` FOREIGN KEY (`idDocumentReportAlumn`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = RAL',
ENGINE=INNODB;

/* SUBTABLA CARTA DE BAJA DE ALUMNO DE SERVICIO SOCIAL */
CREATE TABLE cartaBaja (
	idDocumentBajaAlumn VARCHAR(11) PRIMARY KEY NOT NULL,
	matriculaBaja VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentBajaAlumn` (`idDocumentBajaAlumn`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentBajaAlumn` FOREIGN KEY (`idDocumentBajaAlumn`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CBA',
ENGINE=INNODB;

/* SUBTABLA CARTA DE LIBERACION */
CREATE TABLE cartaLiberacion (
	idDocumentLib VARCHAR(11) PRIMARY KEY NOT NULL,
	matriculaLib VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentLib` (`idDocumentLib`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentLib` FOREIGN KEY (`idDocumentLib`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CLI',
ENGINE=INNODB;

/* SUBTABLA REPORTE DE DEPENDENCIAS */
CREATE TABLE reportDependencias (
	idDocumentReportDep VARCHAR(11) PRIMARY KEY NOT NULL,
	documentMotivoDep VARCHAR(24) NOT NULL COMMENT 'Motivo de la realizacion del reporte',
	UNIQUE INDEX `idDocumentReportDep` (`idDocumentReportDep`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentReportDep` FOREIGN KEY (`idDocumentReportDep`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = RDE',
ENGINE=INNODB;

/* SUBTABLA CARTA DE FINALIZACION */
CREATE TABLE cartaFinalizacion (
	idDocumentFin VARCHAR(11) PRIMARY KEY NOT NULL,
	matriculaFin VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentFin` (`idDocumentFin`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentFin` FOREIGN KEY (`idDocumentFin`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CFI',
ENGINE=INNODB;

/* RELACION ADMINISTRAR (DIRECTOR GENERAL 1 - DEPENDENCIA 1) */
CREATE TABLE Administrar (
	codUserDepend VARCHAR(10) NOT NULL UNIQUE,
	idDirector VARCHAR(10) NOT NULL UNIQUE
) ENGINE=INNODB;

ALTER TABLE Administrar ADD CONSTRAINT FK_codUserDepend_Admin FOREIGN KEY (codUserDepend) REFERENCES dependencia(codUserDepend) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Administrar ADD CONSTRAINT FK_idDirector_Admin FOREIGN KEY (idDirector) REFERENCES directorGeneral(idDirector) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION SOLICITAR (DEPENDENCIA 1 - SERVICIO SOCIAL M) */
CREATE TABLE Solicitar (
	codUserDepend VARCHAR(10) NOT NULL UNIQUE,
	idServicio VARCHAR(11) NOT NULL UNIQUE
) ENGINE=INNODB;

ALTER TABLE Solicitar ADD CONSTRAINT FK_codUserDepend_Solic FOREIGN KEY (codUserDepend) REFERENCES dependencia(codUserDepend) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Solicitar ADD CONSTRAINT FK_idServicio_Solic FOREIGN KEY (idServicio) REFERENCES servicioSocial(idServicio) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION TENER (DEPENDENCIA M - ESTADO DE VERIFICACION M) */
CREATE TABLE Tener(
	codUserDepend VARCHAR(10) PRIMARY KEY NOT NULL,
	idEstado INT(1) NOT NULL,
	fechaUpdate DATE NOT NULL,
	porcenActual INT(2) NULL COMMENT 'Introducir el porcentaje de revision actual en un rango de 0 - 99 (Solo cuando el idEstado sea de 2)',
	razonRech VARCHAR(64) NULL COMMENT 'Introducir la razon por la cual se rechazo en un maximo de 64 caracteres (Solo cuando el idEstado sea de 4)'
) ENGINE=INNODB;

ALTER TABLE Tener ADD CONSTRAINT FK_codUserDepend_Tener FOREIGN KEY (codUserDepend) REFERENCES dependencia(codUserDepend) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Tener ADD CONSTRAINT FK_idEstado_Tener FOREIGN KEY (idEstado) REFERENCES estadoVerif(idEstado) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION POSEER (DEPENDENCIA 1 - AREA M) */
CREATE TABLE Poseer (
	codUserDepend VARCHAR(10) NOT NULL,
	idArea VARCHAR(7) NOT NULL UNIQUE
) ENGINE=INNODB;

ALTER TABLE Poseer ADD CONSTRAINT FK_codUserDepend_Poseer FOREIGN KEY (codUserDepend) REFERENCES dependencia(codUserDepend) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Poseer ADD CONSTRAINT FK_idArea_Poseer FOREIGN KEY (idArea) REFERENCES area(idArea) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION REQUERIR (SERVICIO SOCIAL M - AREA M) */
CREATE TABLE Requerir (
	idArea VARCHAR(7) NOT NULL,
	idServicio VARCHAR(11) NOT NULL,
	especialidadRec VARCHAR(5) NULL
) ENGINE=INNODB;

ALTER TABLE Requerir ADD CONSTRAINT FK_idArea_Req FOREIGN KEY (idArea) REFERENCES area(idArea) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Requerir ADD CONSTRAINT FK_idServicio_Req FOREIGN KEY (idServicio) REFERENCES servicioSocial(idServicio) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION REALIZAR (ALUMNO M - SERVICIO SOCIAL 1) */
CREATE TABLE Realizar (
	codUserAlumn VARCHAR(10) NOT NULL UNIQUE,
	idServicio VARCHAR(11) NOT NULL
) ENGINE=INNODB;

ALTER TABLE Realizar ADD CONSTRAINT FK_codUserAlumn_Real FOREIGN KEY (codUserAlumn) REFERENCES alumno(codUserAlumn) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Realizar ADD CONSTRAINT FK_idServicio_Real FOREIGN KEY (idServicio) REFERENCES servicioSocial(idServicio) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION GENERAR (SERVICIO SOCIAL 1 - DOCUMENTO M) */
CREATE TABLE Generar (
	idServicio VARCHAR(11) NOT NULL,
	idDocument VARCHAR(11) NOT NULL UNIQUE,
	coments VARCHAR(52) NOT NULL COMMENT 'Introducir los comentarios hacia el documento en un maximo de 52 caracteres' NULL
) ENGINE=INNODB;

ALTER TABLE Generar ADD CONSTRAINT FK_idServicio_Gen FOREIGN KEY (idServicio) REFERENCES servicioSocial(idServicio) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Generar ADD CONSTRAINT FK_idDocument_Gen FOREIGN KEY (idDocument) REFERENCES documento(idDocument) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION REVISAR (COORDINADOR 1 - DOCUMENTO M) */
CREATE TABLE Revisar (
	codUserCoord VARCHAR(10) NOT NULL,
	idDocument VARCHAR(11) NOT NULL UNIQUE
) ENGINE=INNODB;

ALTER TABLE Revisar ADD CONSTRAINT FK_codUserCoord_Rev FOREIGN KEY (codUserCoord) REFERENCES coordinador(codUserCoord) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Revisar ADD CONSTRAINT FK_idDocument_Rev FOREIGN KEY (idDocument) REFERENCES documento(idDocument) ON DELETE CASCADE ON UPDATE CASCADE;

/* ------------------------------- PROCEDIMIENTOS PARA LA BASE DE DATOS ------------------------------- */

/* PROCEDIMIENTO UTILIZADO PARA CONTROLAR EL ACCESO AL SISTEMA */
CREATE DEFINER=`root`@`localhost` PROCEDURE `loginAccess`(
	IN `usernameL` VARCHAR(5),
	IN `passwordL` VARCHAR(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO UTILIZADO PARA CONTROLAR EL ACCESO AL SISTEMA'
SELECT COUNT(codUser) AS isExist, tipoUser, codUser
FROM usuario
WHERE (usernameL LIKE username) AND (passwordL LIKE pass);

/* PROCEDIMIENTO PARA LA CARGA DE ARCHIVOS */
