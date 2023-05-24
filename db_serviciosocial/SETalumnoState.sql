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

-- Volcando estructura para procedimiento db_serviciosocial.SETalumnoState
DELIMITER //
CREATE PROCEDURE `SETalumnoState`(
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
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
