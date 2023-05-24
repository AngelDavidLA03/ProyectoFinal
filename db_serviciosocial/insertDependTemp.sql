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

-- Volcando estructura para procedimiento db_serviciosocial.insertDependTemp
DELIMITER //
CREATE PROCEDURE `insertDependTemp`(
	IN `codUser` VARCHAR(11),
	IN `nom` VARCHAR(32),
	IN `regfed` VARCHAR(13),
	IN `trabajadores` INT(2),
	IN `enfoque` VARCHAR(24),
	IN `numTelf` VARCHAR(18),
	IN `calle` VARCHAR(21),
	IN `numExt` INT(3),
	IN `numInt` INT(3),
	IN `colonia` VARCHAR(15),
	IN `cp` INT(5),
	IN `ciudad` VARCHAR(20),
	IN `ef` VARCHAR(20),
	IN `imagen` LONGBLOB,
	IN `tipo` VARCHAR(7)
)
    COMMENT 'PROCEDIMIENTO PARA LA INSERCION TEMPORAL DEL REGISTRO DE DEPENDENCIA EN LA BASE DE DATOS'
INSERT INTO dependencia(codUserDepend,nomDepend,RFC,numTrabajadores,enfoqueDepend,numTelfDepend,calleDepend,numExtDepend,numIntDepend,coloniaDepend,cpDepend,ciudadDepend,efDepend,logo,tipoDepend)
	VALUES(codUser,nom,regfed,trabajadores,enfoque,numTelf,calle,numExt,numInt,colonia,cp,ciudad,ef,imagen,tipo)//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
