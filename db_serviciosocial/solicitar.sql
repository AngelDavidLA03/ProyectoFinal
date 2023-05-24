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

-- Volcando estructura para tabla db_serviciosocial.solicitar
CREATE TABLE IF NOT EXISTS `solicitar` (
  `codUserDepend` varchar(11) NOT NULL,
  `idServicio` varchar(16) NOT NULL,
  UNIQUE KEY `idServicio` (`idServicio`),
  KEY `FK_codUserDepend_Solic` (`codUserDepend`),
  CONSTRAINT `FK_codUserDepend_Solic` FOREIGN KEY (`codUserDepend`) REFERENCES `dependencia` (`codUserDepend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_idServicio_Solic` FOREIGN KEY (`idServicio`) REFERENCES `serviciosocial` (`idServicio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla db_serviciosocial.solicitar: ~1 rows (aproximadamente)
DELETE FROM `solicitar`;
/*!40000 ALTER TABLE `solicitar` DISABLE KEYS */;
INSERT INTO `solicitar` (`codUserDepend`, `idServicio`) VALUES
	('2366DEP0001', '23-ITMH/66/0001');
/*!40000 ALTER TABLE `solicitar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
