
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
	`fecha` DATE NOT NULL,
	`hash` CHAR(250) NOT NULL,
	`id_genero` INT(10) NOT NULL,
	`id_autor` INT(10) NOT NULL,
	`image` CHAR(255) NOT NULL,
	`sinopsis` CHAR(255) NOT NULL,
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

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO `usuario` (`id`, `nick`, `nombre`, `mail`, `password`, `admin`) VALUES
(16, '', 'Tecla', 'tecla@tecla.com', 'drodriguez', 0),
(17, '', 'Fer', 'fer@fer.com', '123456', 0),
(18, '', 'admin', 'admin@admin.com', 'admin', 1),
(19, '', 'Prueba', 'prueba@prueba.com', 'prueba', 0),
(20, '', 'Jorge Miranda', 'jorge@jorge.com', '12345', 0),
(21, '', 'Rodo', 'rodo@rodo.com', '123456', 0),
(22, '', 'Chris', 'chris@chris.com', '123456', 0);