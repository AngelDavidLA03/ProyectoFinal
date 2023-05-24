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

-- Volcando estructura para tabla db_serviciosocial.administrar
CREATE TABLE IF NOT EXISTS `administrar` (
  `codUserDepend` varchar(11) NOT NULL,
  `idDirector` varchar(10) NOT NULL,
  UNIQUE KEY `codUserDepend` (`codUserDepend`),
  UNIQUE KEY `idDirector` (`idDirector`),
  CONSTRAINT `FK_codUserDepend_Admin` FOREIGN KEY (`codUserDepend`) REFERENCES `dependencia` (`codUserDepend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_idDirector_Admin` FOREIGN KEY (`idDirector`) REFERENCES `directorgeneral` (`idDirector`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla db_serviciosocial.administrar: ~2 rows (aproximadamente)
DELETE FROM `administrar`;
/*!40000 ALTER TABLE `administrar` DISABLE KEYS */;
INSERT INTO `administrar` (`codUserDepend`, `idDirector`) VALUES
	('2366DEP0001', '23-ADLA-01'),
	('2366DEP0000', '23-DDSD-01');
/*!40000 ALTER TABLE `administrar` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
