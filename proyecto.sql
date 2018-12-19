-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para proyecto
CREATE DATABASE IF NOT EXISTS `proyecto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `proyecto`;

-- Volcando estructura para tabla proyecto.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `fecha` datetime NOT NULL,
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(400) NOT NULL,
  `id_edificio` int(11) NOT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `id_departamento` (`id_edificio`),
  CONSTRAINT `FK-edificio-agenda` FOREIGN KEY (`id_edificio`) REFERENCES `edificio` (`id_edificio`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.agenda: ~8 rows (aproximadamente)
DELETE FROM `agenda`;
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`fecha`, `id_agenda`, `tema`, `id_edificio`) VALUES
	('2019-01-17 19:00:00', 7, 'Ascensores ', 1),
	('2019-02-20 17:00:00', 8, 'Cortes de luz', 3),
	('2019-03-01 20:00:00', 9, 'Ruidos molestos', 4),
	('2019-02-04 16:30:00', 10, 'Convivencia', 3),
	('2019-03-17 19:00:00', 11, 'Limpieza', 1),
	('2019-04-28 21:00:00', 12, 'Aumentos', 1),
	('2018-12-20 21:00:00', 13, 'Seguridad', 4),
	('2019-01-14 22:00:00', 14, 'Perdida de gas', 2);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.archivo_reclamo
CREATE TABLE IF NOT EXISTS `archivo_reclamo` (
  `nombre_archivo` char(50) DEFAULT NULL,
  `id_reclamo` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_archivo`),
  KEY `id_reclamo` (`id_reclamo`),
  CONSTRAINT `id_reclamo` FOREIGN KEY (`id_reclamo`) REFERENCES `reclamo` (`id_reclamo`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.archivo_reclamo: ~11 rows (aproximadamente)
DELETE FROM `archivo_reclamo`;
/*!40000 ALTER TABLE `archivo_reclamo` DISABLE KEYS */;
INSERT INTO `archivo_reclamo` (`nombre_archivo`, `id_reclamo`, `id_archivo`) VALUES
	('1545159627cocina.jpg', 54, 57),
	('1545159888hum1.jpg', 55, 58),
	('1545159888humedad.jpg', 55, 59),
	('1545159888humedades-pared-1024x768.jpg', 55, 60),
	('1545160235Enchufe-quemado (1).jpg', 56, 61),
	('1545160235enchufe-quemado.jpg', 56, 62),
	('1545160235quemado-enchufe.jpg', 56, 63),
	('1545160485joe-s-apartment.jpg', 57, 64),
	('1545160485the-cockroaches-in-joe-s-apartment.jpg', 57, 65),
	('1545160728grifo-lavavajillas-cambio.jpg', 59, 67),
	('1545160728shutterstock_538356220-min.jpg', 59, 68);
/*!40000 ALTER TABLE `archivo_reclamo` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `id_departamento` int(255) NOT NULL AUTO_INCREMENT,
  `id_edificio` int(100) NOT NULL,
  `piso` int(100) NOT NULL,
  `departamento` char(100) NOT NULL,
  PRIMARY KEY (`id_departamento`),
  KEY `edificio` (`id_edificio`),
  CONSTRAINT `edificio` FOREIGN KEY (`id_edificio`) REFERENCES `edificio` (`id_edificio`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.departamento: ~6 rows (aproximadamente)
DELETE FROM `departamento`;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`id_departamento`, `id_edificio`, `piso`, `departamento`) VALUES
	(1, 1, 1, 'A'),
	(2, 2, 2, 'B'),
	(3, 3, 3, 'C'),
	(4, 4, 4, 'D'),
	(5, 1, 5, 'E'),
	(6, 2, 6, 'F');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.departamento_persona
CREATE TABLE IF NOT EXISTS `departamento_persona` (
  `id_departamento` int(11) NOT NULL,
  `id_persona` varchar(20) NOT NULL,
  KEY `persona` (`id_persona`),
  KEY `id_departamento` (`id_departamento`),
  CONSTRAINT `id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`),
  CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.departamento_persona: ~6 rows (aproximadamente)
DELETE FROM `departamento_persona`;
/*!40000 ALTER TABLE `departamento_persona` DISABLE KEYS */;
INSERT INTO `departamento_persona` (`id_departamento`, `id_persona`) VALUES
	(1, '1'),
	(2, '2'),
	(3, '3'),
	(4, '4'),
	(5, '5'),
	(6, '6');
/*!40000 ALTER TABLE `departamento_persona` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.edificio
CREATE TABLE IF NOT EXISTS `edificio` (
  `id_edificio` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_edificio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.edificio: ~4 rows (aproximadamente)
DELETE FROM `edificio`;
/*!40000 ALTER TABLE `edificio` DISABLE KEYS */;
INSERT INTO `edificio` (`id_edificio`, `direccion`) VALUES
	(1, 'Av. Díaz Vélez 4147, CABA'),
	(2, ' San Luis 3237, CABA'),
	(3, ' Pres. Tte. Gral. Juan Domingo Perón 3175, CABA'),
	(4, 'Av. Córdoba 2222, CABA');
/*!40000 ALTER TABLE `edificio` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.expensas
CREATE TABLE IF NOT EXISTS `expensas` (
  `expensa` text,
  `alias` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_departamento` int(11) NOT NULL,
  PRIMARY KEY (`fecha`),
  KEY `id_departamento` (`id_departamento`),
  CONSTRAINT `FK_expensas_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.expensas: ~11 rows (aproximadamente)
DELETE FROM `expensas`;
/*!40000 ALTER TABLE `expensas` DISABLE KEYS */;
INSERT INTO `expensas` (`expensa`, `alias`, `fecha`, `id_departamento`) VALUES
	('pdf-ejemplo.pdf', '1545163174', '2018-12-18 16:59:34', 1),
	('pdf-ejemplo.pdf', '1545163255', '2018-12-18 17:00:55', 2),
	('pdf-ejemplo.pdf', '1545163264', '2018-12-18 17:01:04', 1),
	('pdf-ejemplo.pdf', '1545163272', '2018-12-18 17:01:12', 6),
	('pdf-ejemplo.pdf', '1545163280', '2018-12-18 17:01:20', 3),
	('pdf-ejemplo.pdf', '1545163287', '2018-12-18 17:01:27', 4),
	('pdf-ejemplo.pdf', '1545163299', '2018-12-18 17:01:39', 5),
	('pdf-ejemplo.pdf', '1545163315', '2018-12-18 17:01:55', 2),
	('pdf-ejemplo.pdf', '1545163336', '2018-12-18 17:02:16', 4),
	('pdf-ejemplo.pdf', '1545163346', '2018-12-18 17:02:26', 1),
	('pdf-ejemplo.pdf', '1545163357', '2018-12-18 17:02:37', 3);
/*!40000 ALTER TABLE `expensas` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.novedades
CREATE TABLE IF NOT EXISTS `novedades` (
  `id_novedades` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_edificio` int(11) NOT NULL,
  `titulo` char(50) NOT NULL,
  PRIMARY KEY (`id_novedades`),
  KEY `id_edificio` (`id_edificio`),
  CONSTRAINT `id_edificio` FOREIGN KEY (`id_edificio`) REFERENCES `edificio` (`id_edificio`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.novedades: ~4 rows (aproximadamente)
DELETE FROM `novedades`;
/*!40000 ALTER TABLE `novedades` DISABLE KEYS */;
INSERT INTO `novedades` (`id_novedades`, `comentario`, `fecha`, `id_edificio`, `titulo`) VALUES
	(21, 'Lorem ipsum dolor sit amet consectetur adipiscing elit penatibus placerat, orci ante nam ullamcorper velit egestas nostra natoque massa gravida, sapien luctus porta sed dapibus congue arcu molestie. Auctor ultricies magnis phasellus dictumst ornare urna ullamcorper, fusce nisi id luctus sodales in quam tempor, hac tempus integer eget himenaeos ridiculus. Accumsan volutpat vivamus torquent natoque hendrerit, fermentum nulla habitasse etiam curae, himenaeos auctor tellus vitae.\r\n\r\nInceptos neque placerat parturient ultrices pellentesque mattis consequat cubilia vivamus, hendrerit mus interdum condimentum ridiculus accumsan erat iaculis turpis, commodo semper mauris metus feugiat varius ac diam. Rutrum morbi diam cras placerat iaculis scelerisque aliquam, blandit leo tristique montes justo accu', '2018-12-18 16:28:02', 1, 'Lorem ipsum.'),
	(22, 'Lorem ipsum dolor sit amet consectetur adipiscing elit, non condimentum luctus aenean leo in molestie, dictum potenti euismod a fringilla proin. Eros neque fames nascetur sed nunc viverra duis pretium scelerisque pellentesque, nisl condimentum nisi eget maecenas sagittis placerat molestie urna. Gravida scelerisque pulvinar tellus pharetra ullamcorper mollis sollicitudin non eget lacinia, condimentum vestibulum elementum vel magna nullam urna quam eleifend lobortis, metus cursus sociis massa ante ridiculus enim velit dui. Ac auctor pellentesque cubilia ligula lacus integer sollicitudin, mus eros euismod dictumst sociis. Magna velit parturient platea class eros nibh ultricies bibendum, aliquet donec primis porta porttitor non blandit, volutpat ad massa aptent penatibus cursus nascetur.', '2018-12-18 16:28:53', 3, 'Lorem ipsum dolor sit.'),
	(23, 'Lorem ipsum dolor sit amet consectetur adipiscing elit primis, ut imperdiet a iaculis massa auctor hendrerit pretium aptent, aenean senectus ornare laoreet cursus morbi commodo. Varius odio mattis vitae ac at vehicula velit convallis tempus leo ultricies pellentesque, eleifend curae elementum ultrices arcu vel proin feugiat tempor faucibus ridiculus, montes habitant dictumst urna mauris inceptos sem eros luctus facilisi taciti. Inceptos habitasse torquent est in augue eros eleifend laoreet himenaeos platea tempor turpis odio, eu auctor mus sollicitudin conubia vestibulum libero senectus nascetur magna sociosqu.\r\n\r\nTempus viverra parturient magnis est faucibus pulvinar venenatis orci, augue convallis ornare ut suspendisse varius mollis, diam donec fames maecenas purus ligula imperdiet. Nullam', '2018-12-18 16:29:18', 4, 'Eu hac facilisi nam.'),
	(24, 'Lorem ipsum dolor sit amet consectetur adipiscing elit sagittis rhoncus nec, tristique bibendum feugiat orci aptent scelerisque vulputate nulla mauris montes, nunc porttitor dignissim cursus tortor praesent nam egestas volutpat. Sagittis accumsan fusce ullamcorper tellus conubia potenti at, viverra tempor praesent nisi gravida tincidunt habitasse vivamus, curabitur est taciti parturient cubilia torquent. Aenean condimentum parturient vitae platea suscipit mollis enim scelerisque, non nec ad facilisis posuere taciti senectus litora, tortor tristique magna ut auctor aptent cursus.\r\n\r\nConubia ultricies blandit fringilla ullamcorper viverra lacus aliquet, donec laoreet porta vestibulum metus est molestie, praesent facilisi mi pretium bibendum phasellus. Nec nibh cursus suspendisse quis aenean vi', '2018-12-18 16:29:49', 1, 'Tempus viverra.');
/*!40000 ALTER TABLE `novedades` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '0',
  `telefono` varchar(50) DEFAULT NULL,
  `dni` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.persona: ~7 rows (aproximadamente)
DELETE FROM `persona`;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`nombre`, `apellido`, `password`, `telefono`, `dni`, `username`) VALUES
	('Juan', 'Perez', '$2y$10$7TlkxbljMpdm04o3XxEUCulmjF6TiyCfVVwVFXl56/rP7yp.cCgCa', '1234', '1', 'perezjuan'),
	('Martin', 'Martinez', '$2y$10$F6A8mN8.UHDF4jsCOaiFle4OpPIQShwN7dWCfdCKSe0epn7rxN2SW', '1234-1234', '2', 'martinezmartin'),
	('Jose', 'Rodriguez', '$2y$10$RYwieN/cRDCREqYetubpMu6GHfrivVz8Dm9CsbcZDYTV2q6//aRVu', '4321-4321', '3', 'rodriguezjose'),
	('Norma', 'Cejas', '$2y$10$1j7t27npdF6cXV.4u12fTeh.XmCsLUOVOvjisPnVyleeBrigBMD8u', '4567-7654', '4', 'cejasnorma'),
	('Aldana Araceli', 'Benitez', '$2y$10$RualcjPQmej4dlBByjK0DOes9HVGZhN6FYutWGSAGKG2P6WtE95fq', '1155861326', '40302747', 'root'),
	('Barbara', 'Rojel', '$2y$10$EyNNDq4tydSXO5N3H8fZl.XcqcxPqrWHed/ctQNhsDTRP3lxwF3hC', '9876-9876', '5', 'rojelbarbara'),
	('Micaela', 'Riquelme', '$2y$10$7nxwP/PVKmRUu9Auv42zC.gZ7meaxUXOYoFcEcJ8lEee77QzctSTC', '3467-6543', '6', 'riquelmemicaela');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.reclamo
CREATE TABLE IF NOT EXISTS `reclamo` (
  `id_reclamo` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` char(50) NOT NULL DEFAULT '0',
  `id_tipo_reclamo` int(11) NOT NULL,
  `id_sector` int(11) NOT NULL,
  `comentario` text,
  `id_persona` varchar(20) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reclamo`),
  KEY `tipo_reclamo` (`id_tipo_reclamo`),
  KEY `sector` (`id_sector`),
  KEY `persona` (`id_persona`),
  CONSTRAINT `persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`dni`),
  CONSTRAINT `sector` FOREIGN KEY (`id_sector`) REFERENCES `sector` (`id_sector`),
  CONSTRAINT `tipo_reclamo` FOREIGN KEY (`id_tipo_reclamo`) REFERENCES `tipo_reclamo` (`id_tipo_reclamo`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.reclamo: ~6 rows (aproximadamente)
DELETE FROM `reclamo`;
/*!40000 ALTER TABLE `reclamo` DISABLE KEYS */;
INSERT INTO `reclamo` (`id_reclamo`, `asunto`, `id_tipo_reclamo`, `id_sector`, `comentario`, `id_persona`, `fecha`) VALUES
	(54, 'Perdida de gas', 4, 7, 'Lorem ipsum dolor sit amet consectetur adipiscing elit nec nibh diam, magnis suspendisse sapien mi hendrerit mus sociosqu leo nascetur, quam cras pharetra commodo vel etiam turpis suscipit dui. Facilisi sociis imperdiet suscipit ultrices per mollis, neque augue donec pellentesque a, pulvinar fames praesent phasellus interdum. Praesent netus dapibus per sociosqu pellentesque et aliquam senectus, orci viverra ad porttitor varius tincidunt eleifend.\r\n\r\nArcu consequat viverra tristique nam lacinia quis class eu mollis semper, sollicitudin phasellus nibh dictum penatibus vehicula montes condimentum facilisi aliquet, dui mi nisi potenti platea habitant ligula etiam turpis. Congue netus morbi nec habitasse justo orci conubia lacus ridiculus, iaculis sodales lacinia montes turpis nisl volutpat odio platea, non senectus donec bibendum magna tempor quisque phasellus. Integer justo senectus class porttitor aliquet dictumst ridiculus, ac luctus ut parturient volutpat commodo urna quisque, purus euismod etiam dapibus potenti orci.', '5', '2018-12-18 16:00:27'),
	(55, 'Humedad en las paredes', 2, 9, 'Lorem ipsum dolor sit amet consectetur adipiscing elit nec nibh diam, magnis suspendisse sapien mi hendrerit mus sociosqu leo nascetur, quam cras pharetra commodo vel etiam turpis suscipit dui. Facilisi sociis imperdiet suscipit ultrices per mollis, neque augue donec pellentesque a, pulvinar fames praesent phasellus interdum. Praesent netus dapibus per sociosqu pellentesque et aliquam senectus, orci viverra ad porttitor varius tincidunt eleifend.', '5', '2018-12-18 16:04:48'),
	(56, 'Enchufes quemados', 5, 5, 'Lorem ipsum dolor sit amet consectetur adipiscing, elit dis dictumst felis cras consequat mollis, ut nam sem platea tellus. Ultrices mauris tellus sagittis enim velit imperdiet euismod duis litora sociis, dictum interdum vestibulum sapien morbi rhoncus curabitur iaculis laoreet facilisis, malesuada nibh turpis lacus hendrerit tempus nostra at cubilia. Vestibulum vitae imperdiet dis montes vehicula sodales risus interdum volutpat, class libero netus auctor lacinia a et cubilia est, vel porttitor maecenas dictumst phasellus ante hendrerit feugiat. Massa aliquet blandit augue porttitor cursus purus, at sollicitudin inceptos condimentum duis cubilia, tristique torquent lectus proin mollis.\r\n\r\nEt imperdiet porta auctor consequat non semper ad euismod dignissim fermentum augue ac pharetra, ridiculus in suspendisse a torquent quis erat fames nullam vitae nunc purus facilisi penatibus, massa volutpat hendrerit accumsan pretium tristique praesent cum maecenas malesuada feugiat montes. Fringilla egestas eget morbi molestie pulvinar ultricies magnis mattis, maecenas vivamus praesent lectus curabitur sociis habitant, pharetra vulputate ad semper ridiculus placerat velit. Nisi litora magna ante venenatis consequat mi eget ligula ridiculus, curabitur mattis ad pulvinar lacus eros quam commodo, massa facilisis sociis cursus posuere nostra justo curae.', '1', '2018-12-18 16:10:35'),
	(57, 'Cucarachas', 6, 7, 'Lorem ipsum dolor sit amet consectetur adipiscing elit ante lectus, platea cum ad risus nisi massa lacinia magna. Hac molestie neque quisque aptent feugiat libero diam fusce inceptos risus per, etiam litora fames dictumst habitant porttitor faucibus mattis malesuada vitae, sem erat nascetur vehicula potenti convallis placerat nostra non gravida. Condimentum himenaeos et egestas sed commodo maecenas augue aenean phasellus, nisi sem in donec praesent purus pretium tristique urna, senectus vulputate interdum curae nascetur cubilia convallis arcu. Auctor orci gravida tempus sodales massa porttitor montes natoque, quis interdum mollis enim commodo neque taciti sociosqu litora, ac nisl condimentum class nostra praesent nisi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nOrci cum ornare nascetur faucibus curabitur, sapien vulputate habitasse praesent.', '6', '2018-12-18 16:14:45'),
	(58, 'Cortes de luz', 5, 5, 'Lorem ipsum dolor sit amet consectetur adipiscing elit feugiat vehicula condimentum, posuere erat lectus sagittis cras justo nisi interdum. Per congue id quam ullamcorper montes bibendum, suscipit odio placerat velit commodo pulvinar, inceptos dui cum primis malesuada. Mauris potenti rutrum sodales per faucibus iaculis phasellus fusce sociis, magnis justo laoreet nulla ligula bibendum pellentesque blandit.\r\n\r\nRidiculus semper class leo libero laoreet interdum montes vestibulum ligula, praesent eu posuere eleifend parturient varius convallis magnis porta, venenatis viverra eros mollis at aliquam neque per. Sed accumsan semper donec mattis facilisi commodo risus, libero justo himenaeos vivamus morbi elementum aliquet, aptent ad nascetur dui cras quam. Rhoncus cras posuere sollicitudin mauris per nullam ut netus ridiculus, integer vulputate euismod vehicula sem at quis gravida mus condimentum, metus vivamus dis habitasse aliquet eleifend senectus facilisis.', '6', '2018-12-18 16:16:00'),
	(59, 'Perdida de agua', 1, 8, 'Lorem ipsum dolor sit amet consectetur adipiscing elit class tortor, ultrices purus nulla molestie integer maecenas fusce ligula nec imperdiet, fames pharetra eros conubia tempus mus etiam vel. Hendrerit commodo fames etiam ullamcorper aliquet dapibus conubia ut ridiculus, ultricies magna per mus molestie tempor dictum faucibus laoreet, fringilla magnis non nibh velit vivamus risus duis. Lectus tempor natoque sodales consequat primis placerat, mauris nam sociis viverra platea tellus vestibulum, ultricies risus gravida duis montes. Sed cras potenti placerat ultricies etiam tortor hac, convallis tempor phasellus volutpat justo in curabitur, aliquam curae ridiculus cursus ultrices sapien.\r\n\r\nFacilisis natoque phasellus vel nascetur facilisi netus iaculis porta nulla nunc, fringilla pharetra dictumst lectus senectus luctus elementum maecenas sapien, aenean nec rhoncus integer dui consequat viverra pellentesque in. Laoreet justo vel sapien fames vitae felis ut senectus primis integer, dui elementum lobortis etiam suscipit at montes dignissim cubilia, molestie bibendum in cum litora egestas sodales varius est. Augue tempus congue sem mauris in mollis felis luctus, cubilia inceptos neque varius maecenas sapien nulla, sagittis egestas lectus aenean dictum cursus hac ridiculus, morbi volutpat praesent euismod lacus velit. Ultricies semper donec nostra sodales gravida sociosqu nascetur conubia elementum tempor, integer felis a lectus commodo cras torquent curabitur turpis.', '3', '2018-12-18 16:18:48');
/*!40000 ALTER TABLE `reclamo` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.sector
CREATE TABLE IF NOT EXISTS `sector` (
  `sector` char(50) NOT NULL,
  `id_sector` int(11) NOT NULL AUTO_INCREMENT,
  `area` char(50) NOT NULL,
  PRIMARY KEY (`id_sector`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.sector: ~10 rows (aproximadamente)
DELETE FROM `sector`;
/*!40000 ALTER TABLE `sector` DISABLE KEYS */;
INSERT INTO `sector` (`sector`, `id_sector`, `area`) VALUES
	('EXTERIOR', 1, 'PASILLO'),
	('EXTERIOR', 2, 'ASCENSOR'),
	('EXTERIOR', 3, 'HALL'),
	('EXTERIOR', 4, 'VEREDA'),
	('INTERIOR', 5, 'LIVING'),
	('INTERIOR', 6, 'COMEDOR'),
	('INTERIOR', 7, 'COCINA'),
	('INTERIOR', 8, 'BAÑO'),
	('INTERIOR', 9, 'HABITACION'),
	('INTERIOR', 10, 'BALCON');
/*!40000 ALTER TABLE `sector` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.telefono
CREATE TABLE IF NOT EXISTS `telefono` (
  `id_telefono` int(11) NOT NULL AUTO_INCREMENT,
  `telefono` char(50) NOT NULL,
  `tipo_telefono` tinyint(4) NOT NULL,
  `nombre_telefono` char(50) NOT NULL,
  `id_edificio` int(11) NOT NULL,
  PRIMARY KEY (`id_telefono`),
  KEY `id_edificio` (`id_edificio`),
  CONSTRAINT `FK__departamento-telefono` FOREIGN KEY (`id_edificio`) REFERENCES `edificio` (`id_edificio`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.telefono: ~6 rows (aproximadamente)
DELETE FROM `telefono`;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` (`id_telefono`, `telefono`, `tipo_telefono`, `nombre_telefono`, `id_edificio`) VALUES
	(5, '911', 1, 'POLICIA/BOMBEROS', 1),
	(6, '107', 1, 'SAME', 1),
	(7, '103', 1, 'EMERGENCIAS GENERALES', 1),
	(8, '011 3598-2236', 2, 'ELECTRICISTA', 1),
	(9, '011 3649-5530', 2, 'PLOMERO', 1),
	(10, '011 3378-7307', 2, 'GASISTA', 1),
	(11, '011 4557-0087', 2, 'FUMIGADOR', 1);
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;

-- Volcando estructura para tabla proyecto.tipo_reclamo
CREATE TABLE IF NOT EXISTS `tipo_reclamo` (
  `tipo_reclamo` char(50) NOT NULL,
  `id_tipo_reclamo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_tipo_reclamo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla proyecto.tipo_reclamo: ~6 rows (aproximadamente)
DELETE FROM `tipo_reclamo`;
/*!40000 ALTER TABLE `tipo_reclamo` DISABLE KEYS */;
INSERT INTO `tipo_reclamo` (`tipo_reclamo`, `id_tipo_reclamo`) VALUES
	('PLOMERIA', 1),
	('ALBAÑILERIA', 2),
	('PINTURA', 3),
	('GASISTA', 4),
	('ELECTRICIDAD', 5),
	('FUMIGACION', 6);
/*!40000 ALTER TABLE `tipo_reclamo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
