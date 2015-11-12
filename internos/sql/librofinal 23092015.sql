-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2015 at 12:56 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `librofinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `amistad`
--

CREATE TABLE IF NOT EXISTS `amistad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_usuarioamigo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `amistad`
--

INSERT INTO `amistad` (`id`, `id_usuario`, `id_usuarioamigo`, `estado`) VALUES
(3, 17, 16, 1),
(4, 19, 20, 1),
(5, 19, 20, 0),
(6, 19, 20, 0),
(7, 20, 17, 0),
(8, 20, 16, 0),
(9, 19, 20, 1),
(10, 20, 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `audiolibro`
--

CREATE TABLE IF NOT EXISTS `audiolibro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `fecha` datetime NOT NULL,
  `hash` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `audiolibro`
--

INSERT INTO `audiolibro` (`id`, `nombre`, `fecha`, `hash`) VALUES
(1, '1 test 20-09', '2015-09-20 21:45:21', 'a7d339132febc815e13e8ab14cb1e6d5'),
(2, '2 test 20-09', '2015-09-20 21:49:30', '1eae5f605a12925bc4cedc6f1718f527');

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `nombre`) VALUES
(11, 'John Grisman'),
(12, 'Pablo Neruda'),
(13, 'Jorge Luis Borges'),
(14, 'scott Bakker'),
(15, 'Joe Abercrobie'),
(16, 'Tolkin'),
(17, 'George Martin'),
(18, 'Dr Aguilar'),
(19, 'Ing. Soult'),
(20, 'Jorge Miranda');

-- --------------------------------------------------------

--
-- Table structure for table `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `puntuacion` int(11) NOT NULL,
  `comentario` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_usuario_2` (`id_usuario`),
  KEY `id_lista` (`id_lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `calificacion`
--

INSERT INTO `calificacion` (`id`, `puntuacion`, `comentario`, `id_usuario`, `id_lista`) VALUES
(3, 1, '', 16, 37),
(4, 1, '', 17, 37),
(5, 1, '', 17, 41),
(6, 1, '', 19, 44),
(7, 1, '', 19, 47),
(8, 1, '', 20, 37);

-- --------------------------------------------------------

--
-- Table structure for table `compartido`
--

CREATE TABLE IF NOT EXISTS `compartido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_lista` (`id_lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `compartido`
--

INSERT INTO `compartido` (`id`, `id_usuario`, `id_lista`) VALUES
(3, 16, 40);

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(16, 'Aventura'),
(17, 'Fantasia'),
(18, 'Infantil'),
(19, 'Terror'),
(20, 'Policial'),
(21, 'Ciencia'),
(22, 'informatica'),
(23, 'Medicina'),
(24, 'Educacion');

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha` datetime NOT NULL,
  `hash` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sinopsis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_autor` (`id_autor`),
  KEY `id_genero` (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id`, `nombre`, `fecha`, `hash`, `id_genero`, `id_autor`, `image`, `sinopsis`) VALUES
(23, 'Apuntes de la UNLaM', '2015-03-16 16:31:15', 'e568d2af36a83f287a1cb797c5614723', 16, 11, '/proylecturademo/web/images/a33.jpg', 'Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido'),
(24, 'Documentacion sobre Proyecto Final', '2015-03-13 16:31:43', '5dcb764ff60d6ebf132adecd4ea12303', 16, 11, '/proylecturademo/web/images/a22.jpg', 'Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia'),
(25, 'PHP para la Gilada', '2015-03-13 16:52:50', '238670b0d6888aef98f998fb716a86e2', 17, 12, '/proylecturademo/web/images/a11.jpg', 'Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa'),
(26, 'Antes de que los cuelguen', '2015-03-13 16:53:16', 'e37f0eec006393c1de9aa1c3e7e8ca8c', 16, 13, '/proylecturademo/web/images/a33.jpg', 'Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido'),
(27, 'Tesis sobre tabla periodica', '2015-03-15 01:00:32', '90f56bd0f535d1093e1c087263e0e005', 16, 16, '/proylecturademo/web/images/a22.jpg', 'Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia'),
(28, 'El libro negro de la jardineria', '2015-03-15 01:02:15', 'd84e1857a90e8ddd008055279e6909d2', 17, 12, '/proylecturademo/web/images/a11.jpg', 'Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa'),
(29, 'Matematica I', '2015-03-15 01:02:33', '661687491b82569f0290cf33f2bfb12b', 17, 11, '/proylecturademo/web/images/a33.jpg', 'Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido'),
(30, 'La biblia del bromista', '2015-03-15 01:03:35', 'e6a355c23a039564a9fc740b6ff60706', 17, 12, '/proylecturademo/web/images/a22.jpg', 'Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia'),
(31, 'Las 2 torres', '2015-03-15 01:03:55', '9809d337922c7fa7c5e9dbb35702e2c3', 17, 13, '/proylecturademo/web/images/a11.jpg', 'Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa'),
(32, 'Todo sobre impresoras', '2015-03-16 20:06:31', '4b4d6140f216802c3e7d32d9e1977fd9', 16, 11, '/proylecturademo/web/images/a33.jpg', 'Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido'),
(33, 'mate demo', '2015-03-24 18:04:35', '9c2213945fdc433ccee8115a372de568', 24, 20, '/proylecturademo/web/images/a22.jpg', 'Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia'),
(34, 'pepe argento', '2015-04-02 00:27:39', 'bb081356e47eea563de4a070db814d6d', 20, 20, '/proylecturademo/web/images/a11.jpg', 'Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa');

-- --------------------------------------------------------

--
-- Table structure for table `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha` datetime NOT NULL,
  `id_visibilidad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_control` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_visiblilidad` (`id_visibilidad`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `lista`
--

INSERT INTO `lista` (`id`, `nombre`, `fecha`, `id_visibilidad`, `id_usuario`, `id_control`, `id_genero`) VALUES
(37, 'ciencia publico', '2015-03-13 16:38:10', 1, 16, 1, 16),
(38, 'libros Privada', '2015-03-13 16:39:50', 1, 16, 1, 16),
(39, 'Varios', '2015-03-13 16:53:58', 1, 17, 1, 16),
(40, 'programacion', '2015-03-13 16:57:48', 1, 17, 1, 17),
(41, 'Varios Publica', '2015-03-13 16:58:20', 1, 17, 1, 18),
(42, 'Variado', '2015-03-15 01:07:30', 1, 20, 1, 17),
(43, 'de todo', '2015-03-15 01:11:13', 1, 20, 1, 16),
(44, 'Ensayo sobre materiales', '2015-03-15 01:12:37', 1, 20, 1, 16),
(45, 'test mi lista libros', '2015-03-23 20:39:17', 1, 18, 1, 20),
(46, 'test mi lista libros', '2015-03-23 20:40:19', 1, 18, 1, 20),
(47, 'test2', '2015-03-23 20:42:54', 1, 19, 1, 20),
(48, 'ejemplo 1', '2015-03-24 01:47:27', 1, 20, 1, 20),
(49, 'ejemplo 2', '2015-03-24 01:55:35', 1, 20, 1, 21),
(50, 'ejemplo 3', '2015-03-24 17:25:17', 1, 20, 1, 16),
(51, 'ejemplo4', '2015-03-24 18:04:48', 1, 20, 1, 16),
(52, 'mi jardin', '2015-03-24 22:49:58', 1, 20, 1, 19),
(53, 'mi lista nueva', '2015-04-02 00:28:47', 1, 20, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `lista_audiolibro`
--

CREATE TABLE IF NOT EXISTS `lista_audiolibro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_audiolibro` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lista_libro`
--

CREATE TABLE IF NOT EXISTS `lista_libro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_libro` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_libro` (`id_libro`),
  KEY `id_lista` (`id_lista`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `lista_libro`
--

INSERT INTO `lista_libro` (`id`, `id_libro`, `id_lista`) VALUES
(84, 23, 37),
(85, 24, 37),
(86, 23, 38),
(87, 24, 38),
(90, 25, 40),
(91, 25, 40),
(92, 25, 40),
(93, 25, 41),
(94, 25, 41),
(95, 25, 41),
(96, 26, 41),
(97, 26, 41),
(98, 26, 41),
(99, 23, 42),
(100, 26, 42),
(101, 30, 42),
(102, 29, 42),
(103, 28, 42),
(104, 31, 42),
(105, 25, 42),
(106, 27, 42),
(107, 23, 43),
(108, 28, 43),
(109, 31, 43),
(110, 25, 43),
(111, 27, 43),
(112, 25, 44),
(113, 27, 44),
(114, 30, 44),
(115, 31, 44);

-- --------------------------------------------------------

--
-- Table structure for table `reproducido`
--

CREATE TABLE IF NOT EXISTS `reproducido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_lista` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slider_categ`
--

CREATE TABLE IF NOT EXISTS `slider_categ` (
  `id` int(11) NOT NULL,
  `descrp` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `slider_categ`
--

INSERT INTO `slider_categ` (`id`, `descrp`) VALUES
(1, 'Lo mas recomendado'),
(2, 'Lo mas descargado'),
(3, 'Ultimos publicados');

-- --------------------------------------------------------

--
-- Table structure for table `slider_mae`
--

CREATE TABLE IF NOT EXISTS `slider_mae` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_libro` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Dumping data for table `slider_mae`
--

INSERT INTO `slider_mae` (`id`, `id_libro`, `posicion`, `categoria`) VALUES
(1, 23, 1, 1),
(6, 24, 2, 1),
(7, 25, 3, 1),
(8, 24, 1, 2),
(9, 23, 2, 2),
(10, 25, 3, 2),
(11, 25, 1, 3),
(12, 24, 2, 3),
(13, 23, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE IF NOT EXISTS `useronline` (
  `timestamp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(40) NOT NULL DEFAULT '',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`timestamp`,`ip`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useronline`
--

INSERT INTO `useronline` (`timestamp`, `ip`, `id_usuario`) VALUES
(1428100549, '::1', 20),
(1428100700, '::1', 20),
(1428100696, '::1', 20),
(1428100553, '::1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(50) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `nombre`, `mail`, `password`, `admin`) VALUES
(16, '', 'Tecla', 'tecla@tecla.com', 'drodriguez', 0),
(17, '', 'Fer', 'fer@fer.com', '123456', 0),
(18, '', 'admin', 'admin@admin.com', 'admin', 1),
(19, '', 'Prueba', 'prueba@prueba.com', 'prueba', 0),
(20, '', 'Jorge Miranda', 'jorge@jorge.com', '12345', 0),
(21, '', 'Rodo', 'rodo@rodo.com', '123456', 0),
(22, '', 'Chris', 'chris@chris.com', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visibilidad`
--

CREATE TABLE IF NOT EXISTS `visibilidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `visibilidad`
--

INSERT INTO `visibilidad` (`id`, `estado`) VALUES
(1, 'Publico');

-- --------------------------------------------------------

--
-- Table structure for table `visto`
--

CREATE TABLE IF NOT EXISTS `visto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_lista` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_lista` (`id_lista`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `visto`
--

INSERT INTO `visto` (`id`, `fecha`, `id_lista`, `id_usuario`) VALUES
(29, '2015-03-13 16:41:14', 38, 16),
(30, '2015-03-13 16:45:52', 37, 16),
(31, '2015-03-13 17:00:24', 40, 17),
(32, '2015-03-13 17:04:34', 41, 17),
(33, '2015-03-14 17:56:23', 37, 19),
(34, '2015-03-14 17:56:52', 41, 19),
(35, '2015-03-14 17:56:57', 37, 19),
(36, '2015-03-14 17:56:58', 37, 19),
(37, '2015-03-14 17:57:08', 41, 19),
(38, '2015-03-15 01:14:04', 42, 20);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`id`);

--
-- Constraints for table `compartido`
--
ALTER TABLE `compartido`
  ADD CONSTRAINT `compartido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `compartido_ibfk_2` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`id`);

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`);

--
-- Constraints for table `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `lista_libro`
--
ALTER TABLE `lista_libro`
  ADD CONSTRAINT `lista_libro_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`),
  ADD CONSTRAINT `lista_libro_ibfk_2` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`id`);

--
-- Constraints for table `visto`
--
ALTER TABLE `visto`
  ADD CONSTRAINT `visto_ibfk_1` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`id`),
  ADD CONSTRAINT `visto_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
