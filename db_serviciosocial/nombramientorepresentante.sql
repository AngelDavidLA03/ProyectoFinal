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

-- Volcando estructura para tabla db_serviciosocial.nombramientorepresentante
CREATE TABLE IF NOT EXISTS `nombramientorepresentante` (
  `idDocumentNomRep` varchar(8) NOT NULL,
  `idDirectorNomRep` varchar(10) NOT NULL,
  PRIMARY KEY (`idDocumentNomRep`),
  UNIQUE KEY `idDocumentNomRep` (`idDocumentNomRep`) USING BTREE,
  CONSTRAINT `ESPEC_idDocumentNomRep` FOREIGN KEY (`idDocumentNomRep`) REFERENCES `documento` (`idDocument`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='ABREVIACION = NRE';

-- Volcando datos para la tabla db_serviciosocial.nombramientorepresentante: ~1 rows (aproximadamente)
DELETE FROM `nombramientorepresentante`;
/*!40000 ALTER TABLE `nombramientorepresentante` DISABLE KEYS */;
INSERT INTO `nombramientorepresentante` (`idDocumentNomRep`, `idDirectorNomRep`) VALUES
	('23NRE001', '23-ADLA-01');
/*!40000 ALTER TABLE `nombramientorepresentante` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
