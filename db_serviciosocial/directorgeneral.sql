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

-- Volcando estructura para tabla db_serviciosocial.directorgeneral
CREATE TABLE IF NOT EXISTS `directorgeneral` (
  `idDirector` varchar(10) NOT NULL COMMENT 'Formado por año de registro, "-" de separador, iniciales de nombre(s) y apellidos, "-" de separador, e identificador del 00 al 99',
  `nomDirector` varchar(54) NOT NULL,
  `apDirector` varchar(36) NOT NULL,
  `amDirector` varchar(36) NOT NULL,
  `edadDirector` int(2) NOT NULL,
  `curpDirector` varchar(18) NOT NULL,
  `emailDirector` varchar(128) NOT NULL,
  `numTelfDirector` varchar(18) NOT NULL,
  PRIMARY KEY (`idDirector`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla db_serviciosocial.directorgeneral: ~2 rows (aproximadamente)
DELETE FROM `directorgeneral`;
/*!40000 ALTER TABLE `directorgeneral` DISABLE KEYS */;
INSERT INTO `directorgeneral` (`idDirector`, `nomDirector`, `apDirector`, `amDirector`, `edadDirector`, `curpDirector`, `emailDirector`, `numTelfDirector`) VALUES
	('23-ADLA-01', 'angel david', 'lopez', 'alvarez', 19, 'loaa030811hspplna3', 'angeldavid2k17@gmail.com', '4880000000'),
	('23-DDSD-01', 'dasadsads', 'sadxc', 'dsdq', 1, 'gfg', 'xvvv', '1');
/*!40000 ALTER TABLE `directorgeneral` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
