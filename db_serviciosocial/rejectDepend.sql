-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.11.2-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para procedimiento db_serviciosocial.rejectDepend
DELIMITER //
CREATE PROCEDURE `rejectDepend`(
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
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
