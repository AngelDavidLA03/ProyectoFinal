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

-- Volcando estructura para procedimiento db_serviciosocial.SAVEcli
DELIMITER //
CREATE PROCEDURE `SAVEcli`(
	IN `idDocument` VARCHAR(8),
	IN `mat` VARCHAR(10)
)
    COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CARTA DE LIBERACION'
BEGIN
	-- SE INSERTAN LOS VALORES EN LA TABLA DE LA CARTA DE LIBERACION
	INSERT INTO cartaliberacion(`idDocumentLib`,`matriculaLib`)
	VALUES (idDocument,mat);
	
	-- SE CONSIGUE EL CODIGO DE USUARIO DEL ALUMNO
	SELECT @cod := alumno.codUserAlumn INTO @cod
	FROM alumno INNER JOIN realizar ON alumno.codUserAlumn = realizar.codUserAlumn
	WHERE alumno.matricula = mat;
	
	-- SE ACTUALIZA EL ESTADO DEL ALUMNO
	UPDATE realizar
	SET estado = 'FINALIZADO'
	WHERE codUserAlumn = @cod;
	
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
