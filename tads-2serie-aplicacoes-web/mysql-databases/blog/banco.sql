CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT COMMENT,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB;

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

INSERT INTO `usuario` (`idusuario`, `nome`, `login`, `senha`) VALUES (NULL, 'Alisson Chiquitto', 'admin', 'admin');

INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Esportes');
INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Politica');
INSERT INTO `categoria` (`idcategoria`, `categoria`) VALUES (NULL, 'Games');

INSERT INTO `post` (`idcategoria`, `titulo`, `texto`) VALUES (1, 'Jogo de Futebol', 'Neste ultimo final de semana, os times jogaram ...');
INSERT INTO `post` (`idcategoria`, `titulo`, `texto`) VALUES (1, 'Mundial de Voley', 'O Brasil venceu a seleção da Servia e Montenegro');
INSERT INTO `post` (`idcategoria`, `titulo`, `texto`) VALUES (3, 'Lançamento de Call Of Dutty XXI', 'Nesta semana será lançado o novo jogo da série Call Of Dutty');
