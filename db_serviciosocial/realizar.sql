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

-- Volcando estructura para tabla db_serviciosocial.realizar
CREATE TABLE IF NOT EXISTS `realizar` (
  `codUserAlumn` varchar(11) NOT NULL,
  `idServicio` varchar(16) NOT NULL,
  `estado` varchar(10) DEFAULT NULL COMMENT 'Solo permitir valores como ACEPTADO o RECHAZADO',
  KEY `FK_idServicio_Real` (`idServicio`),
  KEY `codUserAlumn` (`codUserAlumn`) USING BTREE,
  CONSTRAINT `FK_codUserAlumn_Real` FOREIGN KEY (`codUserAlumn`) REFERENCES `alumno` (`codUserAlumn`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_idServicio_Real` FOREIGN KEY (`idServicio`) REFERENCES `serviciosocial` (`idServicio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla db_serviciosocial.realizar: ~7 rows (aproximadamente)
DELETE FROM `realizar`;
/*!40000 ALTER TABLE `realizar` DISABLE KEYS */;
INSERT INTO `realizar` (`codUserAlumn`, `idServicio`, `estado`) VALUES
	('1466ALU0153', '23-ITMH/66/0001', 'ACEPTADO'),
	('1366ALU0085', '23-ITMH/66/0001', 'ACEPTADO'),
	('1566ALU0147', '23-ITMH/66/0001', 'ACEPTADO'),
	('1666ALU0130', '23-ITMH/66/0001', 'ACEPTADO'),
	('1666ALU0347', '23-ITMH/66/0001', 'ACEPTADO'),
	('1766ALU0175', '23-ITMH/66/0001', 'ACEPTADO'),
	('2066ALU0062', '23-ITMH/66/0001', 'ACEPTADO');
/*!40000 ALTER TABLE `realizar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
