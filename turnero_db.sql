-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema turnero
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema turnero
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `turnero` DEFAULT CHARACTER SET utf8 ;
USE `turnero` ;

-- -----------------------------------------------------
-- Table `turnero`.`entity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`entity` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turnero`.`sub_entity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`sub_entity` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `idEntity` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_subEntity_entity_idx` (`idEntity` ASC),
  CONSTRAINT `fk_subEntity_entity`
    FOREIGN KEY (`idEntity`)
    REFERENCES `turnero`.`entity` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turnero`.`box`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`box` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  `idSubEntity` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_box_sub_entity_idx` (`idSubEntity` ASC),
  CONSTRAINT `fk_box_sub_entity`
    FOREIGN KEY (`idSubEntity`)
    REFERENCES `turnero`.`sub_entity` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turnero`.`prefix`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`prefix` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `prefix` CHAR(5) NOT NULL,
  `from` INT(11) UNSIGNED NOT NULL,
  `to` INT(11) NOT NULL,
  `priority` INT(11) NULL DEFAULT NULL,
  `idSubEntity` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_prefix_subEntity_idx` (`idSubEntity` ASC),
  CONSTRAINT `fk_prefix_subEntity`
    FOREIGN KEY (`idSubEntity`)
    REFERENCES `turnero`.`sub_entity` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turnero`.`number`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`number` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `number` INT(11) NOT NULL,
  `code` VARCHAR(255) NOT NULL,
  `start` DATETIME NOT NULL,
  `recalls` INT NULL DEFAULT 0,
  `end` DATETIME NULL DEFAULT NULL,
  `idPrefix` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_number_prefix_idx` (`idPrefix` ASC),
  CONSTRAINT `fk_number_prefix`
    FOREIGN KEY (`idPrefix`)
    REFERENCES `turnero`.`prefix` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turnero`.`call`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`call` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `idNumber` BIGINT(20) NOT NULL,
  `idBox` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_call_number_idx` (`idNumber` ASC),
  INDEX `fk_call_box_idx` (`idBox` ASC),
  CONSTRAINT `fk_call_box`
    FOREIGN KEY (`idBox`)
    REFERENCES `turnero`.`box` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_call_number`
    FOREIGN KEY (`idNumber`)
    REFERENCES `turnero`.`number` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turnero`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`password_resets` (
  `email` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `token` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `turnero`.`printer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`printer` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `ip` VARCHAR(20) NOT NULL,
  `port` INT(11) NOT NULL,
  `selected` BINARY(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turnero`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lastName` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `firstName` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL,
  `idBox` INT(11) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC),
  INDEX `fk_users_box1_idx` (`idBox` ASC),
  CONSTRAINT `fk_users_box1`
    FOREIGN KEY (`idBox`)
    REFERENCES `turnero`.`box` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `turnero`.`file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turnero`.`file` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `path` VARCHAR(255) NOT NULL,
  `extension` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
