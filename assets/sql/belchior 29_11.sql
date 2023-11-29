CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` INT PRIMARY KEY AUTO_INCREMENT,
  `nomeUsuario` VARCHAR(120) NOT NULL,
  `cpfUsuario` NUMERIC(11,0) NOT NULL,
  `emailUsuario` VARCHAR(120) UNIQUE NOT NULL,
  `senhaUsuario` CHAR(100) NOT NULL,
  `apelidoUsuario` VARCHAR(120) NOT NULL,
  `perfilImageUsuario` BLOB NOT NULL,
  `statusUsuario` INT NOT NULL DEFAULT 1,
  `tokenUsuario` CHAR(100) NOT NULL,
  `dataNascimentoUsuario` DATE DEFAULT NULL,
  `telefoneUsuario` BIGINT(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `email` (
  `idEmail` INT PRIMARY KEY AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `assuntoEmail` VARCHAR(100) NOT NULL,
  `nomeEmail` VARCHAR(100) NOT NULL,
  `motivoEmail` VARCHAR(100) NOT NULL,
  `mensagemEmail` TEXT NOT NULL,
  `emailUsuario` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`idEmail`),
  FOREIGN KEY (`emailUsuario`) REFERENCES `usuarios` (`emailUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `produtos` (
  `idProduto` INT PRIMARY KEY AUTO_INCREMENT,
  `nomeProduto` VARCHAR(120) NOT NULL,
  `categoriaProduto` VARCHAR(120) NOT NULL DEFAULT 'Roupa',
  `precoProduto` DOUBLE NOT NULL,
  `tamanhoProduto` VARCHAR(50) NOT NULL,
  `descricaoProduto` TEXT NOT NULL,
  `imagemProduto` BLOB NOT NULL,
  `createdProduto` DATE NOT NULL,
  `modifiedProduto` DATE DEFAULT NULL,
  `estoqueProduto` INT NOT NULL,
  `fkUsuario` INT,
  FOREIGN KEY (`fkUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `solicitacoesAfiliar` (
    `idPedido` INT PRIMARY KEY AUTO_INCREMENT,
    `nomeUsuarioCliente` VARCHAR(255) NOT NULL,
    `emailUsuarioCliente` VARCHAR(255) NOT NULL,
    `cpfUsuarioCliente` NUMERIC(11, 0) NOT NULL,
    `telefoneUsuarioCliente` VARCHAR(20),
    `mensagemUsuarioCliente` TEXT,
    `fkIdUsuario` INT,
    FOREIGN KEY (`fkIdUsuario`) REFERENCES `usuarios` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;