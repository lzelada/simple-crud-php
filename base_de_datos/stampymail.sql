-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for stampymail
CREATE DATABASE IF NOT EXISTS `stampymail` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stampymail`;

-- Dumping structure for table stampymail.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table stampymail.usuario: ~3 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `email`, `usuario`, `password`, `nombre`, `apellido`, `telefono`) VALUES
	(14, 'lucas.zelada11@gmail.com', 'lzelada', '$2y$10$QcVKiLRFfjBRLh9pVdBz8eNjaIspWmKdHot2m4P6eh7vtjhxQXRR6', 'lucas', 'zelada', '123456789'),
	(15, 'Lucas.zeladaa@hotmail.com', 'zeladalucas', '$2y$10$iIJxMz6L5yytzWDe0mg0MuxOjqXs6ay5ULKksa760pslHRA1ufwOu', 'Lucas', 'Zelada', '1165533465'),
	(17, 'stampymail@hotmail.com', 'stampymail', '$2y$10$AvBQtJUFbuwdIavtAwb/F.Np/va8Wew3MjlXyy72SOmhh/Y2BYmmC', 'stampy', 'mail', '941560096');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
