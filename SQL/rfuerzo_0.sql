SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `rfuerzo` ;
CREATE SCHEMA IF NOT EXISTS `rfuerzo` DEFAULT CHARACTER SET latin1 ;
USE `rfuerzo` ;

-- -----------------------------------------------------
-- Table `rfuerzo`.`centro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rfuerzo`.`centro` ;

CREATE TABLE IF NOT EXISTS `rfuerzo`.`centro` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `direccion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `rfuerzo`.`profesor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rfuerzo`.`profesor` ;

CREATE TABLE IF NOT EXISTS `rfuerzo`.`profesor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `apellidos` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `mail` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL,
  `user` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `pass` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `nacimiento` DATETIME NULL DEFAULT NULL,
  `centro_id` INT(11) NOT NULL,
  `enlace_avatar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `es_admin` TINYINT(1) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `rfuerzo`.`alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rfuerzo`.`alumno` ;

CREATE TABLE IF NOT EXISTS `rfuerzo`.`alumno` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `apellidos` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `mail` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `user` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `pass` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `nacimiento` DATETIME NULL DEFAULT NULL,
  `centro_id` INT(11) NOT NULL,
  `enlace_avatar` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `profesor_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `rfuerzo`.`tema`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rfuerzo`.`tema` ;

CREATE TABLE IF NOT EXISTS `rfuerzo`.`tema` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `enlace` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `profesor_id` INT(11) NOT NULL,
  `titulo` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `enlace_imagen` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `rfuerzo`.`tarea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rfuerzo`.`tarea` ;

CREATE TABLE IF NOT EXISTS `rfuerzo`.`tarea` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `tema_id` INT(11) NOT NULL,
  `enlace_tarea` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 47
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `rfuerzo`.`resultado_tarea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rfuerzo`.`resultado_tarea` ;

CREATE TABLE IF NOT EXISTS `rfuerzo`.`resultado_tarea` (
  `alumno_id` INT(11) NOT NULL,
  `tarea_id` INT(11) NOT NULL,
  `nota` DECIMAL(3,2) NOT NULL,
  `activa` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`alumno_id`, `tarea_id`),
  INDEX `fk_alumno__alumno_idx` (`alumno_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
