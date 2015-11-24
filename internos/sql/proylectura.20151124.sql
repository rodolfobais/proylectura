-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-11-2015 a las 18:49:04
-- Versión del servidor: 5.5.41-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proylectura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amistad`
--

CREATE TABLE IF NOT EXISTS `amistad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `id_usuarioamigo` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiolibro`
--

CREATE TABLE IF NOT EXISTS `audiolibro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  `fecha` date NOT NULL,
  `hash` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nombre`) VALUES
(1, 'nuevo nombre'),
(2, 'asd2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `puntuacion` int(10) NOT NULL,
  `comentario` char(200) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_lista` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `genero`
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
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hash` char(250) DEFAULT NULL,
  `id_genero` int(10) DEFAULT NULL,
  `id_autor` int(10) DEFAULT NULL,
  `image` char(255) DEFAULT NULL,
  `sinopsis` char(255) DEFAULT NULL,
  `texto` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `nombre`, `fecha`, `hash`, `id_genero`, `id_autor`, `image`, `sinopsis`, `texto`) VALUES
(23, 'nombre', '2015-03-16', 'e568d2af36a83f287a1cb797c5614723', 16, 11, '/proylecturademo/web/images/a33.jpg', 'Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido', 0x6432567959335a6949484e6d646e4d675a6d4567633259675a79423349475a6c6479423364334967636d6367636d4a6949484a6e64334a6949484a6d5a513d3d),
(24, 'Documentacion sobre Proyecto Final', '2015-03-13', '5dcb764ff60d6ebf132adecd4ea12303', 16, 11, '/proylecturademo/web/images/a22.jpg', 'Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia', NULL),
(25, 'PHP para la Gilada', '2015-03-13', '238670b0d6888aef98f998fb716a86e2', 17, 12, '/proylecturademo/web/images/a11.jpg', 'Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa', NULL),
(26, 'Antes de que los cuelguen', '2015-03-13', 'e37f0eec006393c1de9aa1c3e7e8ca8c', 16, 13, '/proylecturademo/web/images/a33.jpg', 'Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido', NULL),
(27, 'Tesis sobre tabla periodica', '2015-03-15', '90f56bd0f535d1093e1c087263e0e005', 16, 16, '/proylecturademo/web/images/a22.jpg', 'Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia', NULL),
(28, 'El libro negro de la jardineria', '2015-03-15', 'd84e1857a90e8ddd008055279e6909d2', 17, 12, '/proylecturademo/web/images/a11.jpg', 'Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa', NULL),
(29, 'Matematica I', '2015-03-15', '661687491b82569f0290cf33f2bfb12b', 17, 11, '/proylecturademo/web/images/a33.jpg', 'Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido', NULL),
(30, 'La biblia del bromista', '2015-03-15', 'e6a355c23a039564a9fc740b6ff60706', 17, 12, '/proylecturademo/web/images/a22.jpg', 'Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia', NULL),
(31, 'Las 2 torres', '2015-03-15', '9809d337922c7fa7c5e9dbb35702e2c3', 17, 13, '/proylecturademo/web/images/a11.jpg', 'Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa', NULL),
(32, 'Todo sobre impresoras', '2015-03-16', '4b4d6140f216802c3e7d32d9e1977fd9', 16, 11, '/proylecturademo/web/images/a33.jpg', 'Inspirada en el universo de Star Trek, viajeros perdidos en un planeta desconocido', NULL),
(33, 'mate demo', '2015-03-24', '9c2213945fdc433ccee8115a372de568', 24, 20, '/proylecturademo/web/images/a22.jpg', 'Ensayo de materiales de PVC para utilizacion en laboratorio de microbiologia', NULL),
(34, 'pepe argento', '2015-04-02', 'bb081356e47eea563de4a070db814d6d', 20, 20, '/proylecturademo/web/images/a11.jpg', 'Proyecto de educacion de la ciudad de mexico, material docente de calidad educativa', NULL),
(35, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_colaborador`
--

CREATE TABLE IF NOT EXISTS `libro_colaborador` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idlibro` int(10) NOT NULL,
  `idusuario` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_ro_colaborador_libro` (`idlibro`),
  KEY `FI_ro_colaborador_usuario` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `libro_colaborador`
--

INSERT INTO `libro_colaborador` (`id`, `idlibro`, `idusuario`) VALUES
(1, 23, 18),
(2, 24, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_version`
--

CREATE TABLE IF NOT EXISTS `libro_version` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idlibro` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` char(8) NOT NULL,
  `idusuario` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_ro_version_libro` (`idlibro`),
  KEY `FI_ro_version_usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nick` char(50) NOT NULL,
  `nombre` char(50) NOT NULL,
  `mail` char(100) NOT NULL,
  `password` char(255) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `nombre`, `mail`, `password`, `admin`) VALUES
(16, '', 'Tecla', 'tecla@tecla.com', 'drodriguez', 0),
(17, 'esrdgfhgjhk', 'Fer', 'fer@fer.com', '123456', 0),
(18, '', 'admin', 'admin@admin.com', 'admin', 1),
(20, '', 'Jorge Miranda', 'jorge@jorge.com', '12345', 0),
(21, 'roooooo', 'Rodo', 'rodo@rodo.com', '123456', 0),
(22, '', 'Chris', 'chris@chris.com', '123456', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro_colaborador`
--
ALTER TABLE `libro_colaborador`
  ADD CONSTRAINT `libro_colaborador_libro` FOREIGN KEY (`idlibro`) REFERENCES `libro` (`id`),
  ADD CONSTRAINT `libro_colaborador_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `libro_version`
--
ALTER TABLE `libro_version`
  ADD CONSTRAINT `libro_version_libro` FOREIGN KEY (`idlibro`) REFERENCES `libro` (`id`),
  ADD CONSTRAINT `libro_version_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
