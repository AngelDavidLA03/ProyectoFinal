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

-- Volcando estructura para procedimiento db_serviciosocial.SAVEcnv
DELIMITER //
CREATE PROCEDURE `SAVEcnv`(
	IN `idDocument` VARCHAR(8),
	IN `codUser` VARCHAR(11)
)
    COMMENT 'PROCEDIMIENTO PARA LA CLASIFICACION DE DOCUMENTOS - CONVENIO'
BEGIN
	-- SE OBTIENE EL ULTIMO VALOR DEL ID SEGUN EL TIPO DE DOCUMENTO
	SET @lastValue := '';
	SELECT
	(CASE
		WHEN convenio.numConv IS NULL THEN '0000'
		WHEN convenio.numConv != '0000' 
			THEN convenio.numConv
      ELSE '0000'
      END) INTO @lastValue
	FROM convenio INNER JOIN documento ON documento.idDocument = convenio.idDocumentConv 
	ORDER BY idDocument DESC 
	LIMIT 1;
	SELECT @lastValue;
	
	-- SE INCREMENTA EL VALOR ANTERIOR EN 1
	SELECT @digits:= LENGTH(@lastValue + 1) INTO @digits;
	SELECT @digits;

	-- SE GENERA EL ID DEPENDIENDO DE LA CANTIDAD DE DIGITOS CON EL QUE CUENTA EL DIGITO
	SELECT @cvn:= (CASE @digits
		WHEN 1 THEN CONCAT('000',(@lastValue + 1))
		WHEN 2 THEN CONCAT('00',(@lastValue + 1))
		WHEN 3 THEN CONCAT('0',(@lastValue + 1))
		WHEN 4 THEN (@lastValue + 1)
		ELSE NULL
	END) INTO @cvn;

	-- SE ASIGNA EL CONVENIO A LA CORRESPONDIENTE DEPENDENCIA
	INSERT INTO convenio(`idDocumentConv`,`numConv`,`codUserDepend`)
	VALUES (idDocument,@cvn,codUser);
	
	-- SE OBTIENEN LOS 2 ULTIMOS DIGITOS DEL AÑO ACTUAL
	SELECT @numberYear:= RIGHT(CAST(YEAR(DATE(NOW())) AS VARCHAR(4)),2) INTO @numberYear;
	
	SELECT @idDepend := CONCAT(@numberYear,'-',@cvn) INTO @idDepend;
	SELECT @idDepend;
	
	-- SE ASIGNA EL ID DE LA DEPENDENCIA
	UPDATE dependencia
	SET dependencia.idDepend = @idDepend
	WHERE dependencia.codUserDepend = codUser;
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
