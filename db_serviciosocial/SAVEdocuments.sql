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

-- Volcando estructura para procedimiento db_serviciosocial.SAVEdocuments
DELIMITER //
CREATE PROCEDURE `SAVEdocuments`(
	IN `documentS` LONGBLOB,
	IN `tipoDocumentS` VARCHAR(3)
)
    COMMENT 'PROCEDIMIENTO PARA LA CREACION DEL DOCUMENTO EN LA BASE DE DATOS'
BEGIN
	
	-- SE OBTIENEN LOS 2 ULTIMOS DIGITOS DEL AÑO ACTUAL
	SELECT @numberYear:= RIGHT(CAST(YEAR(DATE(NOW())) AS VARCHAR(4)),2) INTO @numberYear;
	
	-- SE OBTIENE EL ULTIMO VALOR DEL ID SEGUN EL TIPO DE DOCUMENTO
	SET @lastValue := '';
	SELECT
	(CASE
		WHEN idDocument IS NULL THEN '000'
		WHEN LEFT(CAST((idDocument) AS VARCHAR(8)), 2) = @numberYear 
			THEN
				(CASE
					WHEN RIGHT(CAST((idDocument) AS VARCHAR(8)), 3) != '000' 
						THEN RIGHT(CAST((idDocument) AS VARCHAR(8)), 3)
            		ELSE '000'
         		END)
        ELSE '000'
    END) INTO @lastValue
	FROM documento 
	WHERE idDocument LIKE CONCAT('__',tipoDocumentS, '___')
	ORDER BY idDocument DESC 
	LIMIT 1;
	
	-- SE INCREMENTA EL VALOR ANTERIOR EN 1
	SELECT @digits:= LENGTH(@lastValue + 1) INTO @digits;

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
	
	-- DEVUELVE EL ID GENERADO PARA SER USADO EN OTRO PROCEDURE
	SELECT @id AS id;
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
