-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2015 a las 16:16:56
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
  PRIMARY KEY (`id`),
  KEY `FI_stad_usuario` (`id_usuario`),
  KEY `FI_stad_id_usuarioamigo` (`id_usuarioamigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiolibro`
--

CREATE TABLE IF NOT EXISTS `audiolibro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  `idlibro` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_iolibro_libro` (`idlibro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `puntuacion` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_libro` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificados`
--

CREATE TABLE IF NOT EXISTS `clasificados` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_libro` int(10) NOT NULL,
  `texto_corto` char(100) NOT NULL,
  `texto_largo` char(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_sificados_libro` (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `comentario` char(255) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_libro` int(10) NOT NULL,
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
  `id_genero` int(10) DEFAULT NULL,
  `autor` char(255) DEFAULT NULL,
  `image` char(255) DEFAULT NULL,
  `sinopsis` char(255) DEFAULT NULL,
  `fecha_ult_acc` date DEFAULT NULL,
  `hora_ult_acc` char(8) DEFAULT NULL,
  `usuario_ult_acc` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_ro_usuario_ult_acc` (`usuario_ult_acc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  `fecha` date NOT NULL,
  `id_visibilidad` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_taid_usuario` (`id_usuario`),
  KEY `FI_ta_genero` (`id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_audiolibro`
--

CREATE TABLE IF NOT EXISTS `lista_audiolibro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_audiolibro` int(10) NOT NULL,
  `id_lista` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_ta_audiolibro_audiolibro` (`id_audiolibro`),
  KEY `FI_ta_audiolibro_lista` (`id_lista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario_destinatario` int(10) NOT NULL,
  `id_usuario_remitente` int(10) NOT NULL,
  `mensaje` char(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_saje_usuario_detinatario` (`id_usuario_destinatario`),
  KEY `FI_saje_usuario_remitente` (`id_usuario_remitente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_emisor` int(10) NOT NULL,
  `id_receptor` int(10) NOT NULL,
  `descripcion` char(255) NOT NULL,
  `id_tipo_notificacion` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_ificacion_emisor` (`id_emisor`),
  KEY `FI_ificacion_receptor` (`id_receptor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantes`
--

CREATE TABLE IF NOT EXISTS `postulantes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_libro` int(10) NOT NULL,
  `id_postulante` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_tulantes_libro` (`id_libro`),
  KEY `FI_tulante_usuario` (`id_postulante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider_categ`
--

CREATE TABLE IF NOT EXISTS `slider_categ` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descrp` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `slider_categ`
--

INSERT INTO `slider_categ` (`id`, `descrp`) VALUES
(1, 'Lo mas recomendado'),
(2, 'Lo mas descargado'),
(3, 'Ultimos publicados'),
(4, 'Recomendados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider_mae`
--

CREATE TABLE IF NOT EXISTS `slider_mae` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_libro` int(10) NOT NULL,
  `posicion` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_der_mae_libro` (`id_libro`),
  KEY `FI_der_mae_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario_solicitado` int(10) NOT NULL,
  `id_usuario_solicitante` int(10) NOT NULL,
  `estado` int(10) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FI_icitud_usuario_solicitado` (`id_usuario_solicitado`),
  KEY `FI_icitud_usuario_solicitante` (`id_usuario_solicitante`)
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
-- Filtros para la tabla `amistad`
--
ALTER TABLE `amistad`
  ADD CONSTRAINT `amistad_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `amistad_id_usuarioamigo` FOREIGN KEY (`id_usuarioamigo`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `audiolibro`
--
ALTER TABLE `audiolibro`
  ADD CONSTRAINT `audiolibro_libro` FOREIGN KEY (`idlibro`) REFERENCES `libro` (`id`);

--
-- Filtros para la tabla `clasificados`
--
ALTER TABLE `clasificados`
  ADD CONSTRAINT `clasificados_libro` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_usuario_ult_acc` FOREIGN KEY (`usuario_ult_acc`) REFERENCES `usuario` (`id`);

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

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `listaid_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `lista_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`);

--
-- Filtros para la tabla `lista_audiolibro`
--
ALTER TABLE `lista_audiolibro`
  ADD CONSTRAINT `lista_audiolibro_audiolibro` FOREIGN KEY (`id_audiolibro`) REFERENCES `audiolibro` (`id`),
  ADD CONSTRAINT `lista_audiolibro_lista` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`id`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_usuario_detinatario` FOREIGN KEY (`id_usuario_destinatario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `mensaje_usuario_remitente` FOREIGN KEY (`id_usuario_remitente`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_emisor` FOREIGN KEY (`id_emisor`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `notificacion_receptor` FOREIGN KEY (`id_receptor`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD CONSTRAINT `postulantes_libro` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`),
  ADD CONSTRAINT `postulante_usuario` FOREIGN KEY (`id_postulante`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `slider_mae`
--
ALTER TABLE `slider_mae`
  ADD CONSTRAINT `slider_mae_libro` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id`),
  ADD CONSTRAINT `slider_mae_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `slider_categ` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_usuario_solicitado` FOREIGN KEY (`id_usuario_solicitado`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `solicitud_usuario_solicitante` FOREIGN KEY (`id_usuario_solicitante`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
