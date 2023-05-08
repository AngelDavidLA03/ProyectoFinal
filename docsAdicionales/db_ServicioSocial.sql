/* 
CREACION DE BASE DE DATOS db_serviciosocial
INTEGRANTES:
- JESUS ESTRADA GOMEZ -20660051
- ANGEL DAVID LOPEZ ALVAREZ - 20660062
- PABLO ROCHA VARGAS - 20660075
*/

/* ------------------------------- CREACION DE LA BASE DE DATOS ------------------------------- */

CREATE DATABASE db_servicioSocial;

/* TABLA USUARIO */
CREATE TABLE usuario (
	codUser VARCHAR(11) PRIMARY KEY NOT NULL COMMENT 'Vincular de los codigos ya generados',
	email VARCHAR(128) NOT NULL,
	pass VARCHAR(10) NOT NULL,
	tipoUser VARCHAR(11) NOT NULL COMMENT 'Solo permitir valores como Dependencia, Alumno y Coordinador'
	) ENGINE=INNODB;
	
INSERT INTO usuario (`codUser`, `email`, `pass`, `tipoUser`) VALUES ('2366ALU0000', 'alumno@tecnm.mx', '1234', 'Alumno');
INSERT INTO usuario (`codUser`, `email`, `pass`, `tipoUser`) VALUES ('2366COR0000', 'coord@tecnm.mx', '567', 'Coordinador');
INSERT INTO usuario (`codUser`, `email`, `pass`, `tipoUser`) VALUES ('2366DEP0000', 'depend@tecnm.mx', '890', 'Dependencia');


