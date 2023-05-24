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

-- Volcando estructura para tabla db_serviciosocial.estadoverif
CREATE TABLE IF NOT EXISTS `estadoverif` (
  `idEstado` int(1) NOT NULL,
  `nomEstado` varchar(11) NOT NULL COMMENT 'Solo permitir valores como Espera, Verificando, Aprobada, Rechazada',
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='NO INTRODUCIR VALORES EN ESTA TABLA';

-- Volcando datos para la tabla db_serviciosocial.estadoverif: ~4 rows (aproximadamente)
DELETE FROM `estadoverif`;
/*!40000 ALTER TABLE `estadoverif` DISABLE KEYS */;
INSERT INTO `estadoverif` (`idEstado`, `nomEstado`) VALUES
	(1, 'Espera'),
	(2, 'Verificando'),
	(3, 'Aprobada'),
	(4, 'Rechazada');
/*!40000 ALTER TABLE `estadoverif` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
