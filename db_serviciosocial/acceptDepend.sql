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

-- Volcando estructura para procedimiento db_serviciosocial.acceptDepend
DELIMITER //
CREATE PROCEDURE `acceptDepend`(
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
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