/* TABLA DEPENDENCIA */
CREATE TABLE dependencia(
	codUserDepend VARCHAR(11) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, identificador de la institucion, tipo de usuario simplificado (DEP), y numeros siguiendo el orden del 0001 hasta el 9999',
	idDepend VARCHAR(7) NOT NULL COMMENT 'Generar automaticamente con el año de generacion del documento de convenio, el separador "-" y el numero de convenio arrojado por el documento de convenio',
	nomDepend VARCHAR(32) NOT NULL COMMENT 'Introducir el nombre de la dependencia (abreviado o completo dependiendo el caso) en un maximo de 32 caracteres',
	RFC VARCHAR(13) NOT NULL,
	califDepend VARCHAR(9) NOT NULL COMMENT 'Solo permitir valores como Terrible, Mala, Regular, Buena y Excelente',
	numTrabajadores INT(2) NOT NULL,
	enfoqueDepend VARCHAR(24) NOT NULL COMMENT 'Introducir a que se dedica la empresa en un maximo de 24 caracteres',
	/* CONTACTO */
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
	codUserDependPublic VARCHAR(11) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `codUserDependPublic` (`codUserDependPublic`) USING BTREE,
	CONSTRAINT `ESPEC_codUserDependPublic` FOREIGN KEY (`codUserDependPublic`) REFERENCES `db_servicioSocial`.`dependencia` (`codUserDepend`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

/* SUBTABLA SOCIAL */
CREATE TABLE social (
	codUserDependSoc VARCHAR(11) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `codUserDependSoc` (`codUserDependSoc`) USING BTREE,
	CONSTRAINT `ESPEC_codUserDependSoc` FOREIGN KEY (`codUserDependSoc`) REFERENCES `db_servicioSocial`.`dependencia` (`codUserDepend`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

/* SUBTABLA PRIVADA */
CREATE TABLE privada (
	codUserDependPriv VARCHAR(11) PRIMARY KEY NOT NULL,
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
	nomDirector VARCHAR(48) NOT NULL,
	apDirector VARCHAR(24) NOT NULL,
	amDirector VARCHAR(24) NOT NULL,
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
	codUserAlumn VARCHAR(11) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, identificador de la institucion, tipo de usuario simplificado (ALU), y numeros siguiendo el orden del 0001 hasta el 9999',
	matricula VARCHAR(10) NOT NULL COMMENT 'Modificar la longitud segun si es requerido por la institucion',
	/* NOMBRE */
	nomAlumn VARCHAR(48) NOT NULL,
	apAlumn VARCHAR(24) NOT NULL,
	amAlumn VARCHAR(24) NOT NULL,
	/* ------ */
	curpAlumn VARCHAR(18) NOT NULL,
	edadAlumn INT(2) NOT NULL,
	generoAlumn VARCHAR(1) NOT NULL COMMENT 'Solo permitir valores como M (Masculino), F (Femenino) y S (Sin Especificar)',
	semestre INT(2) NOT NULL COMMENT 'Colocar el numero de semestre',
	especialidad VARCHAR(5) NOT NULL COMMENT 'Solo permitir el nombre de la especialidad abreviado',
	creditosAcum INT(3) NOT NULL,
	localidadAlum VARCHAR(15) NOT NULL,
	/* CONTACTO */
	numTelfAlumn VARCHAR(18) NOT NULL,
	/* --------- */
	foto LONGBLOB NULL COMMENT 'Foto del alumno'
) ENGINE=INNODB;

/* TABLA COORDINADOR */
CREATE TABLE coordinador (
	codUserCoord VARCHAR(11) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, identificador de la institucion, tipo de usuario simplificado (COR), y numeros siguiendo el orden del 0001 hasta el 9999',
	idCoord VARCHAR(10) NOT NULL COMMENT 'Generar automaticamente con el año de registro, codigo de la escuela, letra inicial de su nombre(s) y apellidos',
	/* NOMBRE */
	nomCoord VARCHAR(48) NOT NULL,
	apCoord VARCHAR(24) NOT NULL,
	amCoord VARCHAR(24) NOT NULL,
	/* ------ */
	/* CONTACTO */
	numTelfCoord VARCHAR(18) NOT NULL
	/* --------- */
) ENGINE=INNODB;

/* TABLA SERVICIO SOCIAL */
CREATE TABLE servicioSocial (
	idServicio VARCHAR(11) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, letra inicial del nombre(s) y apellidos del director general y especialidad solicitada',
	nomServic VARCHAR(54) NOT NULL COMMENT 'Nombre descriptivo propio del servicio social',
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
	idDocument VARCHAR(8) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de generacion, tipo de documento abreviado y numeros siguiendo el orden del 001 hasta el 999',
	fechaEntrega DATE NOT NULL,
	document LONGBLOB NOT NULL COMMENT 'Documentos subidos por los usuarios',
	tipoDocument VARCHAR(3) NOT NULL COMMENT 'Solo permitir valores como la abreviacion del tipo de documento'
) ENGINE=INNODB;

/* SUBTABLA CONVENIO */
CREATE TABLE convenio (
	idDocumentConv VARCHAR(8) PRIMARY KEY NOT NULL,
	numConv INT(4) NOT NULL,
	UNIQUE INDEX `idDocumentConv` (`idDocumentConv`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentConv` FOREIGN KEY (`idDocumentConv`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CNV',
ENGINE=INNODB;

/* SUBTABLA CARTA DE PRESENTACION */
CREATE TABLE cartaPresentacion (
	idDocumentPresent VARCHAR(8) PRIMARY KEY NOT NULL,
	matriculaPresent VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentPresent` (`idDocumentPresent`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentPresent` FOREIGN KEY (`idDocumentPresent`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CPE',
ENGINE=INNODB;

/* SUBTABLA CONSTANCIA DE ESTUDIOS */
CREATE TABLE constancia (
	idDocumentConst VARCHAR(8) PRIMARY KEY NOT NULL,
	matriculaConst VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentConst` (`idDocumentConst`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentConst` FOREIGN KEY (`idDocumentConst`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CON',
ENGINE=INNODB;

/* SUBTABLA REPORTE DE ACTIVIDADES */
CREATE TABLE reporteActividades (
	idDocumentReportAct VARCHAR(8) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `idDocumentReportAct` (`idDocumentReportAct`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentReportAct` FOREIGN KEY (`idDocumentReportAct`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = RAC',
ENGINE=INNODB;

/* SUBTABLA DECRETOS */
CREATE TABLE decretos (
	idDocumentDec VARCHAR(8) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `idDocumentDec` (`idDocumentDec`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentDec` FOREIGN KEY (`idDocumentDec`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = DEC',
ENGINE=INNODB;

/* SUBTABLA NOMBRAMIENTO DEL REPRESENTANTE */
CREATE TABLE nombramientoRepresentante (
	idDocumentNomRep VARCHAR(8) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `idDocumentNomRep` (`idDocumentNomRep`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentNomRep` FOREIGN KEY (`idDocumentNomRep`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = NRE',
ENGINE=INNODB;

/* SUBTABLA IDENTIFICACION OFICIAL DEL REPRESENTANTE */
CREATE TABLE identificacionRepresentante (
	idDocumentINE VARCHAR(8) PRIMARY KEY NOT NULL,
	documentCURP VARCHAR(18) NOT NULL,
	UNIQUE INDEX `idDocumentINE` (`idDocumentINE`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentINE` FOREIGN KEY (`idDocumentINE`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = INE',
ENGINE=INNODB;

/* SUBTABLA COMPROBANTE DE DOMICILIO */
CREATE TABLE comprobanteDomicilio (
	idDocumentDomic VARCHAR(8) PRIMARY KEY NOT NULL,
	UNIQUE INDEX `idDocumentDomic` (`idDocumentDomic`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentDomic` FOREIGN KEY (`idDocumentDomic`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = DOM',
ENGINE=INNODB;

/* SUBTABLA REGISTRO FEDERAL DEL CONTRIBUYENTE */
CREATE TABLE regFedCont (
	idDocumentRFC VARCHAR(8) PRIMARY KEY NOT NULL,
	documentRFC VARCHAR(13) NOT NULL,
	UNIQUE INDEX `idDocumentRFC` (`idDocumentRFC`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentRFC` FOREIGN KEY (`idDocumentRFC`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = RFC',
ENGINE=INNODB;

/* SUBTABLA CARTA DE ACEPTACION */
CREATE TABLE cartaAceptacion (
	idDocumentAcept VARCHAR(8) PRIMARY KEY NOT NULL,
	matriculaAcept VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentAcept` (`idDocumentAcept`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentAcept` FOREIGN KEY (`idDocumentAcept`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
)COMMENT 'ABREVIACION = CAC',
ENGINE=INNODB;

/* SUBTABLA LISTADO DE ACTIVIDADES */
CREATE TABLE listaActividades (
	idDocumentAct VARCHAR(8) PRIMARY KEY NOT NULL,
	listAct VARCHAR(128) NOT NULL COMMENT 'Introducir las actividades a realizar en un maximo de 128 caracteres',
	UNIQUE INDEX `idDocumentAct` (`idDocumentAct`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentAct` FOREIGN KEY (`idDocumentAct`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = LAC',
ENGINE=INNODB;

/* SUBTABLA HONORARIOS */
CREATE TABLE honorarios (
	idDocumentHon VARCHAR(8) PRIMARY KEY NOT NULL,
	monto DECIMAL(6,2) NULL COMMENT 'Cantidad de dinero a recibir',
	motivo VARCHAR(24) NULL COMMENT 'Motivo de los honorarios',
	matriculaHon VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentHon` (`idDocumentHon`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentHon` FOREIGN KEY (`idDocumentHon`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = HON',
ENGINE=INNODB;

/* SUBTABLA REPORTE DE ALUMNOS EN SERVICIO SOCIAL */
CREATE TABLE reportAlumnos (
	idDocumentReportAlumn VARCHAR(8) PRIMARY KEY NOT NULL,
	documentMotivoAlumn VARCHAR(24) NOT NULL COMMENT 'Motivo de la realizacion del reporte',
	UNIQUE INDEX `idDocumentReportAlumn` (`idDocumentReportAlumn`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentReportAlumn` FOREIGN KEY (`idDocumentReportAlumn`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = RAL',
ENGINE=INNODB;

/* SUBTABLA CARTA DE BAJA DE ALUMNO DE SERVICIO SOCIAL */
CREATE TABLE cartaBaja (
	idDocumentBajaAlumn VARCHAR(8) PRIMARY KEY NOT NULL,
	matriculaBaja VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentBajaAlumn` (`idDocumentBajaAlumn`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentBajaAlumn` FOREIGN KEY (`idDocumentBajaAlumn`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CBA',
ENGINE=INNODB;

/* SUBTABLA CARTA DE LIBERACION */
CREATE TABLE cartaLiberacion (
	idDocumentLib VARCHAR(8) PRIMARY KEY NOT NULL,
	matriculaLib VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentLib` (`idDocumentLib`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentLib` FOREIGN KEY (`idDocumentLib`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = CLI',
ENGINE=INNODB;

/* SUBTABLA REPORTE DE DEPENDENCIAS */
CREATE TABLE reportDependencias (
	idDocumentReportDep VARCHAR(8) PRIMARY KEY NOT NULL,
	documentMotivoDep VARCHAR(24) NOT NULL COMMENT 'Motivo de la realizacion del reporte',
	UNIQUE INDEX `idDocumentReportDep` (`idDocumentReportDep`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentReportDep` FOREIGN KEY (`idDocumentReportDep`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = RDE',
ENGINE=INNODB;

/* SUBTABLA CARTA DE FINALIZACION */
CREATE TABLE cartaFinalizacion (
	idDocumentFin VARCHAR(8) PRIMARY KEY NOT NULL,
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

/* ------------------------------------------------------- PROCEDIMIENTOS PARA LA BASE DE DATOS ------------------------------------------------------- */

/* PROCEDIMIENTO UTILIZADO PARA CONTROLAR EL ACCESO AL SISTEMA */
CREATE DEFINER=`root`@`localhost` PROCEDURE `loginAccess`(
	IN `emailL` VARCHAR(128),
	IN `passwordL` VARCHAR(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO UTILIZADO PARA CONTROLAR EL ACCESO AL SISTEMA'
SELECT COUNT(codUser) AS isExist, tipoUser, codUser
FROM usuario
WHERE (emailL LIKE email) AND (passwordL LIKE pass);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CONVENIO*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEcnv`(
	IN `idDocument` VARCHAR(8),
	IN `num` INT(4)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CONVENIO'
INSERT INTO convenio(`idDocumentConv`,`numConv`)
VALUES (idDocument,num);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE PRESENTACION*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEcpe`(
	IN `idDocument` VARCHAR(8),
	IN `matricula` VARCHAR(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE PRESENTACION'
INSERT INTO cartapresentacion(`idDocumentPresent`,`matriculaPresent`)
VALUES (idDocument,matricula);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CONSTANCIA*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEcon`(
	IN `idDocument` VARCHAR(8),
	IN `matricula` INT(4)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CONSTANCIA'
INSERT INTO constancia(`idDocumentConst`,`matriculaConst`)
VALUES (idDocument,matricula);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REPORTE DE ACTIVIDADES*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVErac`(
	IN `idDocument` VARCHAR(8)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REPORTE DE ACTIVIDADES'
INSERT INTO reporteactividades(`idDocumentReportAct`)
VALUES (idDocument);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - DECRETOS*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEdec`(
	IN `idDocument` VARCHAR(8)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - DECRETOS'
INSERT INTO decretos(`idDocumentDec`)
VALUES (idDocument);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - NOMBRAMIENTO DE REPRESENTANTE*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEnre`(
	IN `idDocument` VARCHAR(8)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - NOMBRAMIENTO DE REPRESENTANTE'
INSERT INTO nombramientorepresentante(`idDocumentNomRep`)
VALUES (idDocument);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - IDENTIFICACION DE REPRESENTANTE*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEine`(
	IN `idDocument` VARCHAR(8),
	IN `curp` VARCHAR(18)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - IDENTIFICACION DE REPRESENTANTE'
INSERT INTO identificacionrepresentante(`idDocumentINE`,`documentCURP`)
VALUES (idDocument,curp);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - COMPROBANTE DE DOMICILIO*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEdom`(
	IN `idDocument` VARCHAR(8)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - COMPROBANTE DE DOMICILIO'
INSERT INTO comprobantedomicilio(`idDocumentDomic`)
VALUES (idDocument);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REGISTRO FEDERAL DEL CONTRIBUYENTE*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVErfc`(
	IN `idDocument` VARCHAR(8),
	IN `rfc` VARCHAR(13)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REGISTRO FEDERAL DEL CONTRIBUYENTE'
INSERT INTO regfedcont(`idDocumentRFC`,`documentRFC`)
VALUES (idDocument,rfc);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE ACEPTACION*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEcac`(
	IN `idDocument` VARCHAR(8),
	IN `matricula` VARCHAR(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE ACEPTACION'
INSERT INTO cartaaceptacion(`idDocumentAcept`,`matriculaAcept`)
VALUES (idDocument,matricula);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - LISTA DE ACTIVIDADES*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVElac`(
	IN `idDocument` VARCHAR(8),
	IN `acts` VARCHAR(128)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - LISTA DE ACTIVIDADES'
INSERT INTO listaactividades(`idDocumentAct`,`listAct`)
VALUES (idDocument,acts);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - HONORARIOS*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEhon`(
	IN `idDocument` VARCHAR(8),
	IN `costo` DECIMAL(6,2),
	IN `asunto` VARCHAR(24),
	IN `matricula` VARCHAR(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - HONORARIOS'
INSERT INTO honorarios(`idDocumentHon`,`monto`,`motivo`,`matriculaHon`)
VALUES (idDocument,costo,asunto,matricula);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REPORTE DE ALUMNOS*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEral`(
	IN `idDocument` VARCHAR(8),
	IN `motivo` VARCHAR(24)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REPORTE DE ALUMNOS'
INSERT INTO reportalumnos(`idDocumentReportAlumn`,`documentMotivoAlumn`)
VALUES (idDocument,motivo);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE BAJA*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEcba`(
	IN `idDocument` VARCHAR(8),
	IN `matricula` VARCHAR(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE BAJA'
INSERT INTO cartabaja(`idDocumentBajaAlumn`,`matriculaBaja`)
VALUES (idDocument,matricula);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE LIBERACION*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEcli`(
	IN `idDocument` VARCHAR(8),
	IN `matricula` VARCHAR(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE LIBERACION'
INSERT INTO cartaliberacion(`idDocumentLib`,`matriculaLib`)
VALUES (idDocument,matricula);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REPORTE DE DEPENDENCIAS*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVErde`(
	IN `idDocument` VARCHAR(8),
	IN `motivo` VARCHAR(24)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REPORTE DE DEPENDENCIAS'
INSERT INTO reportdependencias(`idDocumentReportDep`,`documentMotivoDep`)
VALUES (idDocument,motivo);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE FINALIZACION*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEcfi`(
	IN `idDocument` VARCHAR(8),
	IN `matricula` VARCHAR(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE FINALIZACION'
INSERT INTO cartafinalizacion(`idDocumentFin`,`matriculaFin`)
VALUES (idDocument,matricula);

/* PROCEDIMIENTO PARA LA CARGA DE ARCHIVOS */
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEdocuments`(
	IN `documentS` LONGBLOB,
	IN `tipoDocumentS` VARCHAR(3)
)
COMMENT 'PROCEDIMIENTO PARA LA CREACION DEL DOCUMENTO EN LA BASE DE DATOS'
BEGIN
	-- SE OBTIENE EL ULTIMO VALOR DEL ID SEGUN EL TIPO DE DOCUMENTO
	SELECT @lastValue:= RIGHT(CAST((idDocument) AS VARCHAR(8)),3) INTO @lastValue
	FROM documento
	WHERE (idDocument LIKE CONCAT('%',tipoDocumentS,'%'))
	ORDER BY idDocument DESC
	LIMIT 1;
	
	-- SE INCREMENTA EL VALOR ANTERIOR EN 1
	SELECT @digits:= LENGTH(@lastValue + 1) INTO @digits;
	
	-- SE OBTIENEN LOS 2 ULTIMOS DIGITOS DEL AÑO ACTUAL
	SELECT @numberYear:= RIGHT(CAST(YEAR(DATE(NOW())) AS VARCHAR(4)),2) INTO @numberYear;
	
	-- SE GENERA EL ID DEPENDIENDO DE LA CANTIDAD DE DIGITOS CON EL QUE CUENTA EL DIGITO
	SELECT @id:= CONCAT(@numberYear,tipoDocumentS,
	(CASE @digits
		WHEN 1 THEN CONCAT('00',(@lastValue + 1))
		WHEN 2 THEN CONCAT('0',(@lastValue + 1))
		WHEN 3 THEN (@lastValue + 1)
		ELSE NULL
	END)) INTO @id;
	
	-- SE INTRODUCEN LOS VALORES DENTRO DE LA TABLA
	INSERT INTO documento(`idDocument`,`fechaEntrega`,`document`,`tipoDocument`) 
	VALUES (@id,DATE(NOW()),documentS,tipoDocumentS);
END //
DELIMITER ;

/* PROCEDIMIENTO PARA OBTENER LOS VALORES DE LOS DOCUMENTOS EN GENERAL */
CREATE DEFINER=`root`@`localhost` PROCEDURE `LOADdocuments`(
	IN `tipoDocumentL` VARCHAR(3)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA OBTENER LOS VALORES DE LOS DOCUMENTOS EN GENERAL'
	SELECT *
	FROM documento
	WHERE (tipoDocument LIKE tipoDocumentL);





