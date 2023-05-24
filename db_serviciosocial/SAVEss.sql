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

-- Volcando estructura para procedimiento db_serviciosocial.SAVEss
DELIMITER //
CREATE PROCEDURE `SAVEss`(
	IN `codUser` VARCHAR(11),
	IN `nom` VARCHAR(54),
	IN `obj` VARCHAR(108),
	IN `acts` VARCHAR(256),
	IN `details` VARCHAR(256),
	IN `caracts` VARCHAR(256),
	IN `cupo` INT(2),
	IN `jorn` VARCHAR(17),
	IN `fi` DATE,
	IN `ff` DATE
)
    COMMENT 'PROCEDIMIENTO PARA LA CREACION DEL REGISTRO DE SERVICIO SOCIAL Y LA RELACION EN LA BASE DE DATOS'
BEGIN	
	-- SE OBTIENEN LOS 2 ULTIMOS DIGITOS DEL AÑO ACTUAL
	SELECT @numberYear:= RIGHT(CAST(YEAR(DATE(NOW())) AS VARCHAR(4)),2) INTO @numberYear;
	
	-- SE OBTIENE EL ULTIMO VALOR DEL ID SEGUN EL ID ANTERIOR
	SET @lastValue := '';
	SELECT
	(CASE
		WHEN serviciosocial.idServicio IS NULL THEN '000'
        	WHEN LEFT(CAST((serviciosocial.idServicio) AS VARCHAR(15)), 2) = @numberYear THEN
            (CASE
             WHEN RIGHT(CAST(serviciosocial.idServicio AS VARCHAR(15)),4) != '0000' 
				 	THEN RIGHT(CAST(serviciosocial.idServicio AS VARCHAR(15)),4)
            ELSE '0000'
         END)
      ELSE '0000'
   END) INTO @lastValue
	FROM serviciosocial INNER JOIN solicitar ON serviciosocial.idServicio = solicitar.idServicio
   						  INNER JOIN dependencia ON solicitar.codUserDepend = dependencia.codUserDepend
	ORDER BY serviciosocial.idServicio DESC
	LIMIT 1;

	-- SE INCREMENTA EL VALOR ANTERIOR EN 1
	SELECT @digits:= LENGTH(@lastValue + 1) INTO @digits;
	
	-- SE GENERA EL NUEVO NUMERO GENERADO
	SELECT @newDigits:= 
	(CASE @digits
		WHEN 1 THEN CONCAT('000',(@lastValue + 1))
		WHEN 2 THEN CONCAT('00',(@lastValue + 1))
		WHEN 3 THEN CONCAT('0',(@lastValue + 1))
		WHEN 4 THEN (@lastValue + 1)
		ELSE NULL
	END) INTO @newDigits;
	
	-- SE CAMBIA EL IDIOMA PARA TENER LOS NOMBRES DE LOS MESES EN ESPAÑOL
	SET lc_time_names = 'es_ES';
	
	-- SE GENERA EL NUEVO ID
	SELECT @id:= CONCAT(@numberYear,'-ITMH/66/',@newDigits) INTO @id;

	-- SE INTRODUCEN LOS VALORES DENTRO DE LA TABLA
	INSERT INTO serviciosocial(`idServicio`,`nomServic`,`objetivo`,`actividades`,`detalles`,`caracteristicas`,`cupoLimit`,`jornada`,`fechaInicio`,`fechaFin`,`fechaCreacion`) 
	VALUES (@id,nom,obj,acts,details,caracts,cupo,jorn,fi,ff,DATE(NOW()));
	
	-- SE INTRODUCEN LOS VALORES DENTRO DE LA RELACION
	INSERT INTO solicitar(codUserDepend,idServicio)
	VALUES (codUser,@id);
	
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
