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

-- Volcando estructura para procedimiento db_serviciosocial.insertDirectorGen
DELIMITER //
CREATE PROCEDURE `insertDirectorGen`(
	IN `codUser` VARCHAR(11),
	IN `nom` VARCHAR(54),
	IN `ap` VARCHAR(36),
	IN `am` VARCHAR(36),
	IN `edad` INT(2),
	IN `curp` VARCHAR(18),
	IN `email` VARCHAR(128),
	IN `telf` VARCHAR(18)
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
	
	-- ARROJA EL ID GENERADO
	SELECT @id;
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
