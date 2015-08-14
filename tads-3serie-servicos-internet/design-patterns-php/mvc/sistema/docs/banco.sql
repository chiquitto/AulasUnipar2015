CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `post` (
  `idpost` INT NOT NULL AUTO_INCREMENT,
  `idcategoria` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `texto` TEXT NULL,
  PRIMARY KEY (`idpost`),
  INDEX `fk_post_categoria_idx` (`idcategoria` ASC),
  CONSTRAINT `fk_post_categoria`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Esportes');
INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Politica');
INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Games');
