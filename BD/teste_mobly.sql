-- MySQL Script generated by MySQL Workbench
-- Fri May 10 02:36:35 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema teste_mobly
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema teste_mobly
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `teste_mobly` DEFAULT CHARACTER SET utf8 ;
USE `teste_mobly` ;

-- -----------------------------------------------------
-- Table `teste_mobly`.`TIME`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teste_mobly`.`TIME` (
  `id_time` INT NOT NULL AUTO_INCREMENT,
  `nome_time` VARCHAR(100) NULL,
  `cor_escudo` VARCHAR(7) NULL,
  `data_fundacao` DATE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id_time`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teste_mobly`.`JOGADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teste_mobly`.`JOGADOR` (
  `id_jogador` INT NOT NULL AUTO_INCREMENT,
  `nome_jogador` VARCHAR(100) NULL,
  `sobrenome_jogador` VARCHAR(100) NULL,
  `time` INT NULL,
  `numero_camisa` VARCHAR(3) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id_jogador`),
  INDEX `id_time_jogador_idx` (`time` ASC) VISIBLE,
  CONSTRAINT `id_time_jogador`
    FOREIGN KEY (`time`)
    REFERENCES `teste_mobly`.`TIME` (`id_time`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
