-- MySQL Script generated by MySQL Workbench
-- Thu 09 Jul 2015 05:20:13 PM BRT
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema vendas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cidade` (
  `idcidade` INT NOT NULL AUTO_INCREMENT,
  `cidade` VARCHAR(45) NOT NULL,
  `uf` CHAR(2) NOT NULL,
  PRIMARY KEY (`idcidade`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `situacao` CHAR(1) NOT NULL,
  `idcidade` INT NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`idcliente`),
  INDEX `fk_cliente_cidade1_idx` (`idcidade` ASC),
  CONSTRAINT `fk_cliente_cidade1`
    FOREIGN KEY (`idcidade`)
    REFERENCES `cidade` (`idcidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NOT NULL,
  `situacao` CHAR(1) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produto` (
  `idproduto` INT(11) NOT NULL AUTO_INCREMENT,
  `produto` VARCHAR(100) NOT NULL,
  `precocompra` DECIMAL(8,2) NOT NULL,
  `precovenda` DECIMAL(8,2) NOT NULL,
  `situacao` CHAR(1) NOT NULL,
  `idcategoria` INT NOT NULL,
  `saldo` INT NOT NULL,
  PRIMARY KEY (`idproduto`),
  INDEX `fk_produto_categoria_idx` (`idcategoria` ASC),
  CONSTRAINT `fk_produto_categoria`
    FOREIGN KEY (`idcategoria`)
    REFERENCES `categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` CHAR(32) NOT NULL,
  `situacao` CHAR(1) NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `venda` (
  `idvenda` INT NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL,
  `idcliente` INT(11) NOT NULL,
  `situacao` CHAR(1) NOT NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`idvenda`),
  INDEX `fk_venda_cliente1_idx` (`idcliente` ASC),
  INDEX `fk_venda_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`idcliente`)
    REFERENCES `cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vendaitem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendaitem` (
  `idproduto` INT(11) NOT NULL,
  `idvenda` INT NOT NULL,
  `preco` DECIMAL(8,2) NOT NULL,
  `precopago` DECIMAL(8,2) NOT NULL,
  `qtd` INT NOT NULL,
  PRIMARY KEY (`idproduto`, `idvenda`),
  INDEX `fk_produto_has_venda_venda1_idx` (`idvenda` ASC),
  INDEX `fk_produto_has_venda_produto1_idx` (`idproduto` ASC),
  CONSTRAINT `fk_produto_has_venda_produto1`
    FOREIGN KEY (`idproduto`)
    REFERENCES `produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_venda_venda1`
    FOREIGN KEY (`idvenda`)
    REFERENCES `venda` (`idvenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `cidade`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `cidade` (`idcidade`, `cidade`, `uf`) VALUES (1, 'Cianorte', 'PR');
INSERT INTO `cidade` (`idcidade`, `cidade`, `uf`) VALUES (2, 'Maringa', 'PR');
INSERT INTO `cidade` (`idcidade`, `cidade`, `uf`) VALUES (3, 'Brasilia', 'DF');
INSERT INTO `cidade` (`idcidade`, `cidade`, `uf`) VALUES (4, 'Manaus', 'AM');

COMMIT;


-- -----------------------------------------------------
-- Data for table `cliente`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `cliente` (`idcliente`, `nome`, `email`, `situacao`, `idcidade`, `cpf`) VALUES (NULL, 'Alisson Chiquitto', 'chiquitto@unipar.br', '1', 1, '11111111111');
INSERT INTO `cliente` (`idcliente`, `nome`, `email`, `situacao`, `idcidade`, `cpf`) VALUES (NULL, 'Jose Raimundo', 'jose@gmail.com', '1', 2, '22222222222');
INSERT INTO `cliente` (`idcliente`, `nome`, `email`, `situacao`, `idcidade`, `cpf`) VALUES (NULL, 'Ronaldinho Gaucho', 'r10@gmail.com', '1', 3, '33333333333');

COMMIT;


-- -----------------------------------------------------
-- Data for table `categoria`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `categoria` (`idcategoria`, `categoria`, `situacao`) VALUES (1, 'Refrigerantes', '1');
INSERT INTO `categoria` (`idcategoria`, `categoria`, `situacao`) VALUES (2, 'Sanduiches', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `produto`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `produto` (`idproduto`, `produto`, `precocompra`, `precovenda`, `situacao`, `idcategoria`, `saldo`) VALUES (NULL, 'Coca Cola Lata', 2, 2.5, '1', 1, 10);
INSERT INTO `produto` (`idproduto`, `produto`, `precocompra`, `precovenda`, `situacao`, `idcategoria`, `saldo`) VALUES (NULL, 'Coca Cola Garrafa', 2, 3, '1', 1, 20);
INSERT INTO `produto` (`idproduto`, `produto`, `precocompra`, `precovenda`, `situacao`, `idcategoria`, `saldo`) VALUES (NULL, 'Lanche natural', 4, 5, '1', 2, 5);
INSERT INTO `produto` (`idproduto`, `produto`, `precocompra`, `precovenda`, `situacao`, `idcategoria`, `saldo`) VALUES (NULL, 'X-Salada', 7, 10, '1', 2, 5);

COMMIT;


-- -----------------------------------------------------
-- Data for table `usuario`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `senha`, `situacao`) VALUES (NULL, 'Admin', 'admin@admin.com', MD5('unipar-teste'), '1');

COMMIT;

