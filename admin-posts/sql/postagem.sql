-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `JumperLuko` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `JumperLuko` ;

CREATE TABLE IF NOT EXISTS `JumperLuko`.`user` (
  `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_user` VARCHAR(60) NOT NULL,
  `nickname_user` VARCHAR(45) NOT NULL,
  `password_user` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `id_user_UNIQUE` (`id_user` ASC),
  UNIQUE INDEX `nickname_user_UNIQUE` (`nickname_user` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `JumperLuko`.`categoryPost` (
  `id_categoryPost` INT UNSIGNED NOT NULL,
  `name_categoryPost` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_categoryPost`),
  UNIQUE INDEX `id_categoryPost_UNIQUE` (`id_categoryPost` ASC),
  UNIQUE INDEX `name_categoryPost_UNIQUE` (`name_categoryPost` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `JumperLuko`.`post` (
  `id_post` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_post` VARCHAR(45) NOT NULL,
  `imgCapa_post` VARCHAR(150) NULL,
  `post_post` TEXT NULL,
  `fk_categoryPost_post` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_post`, `fk_categoryPost_post`),
  INDEX `fkfk_categoryPost_post_idx` (`fk_categoryPost_post` ASC),
  UNIQUE INDEX `name_post_UNIQUE` (`name_post` ASC),
  UNIQUE INDEX `id_post_UNIQUE` (`id_post` ASC),
  CONSTRAINT `fkfk_categoryPost_post`
    FOREIGN KEY (`fk_categoryPost_post`)
    REFERENCES `JumperLuko`.`categoryPost` (`id_categoryPost`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `categoryPost` (`id_categoryPost`, `name_categoryPost`) VALUES ('0', 'nothing');
INSERT INTO `user` (`id_user`, `name_user`, `nickname_user`, `password_user`) VALUES ('1', 'Usuário Raiz', 'root', 'c14173849d7543f591683429af6bc22f55d1504f');
INSERT INTO post(name_post,post_post,fk_categoryPost_post) VALUES('exemplo','<h3>Se este exemplo retornou, a cunsulta <strong>funcionou</strong>.</h3><ul><li>Verifique se n&atilde;o avisos de erros e erros nos acentos.</li><li>Fa&ccedil;a um c&oacute;digo e uma interface agr&aacute;davel.</li><li>Agilize tudo que for poss&iacute;vel.</li></ul><p>Visite <a href="http://JumperLuko.com/">JumperLuko.com</a> para webDesign</p>','0');
