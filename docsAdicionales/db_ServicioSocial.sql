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
	pass VARCHAR(16) NOT NULL,
	tipoUser VARCHAR(11) NOT NULL COMMENT 'Solo permitir valores como Dependencia, Alumno y Coordinador'
	) ENGINE=INNODB;
	
INSERT INTO usuario (`codUser`, `email`, `pass`, `tipoUser`) VALUES ('2366ALU0000', 'alumno@tecnm.mx', '1234', 'ALUMNO');
INSERT INTO usuario (`codUser`, `email`, `pass`, `tipoUser`) VALUES ('2366COR0000', 'coord@tecnm.mx', '567', 'COORDINADOR');
INSERT INTO usuario (`codUser`, `email`, `pass`, `tipoUser`) VALUES ('2366DEP0000', 'depend@tecnm.mx', '890', 'DEPENDENCIA');


/* TABLA DEPENDENCIA */
CREATE TABLE dependencia(
	codUserDepend VARCHAR(11) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, identificador de la institucion, tipo de usuario simplificado (DEP), y numeros siguiendo el orden del 0001 hasta el 9999',
	idDepend VARCHAR(7) NULL COMMENT 'Generar automaticamente con el año de generacion del documento de convenio, el separador "-" y el numero de convenio arrojado por el documento de convenio',
	nomDepend VARCHAR(54) NOT NULL COMMENT 'Introducir el nombre de la dependencia (abreviado o completo dependiendo el caso) en un maximo de 32 caracteres',
	RFC VARCHAR(13) NOT NULL,
	califDepend VARCHAR(9) NULL COMMENT 'Solo permitir valores como Terrible, Mala, Regular, Buena y Excelente',
	numTrabajadores INT(2) NOT NULL,
	enfoqueDepend VARCHAR(54) NOT NULL COMMENT 'Introducir a que se dedica la empresa en un maximo de 24 caracteres',
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
	idDirector VARCHAR(10) PRIMARY KEY NOT NULL COMMENT 'Formado por año de registro, "-" de separador, iniciales de nombre(s) y apellidos, "-" de separador, e identificador del 00 al 99',
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
	fechaNac DATE NOT NULL,
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
	idServicio VARCHAR(16) PRIMARY KEY NOT NULL COMMENT 'Generar automaticamente con el año de creacion, las iniciales del nombre(s) y apellidos del director general, dos caracteres incrementales del 01 al 99, un separador de -, y el periodo de solicitud (ENE-JUN, y JUL-DIC)',
	nomServic VARCHAR(54) NOT NULL COMMENT 'Nombre descriptivo propio del servicio social',
	actividades VARCHAR(256) NOT NULL COMMENT 'Introducir las actividades que se realizaran durante el servicio social en un maximo de 256 caracteres',
	/* HORARIO */
	horaInicio TIME NOT NULL,
	diasPorSem INT(1) NOT NULL COMMENT 'Cantidad de dias entre semana los que se tendran que asistir',
	horaFin TIME NOT NULL,
	/* ------- */
	fechaInicio DATE NOT NULL,
	fechaFin DATE NOT NULL,
	fechaCreacion DATE NOT NULL
	
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
	codUserDependConv VARCHAR(11),
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
	matriculaReportAct VARCHAR(10) NOT NULL,
	UNIQUE INDEX `idDocumentReportAct` (`idDocumentReportAct`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentReportAct` FOREIGN KEY (`idDocumentReportAct`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = RAC',
ENGINE=INNODB;

/* SUBTABLA DECRETOS */
CREATE TABLE decretos (
	idDocumentDec VARCHAR(8) PRIMARY KEY NOT NULL,
	idDependDec VARCHAR(7) NOT NULL,
	UNIQUE INDEX `idDocumentDec` (`idDocumentDec`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentDec` FOREIGN KEY (`idDocumentDec`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = DEC',
ENGINE=INNODB;

/* SUBTABLA NOMBRAMIENTO DEL REPRESENTANTE */
CREATE TABLE nombramientoRepresentante (
	idDocumentNomRep VARCHAR(8) PRIMARY KEY NOT NULL,
	idDependNomRep VARCHAR(7) NOT NULL,
	UNIQUE INDEX `idDocumentNomRep` (`idDocumentNomRep`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentNomRep` FOREIGN KEY (`idDocumentNomRep`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = NRE',
ENGINE=INNODB;

/* SUBTABLA IDENTIFICACION OFICIAL DEL REPRESENTANTE */
CREATE TABLE identificacionRepresentante (
	idDocumentINE VARCHAR(8) PRIMARY KEY NOT NULL,
	documentCURP VARCHAR(18) NOT NULL,
	idDependCURP VARCHAR(7) NOT NULL,
	UNIQUE INDEX `idDocumentINE` (`idDocumentINE`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentINE` FOREIGN KEY (`idDocumentINE`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = INE',
ENGINE=INNODB;

/* SUBTABLA COMPROBANTE DE DOMICILIO */
CREATE TABLE comprobanteDomicilio (
	idDocumentDomic VARCHAR(8) PRIMARY KEY NOT NULL,
	idDependDomic VARCHAR(7) NOT NULL,
	UNIQUE INDEX `idDocumentDomic` (`idDocumentDomic`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentDomic` FOREIGN KEY (`idDocumentDomic`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = DOM',
ENGINE=INNODB;

/* SUBTABLA REGISTRO FEDERAL DEL CONTRIBUYENTE */
CREATE TABLE regFedCont (
	idDocumentRFC VARCHAR(8) PRIMARY KEY NOT NULL,
	documentRFC VARCHAR(13) NOT NULL,
	idDependRFC VARCHAR(7) NOT NULL,
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
	idServicioAct VARCHAR(16) NOT NULL,
	UNIQUE INDEX `idDocumentAct` (`idDocumentAct`) USING BTREE,
	CONSTRAINT `ESPEC_idDocumentAct` FOREIGN KEY (`idDocumentAct`) REFERENCES `db_servicioSocial`.`documento` (`idDocument`) ON UPDATE CASCADE ON DELETE CASCADE
) COMMENT 'ABREVIACION = LAC',
ENGINE=INNODB;

/* SUBTABLA HONORARIOS */
CREATE TABLE honorarios (
	idDocumentHon VARCHAR(8) PRIMARY KEY NOT NULL,
	monto DECIMAL(6,2) NULL COMMENT 'Cantidad de dinero a recibir',
	motivo VARCHAR(24) NULL COMMENT 'Motivo de los honorarios',
	idServicioHon VARCHAR(16) NOT NULL,
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
	codUserDepend VARCHAR(11) NOT NULL UNIQUE,
	idDirector VARCHAR(10) NOT NULL UNIQUE
) ENGINE=INNODB;

ALTER TABLE Administrar ADD CONSTRAINT FK_codUserDepend_Admin FOREIGN KEY (codUserDepend) REFERENCES dependencia(codUserDepend) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Administrar ADD CONSTRAINT FK_idDirector_Admin FOREIGN KEY (idDirector) REFERENCES directorGeneral(idDirector) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `dependencia` (`codUserDepend`, `idDepend`, `nomDepend`, `RFC`, `califDepend`, `numTrabajadores`, `enfoqueDepend`, `numTelfDepend`, `calleDepend`, `numExtDepend`, `numIntDepend`, `coloniaDepend`, `cpDepend`, `ciudadDepend`, `efDepend`, `logo`, `tipoDepend`) VALUES ('2366DEP0000', '00000', 'a', 'a', 'a', 1, 'a', '1', 'a', 1, 1, 'a', 1, 'a', 'a', NULL, 's');
INSERT INTO `directorgeneral` (`idDirector`, `nomDirector`, `apDirector`, `amDirector`, `edadDirector`, `curpDirector`, `emailDirector`, `numTelfDirector`) VALUES ('XXXX23', 'Xa Xa', 'Xasd', 'Xafs', 1, 'x', 'x', '1');
INSERT INTO `administrar` (`codUserDepend`, `idDirector`) VALUES ('2366DEP0000', 'XXXX23');

/* RELACION SOLICITAR (DEPENDENCIA 1 - SERVICIO SOCIAL M) */
CREATE TABLE Solicitar (
	codUserDepend VARCHAR(11) NOT NULL,
	idServicio VARCHAR(16) NOT NULL UNIQUE
) ENGINE=INNODB;

ALTER TABLE Solicitar ADD CONSTRAINT FK_codUserDepend_Solic FOREIGN KEY (codUserDepend) REFERENCES dependencia(codUserDepend) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Solicitar ADD CONSTRAINT FK_idServicio_Solic FOREIGN KEY (idServicio) REFERENCES servicioSocial(idServicio) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION TENER (DEPENDENCIA M - ESTADO DE VERIFICACION M) */
CREATE TABLE Tener(
	codUserDepend VARCHAR(11) PRIMARY KEY NOT NULL,
	idEstado INT(1) NOT NULL,
	fechaUpdate DATE NOT NULL,
	porcenActual INT(2) NULL COMMENT 'Introducir el porcentaje de revision actual en un rango de 0 - 99 (Solo cuando el idEstado sea de 2)',
	razonRech VARCHAR(64) NULL COMMENT 'Introducir la razon por la cual se rechazo en un maximo de 64 caracteres (Solo cuando el idEstado sea de 4)'
) ENGINE=INNODB;

ALTER TABLE Tener ADD CONSTRAINT FK_codUserDepend_Tener FOREIGN KEY (codUserDepend) REFERENCES dependencia(codUserDepend) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Tener ADD CONSTRAINT FK_idEstado_Tener FOREIGN KEY (idEstado) REFERENCES estadoVerif(idEstado) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION POSEER (DEPENDENCIA 1 - AREA M) */
CREATE TABLE Poseer (
	codUserDepend VARCHAR(11) NOT NULL,
	idArea VARCHAR(7) NOT NULL UNIQUE
) ENGINE=INNODB;

ALTER TABLE Poseer ADD CONSTRAINT FK_codUserDepend_Poseer FOREIGN KEY (codUserDepend) REFERENCES dependencia(codUserDepend) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Poseer ADD CONSTRAINT FK_idArea_Poseer FOREIGN KEY (idArea) REFERENCES area(idArea) ON DELETE CASCADE ON UPDATE CASCADE;

/* RELACION REALIZAR (ALUMNO M - SERVICIO SOCIAL 1) */
CREATE TABLE Realizar (
	codUserAlumn VARCHAR(11) NOT NULL UNIQUE,
	idServicio VARCHAR(16) NOT NULL,
	estado VARCHAR(9) NULL COMMENT 'Solo permitir valores como ACEPTADO o RECHAZADO'
) ENGINE=INNODB;

ALTER TABLE Realizar ADD CONSTRAINT FK_codUserAlumn_Real FOREIGN KEY (codUserAlumn) REFERENCES alumno(codUserAlumn) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE Realizar ADD CONSTRAINT FK_idServicio_Real FOREIGN KEY (idServicio) REFERENCES servicioSocial(idServicio) ON DELETE CASCADE ON UPDATE CASCADE;

/* ------------------------------------------------------- PROCEDIMIENTOS PARA LA BASE DE DATOS ------------------------------------------------------- */

/* PROCEDIMIENTO UTILIZADO PARA CONTROLAR EL ACCESO AL SISTEMA */
CREATE DEFINER=`root`@`localhost` PROCEDURE `loginAccess`(
	IN `emailL` VARCHAR(128),
	IN `passwordL` VARCHAR(16)
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
	IN `num` INT(4),
	IN `codUser` VARCHAR(11)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CONVENIO'
INSERT INTO convenio(`idDocumentConv`,`numConv`,`codUserDependConv`)
VALUES (idDocument,num,codUser);

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
	IN `idDocument` VARCHAR(8),
	IN `matricula` INT(4)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REPORTE DE ACTIVIDADES'
INSERT INTO reporteactividades(`idDocumentReportAct`,`matriculaReportAct`)
VALUES (idDocument,matricula);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - DECRETOS*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEdec`(
	IN `idDocument` VARCHAR(8),
	IN `idDepend` VARCHAR(7)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - DECRETOS'
INSERT INTO decretos(`idDocumentDec`,`idDependDec`)
VALUES (idDocument,idDepend);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - NOMBRAMIENTO DE REPRESENTANTE*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEnre`(
	IN `idDocument` VARCHAR(8),
	IN `idDepend` VARCHAR(7)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - NOMBRAMIENTO DE REPRESENTANTE'
INSERT INTO nombramientorepresentante(`idDocumentNomRep`,`idDependNomRep`)
VALUES (idDocument,idDepend);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - IDENTIFICACION DE REPRESENTANTE*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEine`(
	IN `idDocument` VARCHAR(8),
	IN `curp` VARCHAR(18),
	IN `idDepend` VARCHAR(7)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - IDENTIFICACION DE REPRESENTANTE'
INSERT INTO identificacionrepresentante(`idDocumentINE`,`documentCURP`,`idDependCURP`)
VALUES (idDocument,curp,idDepend);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - COMPROBANTE DE DOMICILIO*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEdom`(
	IN `idDocument` VARCHAR(8),
	IN `idDepend` VARCHAR(7)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - COMPROBANTE DE DOMICILIO'
INSERT INTO comprobantedomicilio(`idDocumentDomic`,`idDependDomic`)
VALUES (idDocument,idDepend);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REGISTRO FEDERAL DEL CONTRIBUYENTE*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVErfc`(
	IN `idDocument` VARCHAR(8),
	IN `rfc` VARCHAR(13),
	IN `idDepend` VARCHAR(7)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - REGISTRO FEDERAL DEL CONTRIBUYENTE'
INSERT INTO regfedcont(`idDocumentRFC`,`documentRFC`,`idDependRFC`)
VALUES (idDocument,rfc,idDepend);

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
	IN `acts` VARCHAR(128),
	IN `idServicio` VARCHAR(16)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - LISTA DE ACTIVIDADES'
INSERT INTO listaactividades(`idDocumentAct`,`listAct`,`idServicioAct`)
VALUES (idDocument,acts,idServicio);

/* PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - HONORARIOS*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEhon`(
	IN `idDocument` VARCHAR(8),
	IN `costo` DECIMAL(6,2),
	IN `asunto` VARCHAR(24),
	IN `idServicio` VARCHAR(16)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - HONORARIOS'
INSERT INTO honorarios(`idDocumentHon`,`monto`,`motivo`,`idServicioHon`)
VALUES (idDocument,costo,asunto,idServicio);

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
	SELECT @lastValue:= 
	(CASE 
        WHEN MAX(documento.idDocumento) IS NOT NULL 
        THEN RIGHT(CAST((idDocument) AS VARCHAR(8)),3) 
        ELSE '0000' 
   END)
	INTO @lastValue
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




/* PROCEDIMIENTO PARA OBTENER LAS SOLICITUDES DE SERVICIO SOCIAL HECHAS POR LA EMPRESA */
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETss`(
	IN `codUser` VARCHAR(11)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
	SELECT solicitar.idServicio
	FROM solicitar INNER JOIN serviciosocial ON solicitar.idServicio = serviciosocial.idServicio
	WHERE solicitar.codUserDepend LIKE codUser
	ORDER BY serviciosocial.fechaCreacion DESC;

/* PROCEDIMIENTO PARA OBTENER LOS DETALLES DE LA SOLICITUD DE SERVICIO SOCIAL */
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETdetailsSS`(
	IN `idServicio` VARCHAR(16)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
	SELECT nomServic,actividades,diasPorSem,horaInicio,horaFin,fechaInicio,fechaFin
	FROM serviciosocial
	WHERE serviciosocial.idServicio LIKE idServicio;

/* PROCEDIMIENTO PARA OBTENER LOS ALUMNOS QUE SOLICITARON EL SERVICIO SOCIAL */
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETalumnosREQss`(
	IN `idServicio` VARCHAR(16)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
	SELECT alumno.nomAlumn, alumno.codUserAlumn, alumno.matricula
	FROM alumno INNER JOIN realizar ON realizar.codUserAlumn = alumno.codUserAlumn
					INNER JOIN serviciosocial ON realizar.idServicio = serviciosocial.idServicio
	WHERE ((realizar.idServicio LIKE idServicio) AND (realizar.estado IS NULL))
	ORDER BY alumno.matricula DESC;
	
/* PROCEDIMIENTO PARA OBTENER LOS DETALLES DE LOS ALUMNOS QUE SOLICITARON EL SERVICIO SOCIAL */
CREATE DEFINER=`root`@`localhost` PROCEDURE `GETalumnosDETAILSss`(
	IN `idServicio` VARCHAR(16),
	IN `codUser` VARCHAR(11)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
	SELECT alumno.foto, CONCAT(alumno.nomAlumn,' ',alumno.apAlumn,' ',alumno.amAlumn) AS nombre, alumno.edadAlumn, alumno.generoAlumn, alumno.semestre, alumno.especialidad, alumno.creditosAcum, alumno.localidadAlum
	FROM alumno INNER JOIN realizar ON realizar.codUserAlumn = alumno.codUserAlumn
					INNER JOIN serviciosocial ON realizar.idServicio = serviciosocial.idServicio
	WHERE ((realizar.idServicio = idServicio) AND (realizar.codUserAlumn = codUser));
	
/* PROCEDIMIENTO PARA DETERMINAR SI SE ACEPTA AL ALUMNO EN EL SERVICIO SOCIAL O NO */
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SETalumnoState`(
	IN `state` VARCHAR(9),
	IN `idServicio` VARCHAR(16),
	IN `codUser` VARCHAR(11)
)
BEGIN
	
	-- SE MODIFICA EL ESTADO DEL ALUMNO QUE SOLICITO EL SERVICIO SOCIAL
	UPDATE realizar
	SET estado = state
	WHERE ((realizar.idServicio = idServicio) AND (realizar.codUserAlumn = codUser));
	
	-- SE ANALIZA Y SE DETERMINA LA ACCION EN CASO DE QUE EL VALOR DEL ESTADO A INSERTAR SEA 'RECHAZADO'
	CASE state
	WHEN 'RECHAZADO' THEN 
		DELETE FROM realizar 
		WHERE ((realizar.idServicio = idServicio) AND (realizar.codUserAlumn = codUser));
	ELSE 
		SELECT '';
   END CASE;
END //
DELIMITER ;

/* PROCEDIMIENTO PARA LA CREACION DE UNA NUEVA SOLICITUD DE SERVICIO SOCIAL */
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SAVEss`(
	IN `codUser` VARCHAR(11),
	IN `nom` VARCHAR(54),
	IN `acts` VARCHAR(256),
	IN `hi` TIME,
	IN `hf` TIME,
	IN `dias` INT(1),
	IN `fi` DATE,
	IN `ff` DATE
)
COMMENT 'PROCEDIMIENTO PARA LA CREACION DEL REGISTRO DE SERVICIO SOCIAL Y LA RELACION EN LA BASE DE DATOS'
BEGIN	
	-- SE OBTIENE EL ULTIMO VALOR DEL ID SEGUN EL ID ANTERIOR
	SELECT @lastValue:=
    (CASE 
        WHEN MAX(serviciosocial.idServicio) IS NOT NULL 
        THEN LEFT(CAST(RIGHT(CAST(MAX(serviciosocial.idServicio) AS VARCHAR(16)), 10) AS VARCHAR(10)), 2) 
        ELSE '00' 
    END) INTO @lastValue
	FROM serviciosocial INNER JOIN solicitar ON serviciosocial.idServicio = solicitar.idServicio
   						  INNER JOIN dependencia ON solicitar.codUserDepend = dependencia.codUserDepend
	WHERE dependencia.codUserDepend = codUser
	ORDER BY serviciosocial.idServicio DESC
	LIMIT 1;

	
	-- SE INCREMENTA EL VALOR ANTERIOR EN 1
	SELECT @digits:= LENGTH(@lastValue + 1) INTO @digits;
	
	-- SE OBTIENEN LOS 2 ULTIMOS DIGITOS DEL AÑO ACTUAL
	SELECT @numberYear:= RIGHT(CAST(YEAR(DATE(NOW())) AS VARCHAR(4)),2) INTO @numberYear;
	
	-- SE OBTIENEN LAS INICIALES DE LOS NOMBRES
	SELECT @initials:= CONCAT_WS('', 
   CONCAT(LEFT(nomDirector, 1), ''),
   CONCAT(LEFT(SUBSTRING_INDEX(SUBSTRING_INDEX(nomDirector, ' ', 2),' ', -1),1), ''),
   CONCAT(LEFT(apDirector, 1), ''),
   CONCAT(LEFT(amDirector, 1), '')
	) INTO @initials
	FROM directorgeneral INNER JOIN administrar ON administrar.idDirector = directorgeneral.idDirector
								INNER JOIN dependencia ON administrar.codUserDepend = dependencia.codUserDepend
	WHERE dependencia.codUserDepend = codUser;
	
	-- SE GENERA EL NUEVO NUMERO GENERADO
	SELECT @newDigits:= 
	(CASE @digits
		WHEN 1 THEN CONCAT('0',(@lastValue + 1))
		WHEN 2 THEN (@lastValue + 1)
		ELSE NULL
	END) INTO @newDigits;
	
	-- SE CAMBIA EL IDIOMA PARA TENER LOS NOMBRES DE LOS MESES EN ESPAÑOL
	SET lc_time_names = 'es_ES';
	
	-- SE GENERA EL NUEVO ID
	SELECT @id:= CONCAT(@numberYear,@initials,@newDigits,'-',UPPER(LEFT(CAST(MONTHNAME(fi) AS VARCHAR(12)),3)),'-',UPPER(LEFT(CAST(MONTHNAME(ff) AS VARCHAR(12)),3))) INTO @id;
	
	-- SE INTRODUCEN LOS VALORES DENTRO DE LA TABLA
	INSERT INTO serviciosocial(`idServicio`,`nomServic`,`actividades`,`horaInicio`,`diasPorSem`,`horaFin`,`fechaInicio`,`fechaFin`,`fechaCreacion`) 
	VALUES (@id,nom,acts,hi,dias,hf,fi,ff,DATE(NOW()));
	
	-- SE INTRODUCEN LOS VALORES DENTRO DE LA RELACION
	INSERT INTO solicitar(codUserDepend,idServicio)
	VALUES (codUser,@id);
	
END //
DELIMITER ;

/* PROCEDIMIENTO PARA LA INSERCION TEMPORAL DEL REGISTRO DE DEPENDENCIA EN LA BASE DE DATOS */
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDependTemp`(
	IN `codUser` VARCHAR(11),
	IN	`nom` VARCHAR(32),
	IN	`regfed` VARCHAR(13),
	IN	`trabajadores` INT(2),
	IN	`enfoque` VARCHAR(24),
	IN	`numTelf` VARCHAR(18),
	IN	`calle` VARCHAR(21),
	IN	`numExt` INT(3),
	IN	`numInt` INT(3),
	IN	`colonia` VARCHAR(15),
	IN	`cp` INT(5),
	IN	`ciudad` VARCHAR(20),
	IN	`ef` VARCHAR(20),
	IN	`imagen` LONGBLOB,
	IN	`tipo` VARCHAR(7)
)
COMMENT 'PROCEDIMIENTO PARA LA INSERCION TEMPORAL DEL REGISTRO DE DEPENDENCIA EN LA BASE DE DATOS'
	INSERT INTO dependencia(codUserDepend,nomDepend,RFC,numTrabajadores,enfoqueDepend,numTelfDepend,calleDepend,numExtDepend,numIntDepend,coloniaDepend,cpDepend,ciudadDepend,efDepend,logo,tipoDepend)
	VALUES(codUser,nom,regfed,trabajadores,enfoque,numTelf,calle,numExt,numInt,colonia,cp,ciudad,ef,imagen,tipo);

/* PROCEDIMIENTO PARA LA INSERCION DEL REGISTRO DE DIRECTOR GENERAL EN LA BASE DE DATOS */
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDirectorGen`(
	IN `codUser` VARCHAR(11),
 	IN `nom` VARCHAR(48),
	IN	`ap` VARCHAR(24),
	IN	`am` VARCHAR(24),
	IN	`edad` INT(2),
	IN	`curp` VARCHAR(18),
	IN	`email` VARCHAR(128),
	IN	`telf` VARCHAR(18)
)
COMMENT 'PROCEDIMIENTO PARA LA INSERCION DEL REGISTRO DE DIRECTOR GENERAL EN LA BASE DE DATOS | PARA FUNCIONAR, HABER USADO ANTES EL PROCEDURE DE insertDependTemp'
BEGIN
	-- SE OBTIENEN LOS 2 ULTIMOS DIGITOS DEL AÑO ACTUAL
	SELECT @numberYear:= RIGHT(CAST(YEAR(DATE(NOW())) AS VARCHAR(4)),2) INTO @numberYear;
	
	-- GENERACION DE LAS INICIALES DEL NOMBRE
	SELECT @initials:= CONCAT_WS('', 
   CONCAT(LEFT(nom, 1), ''),
   CONCAT(LEFT(SUBSTRING_INDEX(SUBSTRING_INDEX(nom, ' ', 2),' ', -1),1), ''),
   CONCAT(LEFT(ap, 1), ''),
   CONCAT(LEFT(am, 1), '')
	) INTO @initials;
	
	-- SE OBTIENE EL ULTIMO VALOR DEL ID SEGUN EL ID ANTERIOR
	SELECT @lastValue:=
    (CASE 
        WHEN MAX(directorgeneral.idDirector) IS NOT NULL 
        THEN RIGHT(CAST(MAX(directorgeneral.idDirector) AS VARCHAR(10)), 2)
        ELSE '00' 
    END) INTO @lastValue
	FROM directorgeneral
	WHERE directorgeneral.idDirector LIKE CONCAT(@numberYear,'-',UPPER(@initials),'-','%')
	ORDER BY directorgeneral.idDirector DESC
	LIMIT 1;

	-- SE INCREMENTA EL VALOR ANTERIOR EN 1
	SELECT @digits:= LENGTH(@lastValue + 1) INTO @digits;
						
	-- SE GENERA EL NUEVO NUMERO GENERADO
	SELECT @newDigits:= 
	(CASE @digits
		WHEN 1 THEN CONCAT('0',(@lastValue + 1))
		WHEN 2 THEN (@lastValue + 1)
		ELSE NULL
	END) INTO @newDigits;		
	
	-- SE GENERA EL NUEVO ID
	SELECT @id:= CONCAT(@numberYear,'-',UPPER(@initials),'-',@newDigits) INTO @id;
			
	-- INSERCION DEL REGISTRO DEL DIRECTOR GENERAL
	INSERT INTO `directorgeneral` (`idDirector`, `nomDirector`, `apDirector`, `amDirector`, `edadDirector`, `curpDirector`, `emailDirector`, `numTelfDirector`)
	VALUES(@id,nom,ap,am,edad,curp,email,telf);
	
	-- INSERCION DEL REGISTRO EN LA ADMINISTRACION DE LA DEPENDENCIA
	INSERT INTO administrar(codUserDepend,idDirector)
	VALUES(codUser,@id);
END //
DELIMITER ;

/* PROCEDIMIENTO PARA LA ACEPTACION DEL REGISTRO DE DEPENDENCIA EN LA BASE DE DATOS */
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `acceptDepend`(
	IN `codUser` VARCHAR(11),
	IN `codigoConv` INT(4)
)	
COMMENT 'PROCEDIMIENTO PARA LA ACEPTACION DEL REGISTRO DE DEPENDENCIA EN LA BASE DE DATOS'
BEGIN
	-- SE OBTIENEN LOS 2 ULTIMOS DIGITOS DEL AÑO DE CREACION DEL DOCUMENTO
	SELECT @numberYear:= RIGHT(CAST(YEAR(DATE(documento.fechaEntrega)) AS VARCHAR(4)),2) INTO @numberYear
	FROM documento INNER JOIN convenio ON documento.idDocument = convenio.idDocumentConv
	WHERE ((convenio.codUserDependConv = codUser) AND (convenio.numConv = codigoConv));
	
	-- SE CONSIGUE EL NUMERO DE CONVENIO
	SELECT @numero:= convenio.numConv INTO @numero
	FROM convenio
	WHERE ((codUserDependConv = codUser) AND (numConv = codigoConv));
	
	-- SE GENERA EL NUEVO ID DE LA DEPENDENCIA
	SELECT @newID:= CONCAT(@numberYear,'-',@numero) INTO @newID;
	
	-- SE ACTUALIZA EL REGISTRO DE LA DEPENDENCIA
	UPDATE dependencia
	SET dependencia.idDepend = @newID, dependencia.califDepend = 'REGULAR'
	WHERE dependencia.codUserDepend = codUser;
END //
DELIMITER ;

/* PROCEDIMIENTO PARA EL RECHAZO DEL REGISTRO DE DEPENDENCIA EN LA BASE DE DATOS */
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `rejectDepend`(
	IN `codUser` VARCHAR(11)
)	
COMMENT 'PROCEDIMIENTO PARA EL RECHAZO DEL REGISTRO DE DEPENDENCIA EN LA BASE DE DATOS'
BEGIN
	-- SE OBTIENE EL ID DEL DIRECTOR GENERAL
	SELECT @dirGen:= administrar.idDirector INTO @dirGen
	FROM administrar
	WHERE administrar.codUserDepend = codUser;

	-- SE ELIMINAN LOS REGISTROS DE LA PARTE DE ADMINISTRACION DE LA DEPENDENCIA
	DELETE FROM administrar
	WHERE ((administrar.codUserDepend = codUser) AND (administrar.idDirector = @dirGen));
	
	-- SE ELIMINAN LOS REGISTROS DE LA PARTE DEL DIRECTOR GENERAL
	DELETE FROM directorgeneral
	WHERE directorgeneral.idDirector = @dirGen;
	
	-- SE ELIMINAN LOS REGISTROS PROPIOS DE LA DEPENDENCIA
	DELETE FROM dependencia
	WHERE ((dependencia.codUserDepend = codUser) AND (dependencia.idDepend IS NULL));
END //
DELIMITER ;
	
/* PROCEDIMIENTO PARA CAMBIAR LA FOTO DE PERFIL DEL ALUMNO */
CREATE DEFINER=`root`@`localhost` PROCEDURE `changeFotoAlumno`(
 	IN `codUser` VARCHAR(11),
 	IN `image` LONGBLOB

)
COMMENT 'PROCEDIMIENTO PARA CAMBIAR LA FOTO DE PERFIL DEL ALUMNO'
	UPDATE alumno
	SET alumno.foto = image
	WHERE (alumno.codUserAlumn = codUser);

/* PROCEDIMIENTO UTILIZADO PARA COMPROBAR QUE EL CORREO ESTE REGISTRADO */
CREATE DEFINER=`root`@`localhost` PROCEDURE `searchAccess`(
	IN `emailL` VARCHAR(128)
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO UTILIZADO PARA COMPROBAR QUE EL CORREO ESTE REGISTRADO'
SELECT COUNT(codUser) AS isExist, codUser, email
FROM usuario
WHERE (emailL LIKE email);

/* PROCEDIMIENTO UTILIZADO PARA CAMBIAR CONTRASEÑA */
CREATE DEFINER=`root`@`localhost` PROCEDURE `changeAccess`(
	IN `codUser` VARCHAR(11),
	IN `emailL` VARCHAR(128),
	IN `newPass` VARCHAR(16)
	
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'PROCEDIMIENTO UTILIZADO PARA CAMBIAR CONTRASEÑA'
UPDATE usuario
SET usuario.pass = newPass
WHERE ((usuario.codUser = codUser) AND (usuario.email = emailL));




