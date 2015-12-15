
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- amistad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `amistad`;

CREATE TABLE `amistad`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_usuario` INT(10) NOT NULL,
	`id_usuarioamigo` INT(10) NOT NULL,
	`estado` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_stad_usuario` (`id_usuario`),
	INDEX `FI_stad_id_usuarioamigo` (`id_usuarioamigo`),
	CONSTRAINT `amistad_usuario`
		FOREIGN KEY (`id_usuario`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `amistad_id_usuarioamigo`
		FOREIGN KEY (`id_usuarioamigo`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- audiolibro
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `audiolibro`;

CREATE TABLE `audiolibro`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(50) NOT NULL,
	`idlibro` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_iolibro_libro` (`idlibro`),
	CONSTRAINT `audiolibro_libro`
		FOREIGN KEY (`idlibro`)
		REFERENCES `libro` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- calificacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `calificacion`;

CREATE TABLE `calificacion`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`puntuacion` INT(10) NOT NULL,
	`id_usuario` INT(10) NOT NULL,
	`id_libro` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_ificacion_usuario` (`id_usuario`),
	INDEX `FI_ificacion_libro` (`id_libro`),
	CONSTRAINT `calificacion_usuario`
		FOREIGN KEY (`id_usuario`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `calificacion_libro`
		FOREIGN KEY (`id_libro`)
		REFERENCES `libro` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- comentario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `comentario`;

CREATE TABLE `comentario`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`comentario` CHAR(255) NOT NULL,
	`id_usuario` INT(10) NOT NULL,
	`id_libro` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_entario_usuario` (`id_usuario`),
	INDEX `FI_entario_libro` (`id_libro`),
	CONSTRAINT `comentario_usuario`
		FOREIGN KEY (`id_usuario`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `comentario_libro`
		FOREIGN KEY (`id_libro`)
		REFERENCES `libro` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- genero
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `genero`;

CREATE TABLE `genero`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- libro
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `libro`;

CREATE TABLE `libro`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(50) NOT NULL,
	`fecha` DATE,
	`id_genero` INT(10),
	`autor` CHAR(255),
	`image` CHAR(255),
	`sinopsis` CHAR(255),
	`fecha_ult_acc` DATE,
	`hora_ult_acc` CHAR(8),
	`usuario_ult_acc` INT(10),
	`id_privacidad` INT(10),
	`es_editable` CHAR(1),
	`id_usuario` INT(10),
	`debaja` CHAR(1),
	`estado` CHAR(1),
	PRIMARY KEY (`id`),
	INDEX `FI_ro_usuario_ult_acc` (`usuario_ult_acc`),
	INDEX `FI_ro_privacidad` (`id_privacidad`),
	INDEX `FI_ro_genero` (`id_genero`),
	INDEX `FI_ro_id_usuario` (`id_usuario`),
	CONSTRAINT `libro_usuario_ult_acc`
		FOREIGN KEY (`usuario_ult_acc`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `libro_privacidad`
		FOREIGN KEY (`id_privacidad`)
		REFERENCES `privacidad` (`id`),
	CONSTRAINT `libro_genero`
		FOREIGN KEY (`id_genero`)
		REFERENCES `genero` (`id`),
	CONSTRAINT `libro_id_usuario`
		FOREIGN KEY (`id_usuario`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- privacidad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `privacidad`;

CREATE TABLE `privacidad`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(255) NOT NULL,
	`mail` CHAR(100) NOT NULL,
	`password` CHAR(255) NOT NULL,
	`admin` INTEGER NOT NULL,
	`educacion` CHAR(255),
	`lugar` CHAR(255),
	`nota` CHAR(255),
	`estado` CHAR(1),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuario_intereses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario_intereses`;

CREATE TABLE `usuario_intereses`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_usuario` INT(10) NOT NULL,
	`id_genero` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_ereses_usuario` (`id_usuario`),
	INDEX `FI_ereses_genero` (`id_genero`),
	CONSTRAINT `intereses_usuario`
		FOREIGN KEY (`id_usuario`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `intereses_genero`
		FOREIGN KEY (`id_genero`)
		REFERENCES `genero` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- lista
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lista`;

CREATE TABLE `lista`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(50) NOT NULL,
	`fecha` DATE NOT NULL,
	`id_usuario` INT(10) NOT NULL,
	`id_genero` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_taid_usuario` (`id_usuario`),
	INDEX `FI_ta_genero` (`id_genero`),
	CONSTRAINT `listaid_usuario`
		FOREIGN KEY (`id_usuario`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `lista_genero`
		FOREIGN KEY (`id_genero`)
		REFERENCES `genero` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- lista_audiolibro
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lista_audiolibro`;

CREATE TABLE `lista_audiolibro`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_audiolibro` INT(10) NOT NULL,
	`id_lista` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_ta_audiolibro_audiolibro` (`id_audiolibro`),
	INDEX `FI_ta_audiolibro_lista` (`id_lista`),
	CONSTRAINT `lista_audiolibro_audiolibro`
		FOREIGN KEY (`id_audiolibro`)
		REFERENCES `audiolibro` (`id`),
	CONSTRAINT `lista_audiolibro_lista`
		FOREIGN KEY (`id_lista`)
		REFERENCES `lista` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- libro_colaborador
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `libro_colaborador`;

CREATE TABLE `libro_colaborador`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`idlibro` INT(10) NOT NULL,
	`idusuario` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_ro_colaborador_libro` (`idlibro`),
	INDEX `FI_ro_colaborador_usuario` (`idusuario`),
	CONSTRAINT `libro_colaborador_libro`
		FOREIGN KEY (`idlibro`)
		REFERENCES `libro` (`id`),
	CONSTRAINT `libro_colaborador_usuario`
		FOREIGN KEY (`idusuario`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- libro_version
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `libro_version`;

CREATE TABLE `libro_version`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`idlibro` INT(10) NOT NULL,
	`fecha` DATE NOT NULL,
	`hora` CHAR(8) NOT NULL,
	`idusuario` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_ro_version_libro` (`idlibro`),
	INDEX `FI_ro_version_usuario` (`idusuario`),
	CONSTRAINT `libro_version_libro`
		FOREIGN KEY (`idlibro`)
		REFERENCES `libro` (`id`),
	CONSTRAINT `libro_version_usuario`
		FOREIGN KEY (`idusuario`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- mensaje
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `mensaje`;

CREATE TABLE `mensaje`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_usuario_destinatario` INT(10) NOT NULL,
	`id_usuario_remitente` INT(10) NOT NULL,
	`mensaje` CHAR(255) NOT NULL,
	`leido` CHAR(1),
	PRIMARY KEY (`id`),
	INDEX `FI_saje_usuario_detinatario` (`id_usuario_destinatario`),
	INDEX `FI_saje_usuario_remitente` (`id_usuario_remitente`),
	CONSTRAINT `mensaje_usuario_detinatario`
		FOREIGN KEY (`id_usuario_destinatario`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `mensaje_usuario_remitente`
		FOREIGN KEY (`id_usuario_remitente`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- notificacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `notificacion`;

CREATE TABLE `notificacion`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_emisor` INT(10) NOT NULL,
	`id_receptor` INT(10) NOT NULL,
	`descripcion` CHAR(255) NOT NULL,
	`id_tipo_notificacion` INT(10) NOT NULL,
	`leido` CHAR(1),
	PRIMARY KEY (`id`),
	INDEX `FI_ificacion_emisor` (`id_emisor`),
	INDEX `FI_ificacion_receptor` (`id_receptor`),
	INDEX `FI_ificacion_tiponotificacion` (`id_tipo_notificacion`),
	CONSTRAINT `notificacion_emisor`
		FOREIGN KEY (`id_emisor`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `notificacion_receptor`
		FOREIGN KEY (`id_receptor`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `notificacion_tiponotificacion`
		FOREIGN KEY (`id_tipo_notificacion`)
		REFERENCES `tipo_notificacion` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo_notificacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_notificacion`;

CREATE TABLE `tipo_notificacion`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(50) NOT NULL,
	`imagen` CHAR(150) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- solicitud_amistad
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud_amistad`;

CREATE TABLE `solicitud_amistad`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_usuario_solicitado` INT(10) NOT NULL,
	`id_usuario_solicitante` INT(10) NOT NULL,
	`estado` INT(1) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_icitud_amistad_usuario_solicitado` (`id_usuario_solicitado`),
	INDEX `FI_icitud_amistad_usuario_solicitante` (`id_usuario_solicitante`),
	CONSTRAINT `solicitud_amistad_usuario_solicitado`
		FOREIGN KEY (`id_usuario_solicitado`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `solicitud_amistad_usuario_solicitante`
		FOREIGN KEY (`id_usuario_solicitante`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- solicitud
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_libro` INT(10) NOT NULL,
	`id_usuario_solicitante` INT(10) NOT NULL,
	`id_estado` INT(10) NOT NULL,
	`fecha_solic` DATE,
	`hora_solic` CHAR(8),
	`fecha_aprob` DATE,
	`hora_aprob` CHAR(8),
	PRIMARY KEY (`id`),
	INDEX `FI_icitud_libro` (`id_libro`),
	INDEX `FI_icitud_usuario_solicitante` (`id_usuario_solicitante`),
	INDEX `FI_icitud_estado` (`id_estado`),
	CONSTRAINT `solicitud_libro`
		FOREIGN KEY (`id_libro`)
		REFERENCES `libro` (`id`),
	CONSTRAINT `solicitud_usuario_solicitante`
		FOREIGN KEY (`id_usuario_solicitante`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `solicitud_estado`
		FOREIGN KEY (`id_estado`)
		REFERENCES `solicitud_estado` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- solicitud_estado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud_estado`;

CREATE TABLE `solicitud_estado`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`descrp` CHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- slider_categ
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `slider_categ`;

CREATE TABLE `slider_categ`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`descrp` CHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- slider_mae
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `slider_mae`;

CREATE TABLE `slider_mae`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_libro` INT(10) NOT NULL,
	`posicion` INT(10) NOT NULL,
	`id_categoria` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_der_mae_libro` (`id_libro`),
	INDEX `FI_der_mae_categoria` (`id_categoria`),
	CONSTRAINT `slider_mae_libro`
		FOREIGN KEY (`id_libro`)
		REFERENCES `libro` (`id`),
	CONSTRAINT `slider_mae_categoria`
		FOREIGN KEY (`id_categoria`)
		REFERENCES `slider_categ` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- postulantes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `postulantes`;

CREATE TABLE `postulantes`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_libro` INT(10) NOT NULL,
	`id_postulante` INT(10) NOT NULL,
	`estado` INT(10) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_tulantes_libro` (`id_libro`),
	INDEX `FI_tulante_usuario` (`id_postulante`),
	CONSTRAINT `postulantes_libro`
		FOREIGN KEY (`id_libro`)
		REFERENCES `libro` (`id`),
	CONSTRAINT `postulante_usuario`
		FOREIGN KEY (`id_postulante`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- clasificados
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `clasificados`;

CREATE TABLE `clasificados`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_libro` INT(10) NOT NULL,
	`texto_corto` CHAR(100) NOT NULL,
	`texto_largo` CHAR(250) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_sificados_libro` (`id_libro`),
	CONSTRAINT `clasificados_libro`
		FOREIGN KEY (`id_libro`)
		REFERENCES `libro` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
