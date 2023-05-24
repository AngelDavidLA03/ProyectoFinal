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

-- Volcando estructura para tabla db_serviciosocial.serviciosocial
CREATE TABLE IF NOT EXISTS `serviciosocial` (
  `idServicio` varchar(16) NOT NULL COMMENT 'Generar automaticamente con el año de creacion, las iniciales del nombre(s) y apellidos del director general, dos caracteres incrementales del 01 al 99, un separador de -, y el periodo de solicitud (ENE-JUN, y JUL-DIC)',
  `nomServic` varchar(54) NOT NULL COMMENT 'Nombre descriptivo propio del servicio social',
  `objetivo` varchar(108) NOT NULL COMMENT 'Introducir el objetivo de la realizacion del servicio social',
  `actividades` varchar(256) NOT NULL COMMENT 'Introducir las actividades que se realizaran durante el servicio social en un maximo de 256 caracteres',
  `detalles` varchar(256) NOT NULL COMMENT 'Introducir los detalles del servicio social',
  `caracteristicas` varchar(256) NOT NULL COMMENT 'Introducir las caracteristicas necesarias para poder ser aceptado en el puesto',
  `cupoLimit` int(2) NOT NULL,
  `jornada` varchar(17) NOT NULL COMMENT 'Dias que tendran que asistir',
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `fechaCreacion` date NOT NULL,
  PRIMARY KEY (`idServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla db_serviciosocial.serviciosocial: ~1 rows (aproximadamente)
DELETE FROM `serviciosocial`;
/*!40000 ALTER TABLE `serviciosocial` DISABLE KEYS */;
INSERT INTO `serviciosocial` (`idServicio`, `nomServic`, `objetivo`, `actividades`, `detalles`, `caracteristicas`, `cupoLimit`, `jornada`, `fechaInicio`, `fechaFin`, `fechaCreacion`) VALUES
	('23-ITMH/66/0001', 'TESTEO DEL SISTEMA', 'PROBAR EL SISTEMA DE RESIDENCIAS', 'CREAR SOLICITUDES', 'REALIZAR LA INSERCION DE VARIOS REGISTROS USANDO EL SISTEMA DE SERVICIO SOCIAL', 'QUE SEPA ESCRIBIR', 12, 'LUNES-VIERNES', '2023-05-22', '2023-05-22', '2023-05-22');
/*!40000 ALTER TABLE `serviciosocial` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
