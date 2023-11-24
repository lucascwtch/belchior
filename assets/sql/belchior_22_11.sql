CREATE TABLE `email` (
  `idEmail` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `assuntoEmail` varchar(100) NOT NULL,
  `nomeEmail` varchar(100) NOT NULL,
  `motivoEmail` varchar(100) NOT NULL,
  `mensagemEmail` text NOT NULL,
  PRIMARY KEY (`idEmail`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `tituloProduto` varchar(120) NOT NULL,
  `categoriaProduto` varchar(120) NOT NULL DEFAULT 'Roupa',
  `precoProduto` double NOT NULL,
  `tamanhoProduto` varchar(50) NOT NULL,
  `descricaoProduto` text NOT NULL,
  `imagemProduto` blob NOT NULL,
  `createdProduto` date NOT NULL,
  `modifiedProduto` date DEFAULT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(120) NOT NULL,
  `sobrenomeUsuario` varchar(120) DEFAULT NULL,
  `emailUsuario` varchar(120) NOT NULL,
  `senhaUsuario` char(100) NOT NULL,
  `apelidoUsuario` varchar(120) NOT NULL,
  `perfilImageUsuario` blob NOT NULL,
  `statusUsuario` int(11) NOT NULL DEFAULT 1,
  `tokenUsuario` char(100) NOT NULL,
  `dataNascimentoUsuario` date DEFAULT NULL,
  `telefoneUsuario` BIGINT(14) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
