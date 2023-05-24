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

-- Volcando estructura para tabla db_serviciosocial.tener
CREATE TABLE IF NOT EXISTS `tener` (
  `codUserDepend` varchar(11) NOT NULL,
  `idEstado` int(1) NOT NULL,
  `fechaUpdate` date NOT NULL,
  `porcenActual` int(2) DEFAULT NULL COMMENT 'Introducir el porcentaje de revision actual en un rango de 0 - 99 (Solo cuando el idEstado sea de 2)',
  `razonRech` varchar(64) DEFAULT NULL COMMENT 'Introducir la razon por la cual se rechazo en un maximo de 64 caracteres (Solo cuando el idEstado sea de 4)',
  PRIMARY KEY (`codUserDepend`),
  KEY `FK_idEstado_Tener` (`idEstado`),
  CONSTRAINT `FK_codUserDepend_Tener` FOREIGN KEY (`codUserDepend`) REFERENCES `dependencia` (`codUserDepend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_idEstado_Tener` FOREIGN KEY (`idEstado`) REFERENCES `estadoverif` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla db_serviciosocial.tener: ~0 rows (aproximadamente)
DELETE FROM `tener`;
/*!40000 ALTER TABLE `tener` DISABLE KEYS */;
/*!40000 ALTER TABLE `tener` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
