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

-- Volcando estructura para tabla db_serviciosocial.listaactividades
CREATE TABLE IF NOT EXISTS `listaactividades` (
  `idDocumentAct` varchar(8) NOT NULL,
  `listAct` varchar(128) NOT NULL COMMENT 'Introducir las actividades a realizar en un maximo de 128 caracteres',
  `idServicioAct` varchar(16) NOT NULL,
  PRIMARY KEY (`idDocumentAct`),
  UNIQUE KEY `idDocumentAct` (`idDocumentAct`) USING BTREE,
  CONSTRAINT `ESPEC_idDocumentAct` FOREIGN KEY (`idDocumentAct`) REFERENCES `documento` (`idDocument`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='ABREVIACION = LAC';

-- Volcando datos para la tabla db_serviciosocial.listaactividades: ~0 rows (aproximadamente)
DELETE FROM `listaactividades`;
/*!40000 ALTER TABLE `listaactividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `listaactividades` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
