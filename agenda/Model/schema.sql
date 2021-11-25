CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NULL DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idadministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARACTER SET=latin1;

INSERT INTO `projeto_final`.`administrador` (`nome`,`cpf`,`senha`) VALUES ('Bia','22222222222','bia123');

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `usuario` VALUES 
    (4,'Thays Moia Ribeiro','42949461808',NULL,'thaysmoiaribeiro@gmail.com',''),
    (9,'Pamela','51604752149',NULL,'thaysmoiaribeiro@gmail.com','');

CREATE TABLE `experienciaProfissional` (
  `idexperienciaprofissional` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `inicio` date NULL,
  `fim` date NULL,
  `empresa` varchar(45) NULL,
  `descricao` varchar(45) NULL,
  PRIMARY KEY (`idexperienciaprofissional`),
INDEX `idUser_idx` (`idusuario`),
CONSTRAINT `idUser` FOREIGN KEY (`idusuario`) REFERENCES `projeto_final`.`usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION);

CREATE TABLE `formacaoAcademica` (
  `idformacaoAcademica` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idformacaoAcademica`),INDEX `IDUSUARIO_idx`(`idusuario` ASC),
  CONSTRAINT `IDUSUARIO` FOREIGN KEY (`idusuario`) REFERENCES `projeto_final`.`usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARACTER SET=latin1;

CREATE TABLE `outrasFormacoes` (
  `idoutrasformacoes` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idoutrasformacoes`),
  KEY `idusuario_idx` (`idusuario`),
  CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;