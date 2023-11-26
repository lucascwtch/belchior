CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(120) NOT NULL,
  `cpfUsuario` int(11) NOT NULL,
  `sobrenomeUsuario` varchar(120) DEFAULT NULL,
  `emailUsuario` varchar(120) UNIQUE NOT NULL,
  `senhaUsuario` char(100) NOT NULL,
  `apelidoUsuario` varchar(120) NOT NULL,
  `perfilImageUsuario` blob NOT NULL,
  `statusUsuario` int(11) NOT NULL DEFAULT 1,
  `tokenUsuario` char(100) NOT NULL,
  `dataNascimentoUsuario` date DEFAULT NULL,
  `telefoneUsuario` BIGINT(14) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Verifica se a tabela 'email' já existe antes de criar
CREATE TABLE IF NOT EXISTS `email` (
  `idEmail` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `assuntoEmail` varchar(100) NOT NULL,
  `nomeEmail` varchar(100) NOT NULL,
  `motivoEmail` varchar(100) NOT NULL,
  `mensagemEmail` text NOT NULL,
  `emailUsuario` varchar(120) NOT NULL,
  PRIMARY KEY (`idEmail`),
  FOREIGN KEY (`emailUsuario`) REFERENCES `usuarios` (`emailUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Verifica se a tabela 'produtos' já existe antes de criar
CREATE TABLE IF NOT EXISTS `produtos` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(120) NOT NULL,
  `categoriaProduto` varchar(120) NOT NULL DEFAULT 'Roupa',
  `precoProduto` double NOT NULL,
  `tamanhoProduto` varchar(50) NOT NULL,
  `descricaoProduto` text NOT NULL,
  `imagemProduto` blob NOT NULL,
  `createdProduto` date NOT NULL,
  `modifiedProduto` date DEFAULT NULL,
  `estoqueProduto` int NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idProduto`),
  FOREIGN KEY (`idUsuario`) REFERENCES `usuarios`(`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
