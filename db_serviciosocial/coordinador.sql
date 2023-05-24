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

-- Volcando estructura para tabla db_serviciosocial.coordinador
CREATE TABLE IF NOT EXISTS `coordinador` (
  `codUserCoord` varchar(11) NOT NULL COMMENT 'Generar automaticamente con el año de creacion, identificador de la institucion, tipo de usuario simplificado (COR), y numeros siguiendo el orden del 0001 hasta el 9999',
  `idCoord` varchar(10) NOT NULL COMMENT 'Generar automaticamente con el año de registro, codigo de la escuela, letra inicial de su nombre(s) y apellidos',
  `nomCoord` varchar(48) NOT NULL,
  `apCoord` varchar(24) NOT NULL,
  `amCoord` varchar(24) NOT NULL,
  `numTelfCoord` varchar(18) NOT NULL,
  PRIMARY KEY (`codUserCoord`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla db_serviciosocial.coordinador: ~0 rows (aproximadamente)
DELETE FROM `coordinador`;
/*!40000 ALTER TABLE `coordinador` DISABLE KEYS */;
/*!40000 ALTER TABLE `coordinador` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
