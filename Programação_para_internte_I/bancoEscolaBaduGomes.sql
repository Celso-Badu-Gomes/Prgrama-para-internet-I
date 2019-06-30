CREATE SCHEMA IF NOT EXISTS `escolabadugomes` DEFAULT CHARACTER SET latin1 ;
-- -----------------------------------------------------
-- Table `escolabadugomesok`.`turma`
-- -----------------------------------------------------

USE `escolabadugomes` ;

-- -----------------------------------------------------
-- Table `escolabadugomes`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escolabadugomes`.`aluno` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(60) CHARACTER SET 'utf8' NOT NULL,
  `pai` VARCHAR(80) CHARACTER SET 'utf8' NOT NULL,
  `mae` VARCHAR(80) CHARACTER SET 'utf8' NOT NULL,
  `endereco` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `genero` ENUM('m', 'f') CHARACTER SET 'utf8' NOT NULL,
  `dta_nasc` DATE NOT NULL,
  `nat` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `escolabadugomes`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escolabadugomes`.`disciplina` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  `ch` VARCHAR(10) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `escolabadugomes`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escolabadugomes`.`professor` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `escolabadugomes`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `escolabadugomes`.`turma` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(10) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

