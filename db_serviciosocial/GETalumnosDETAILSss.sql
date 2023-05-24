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

-- Volcando estructura para procedimiento db_serviciosocial.GETalumnosDETAILSss
DELIMITER //
CREATE PROCEDURE `GETalumnosDETAILSss`(
	IN `idServicio` VARCHAR(16),
	IN `codUser` VARCHAR(11)
)
SELECT alumno.foto, CONCAT(alumno.nomAlumn,' ',alumno.apAlumn,' ',alumno.amAlumn) AS nombre, alumno.edadAlumn, alumno.generoAlumn, alumno.semestre, alumno.especialidad, alumno.creditosAcum, alumno.localidadAlum
	FROM alumno INNER JOIN realizar ON realizar.codUserAlumn = alumno.codUserAlumn
					INNER JOIN serviciosocial ON realizar.idServicio = serviciosocial.idServicio
	WHERE ((realizar.idServicio = idServicio) AND (realizar.codUserAlumn = codUser))//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
