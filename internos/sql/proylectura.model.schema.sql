
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
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- audiolibro
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `audiolibro`;

CREATE TABLE `audiolibro`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(50) NOT NULL,
	`fecha` DATE NOT NULL,
	`hash` CHAR(250) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- autor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `autor`;

CREATE TABLE `autor`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nombre` CHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- calificacion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `calificacion`;

CREATE TABLE `calificacion`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`puntuacion` INT(10) NOT NULL,
	`comentario` CHAR(200) NOT NULL,
	`id_usuario` INT(10) NOT NULL,
	`id_lista` INT(10) NOT NULL,
	PRIMARY KEY (`id`)
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
	`hash` CHAR(250),
	`id_genero` INT(10),
	`id_autor` INT(10),
	`image` CHAR(255),
	`sinopsis` CHAR(255),
	`texto` LONGBLOB,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nick` CHAR(50) NOT NULL,
	`nombre` CHAR(50) NOT NULL,
	`mail` CHAR(100) NOT NULL,
	`password` CHAR(255) NOT NULL,
	`admin` INTEGER NOT NULL,
	PRIMARY KEY (`id`)
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
	`id_visibilidad` INT(10) NOT NULL,
	`id_usuario` INT(10) NOT NULL,
	`id_genero` INT(10) NOT NULL,
	PRIMARY KEY (`id`)
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
	PRIMARY KEY (`id`)
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
	`mensaje` CHAR(800) NOT NULL,
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
	`id_notificacion` INT(10) NOT NULL,
	`id_usuario` INT(10) NOT NULL,
	`descripcion` CHAR(100) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_ificacion_usuario` (`id_usuario`),
	CONSTRAINT `notificacion_usuario`
		FOREIGN KEY (`id_usuario`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- solicitud
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud`
(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_usuario_solicitado` INT(10) NOT NULL,
	`id_usuario_solicitante` INT(10) NOT NULL,
	`estado` INT(10) NOT NULL,
	`fecha` DATE NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_icitud_usuario_solicitado` (`id_usuario_solicitado`),
	INDEX `FI_icitud_usuario_solicitante` (`id_usuario_solicitante`),
	CONSTRAINT `solicitud_usuario_solicitado`
		FOREIGN KEY (`id_usuario_solicitado`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `solicitud_usuario_solicitante`
		FOREIGN KEY (`id_usuario_solicitante`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
