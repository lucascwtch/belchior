-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2023 às 15:36
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `belchior`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `mensagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`id_email`, `email`, `assunto`, `nome`, `motivo`, `mensagem`) VALUES
(10, 'freis1801@gmail.com', 'Preciso de Ajuda', 'Fabio Henrique ', 'Dúvida', 'Teste Lucas Almeida'),
(11, 'freis1801@gmail.com', 'Preciso de Ajuda 2', 'Fabio Henrique ', 'Dúvida', 'Teste Lucas Almeida'),
(12, 'freis1801@gmail.com', 'Preciso de Ajuda 3', 'Fabio Henrique ', 'Dúvida', 'Teste Lucas Almeida'),
(13, 'freis1801@gmail.com', 'teste', 'Fabio Henrique Silva Falconeri ', 'Dúvida', 'Teste Email'),
(14, 'freis1801@gmail.com', 'teste', 'fcmendes@sme.prefeitura.sp.gov.br', 'Dúvida', 'Teste Email'),
(15, 'freis1801@gmail.com', 'teste', 'Fabio Henrique ', 'Problema ao realizar compra', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `categoria` varchar(120) NOT NULL DEFAULT 'Roupa',
  `preco` varchar(120) NOT NULL,
  `tamanho` varchar(50) NOT NULL,
  `descricao` varchar(220) NOT NULL,
  `imagem` blob NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `titulo`, `categoria`, `preco`, `tamanho`, `descricao`, `imagem`, `created`, `modified`) VALUES
(7, 'Tenis Preto', 'Moda', '20', '32', 'Tenis Preto', 0x74656e69732074657374652e504e47, '2022-11-24', NULL),
(8, 'xesque', 'xesque', '12', '', 'xesq', 0x3538343832666665636566313031346330623565346138662e706e67, '0000-00-00', NULL),
(9, 'testeteste', 'teste3 ', '12', '', '123213', 0x6272616e636f2e504e47, '0000-00-00', NULL),
(10, 'honaizer', 'ronaizer', '12', '', '12312321', 0x61692063616c6963612e6a7067, '0000-00-00', NULL),
(11, 'honaizer', 'ronaizer', '12', '', '12312321', 0x726f636b737461722e706e67, '0000-00-00', NULL),
(12, 'honaizer', 'ronaizer', '12', '', '12312321', 0x6272616e636f2e504e47, '0000-00-00', NULL),
(25, 'teste lucas', 'lucas cumeida', 'cubox', '', 'teste', 0x6272616e636f2e504e47, '0000-00-00', NULL),
(26, 'teste lucas', 'lucas cumeida', 'cubox', '', 'teste', 0x6272616e636f2e504e47, '0000-00-00', NULL),
(27, 'teste lucas', 'lucas cumeida', 'cubox', '', 'teste', 0x6272616e636f2e504e47, '0000-00-00', NULL),
(28, 'teste lucas', 'lucas cumeida', 'cubox', '', 'teste', 0x6272616e636f2e504e47, '0000-00-00', NULL),
(29, 'teste lucas', 'lucas cumeida', 'cubox', '', 'teste', 0x6272616e636f2e504e47, '0000-00-00', NULL),
(30, 'teste lucas', 'lucas cumeida', 'cubox', '', 'teste', 0x6272616e636f2e504e47, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` char(100) NOT NULL,
  `adm` int(11) NOT NULL DEFAULT 1,
  `token` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `adm`, `token`) VALUES
(20, 'Lucas Almeida', 'lucas.almeida@gmail.com', '$2y$10$t9nazwXzglnleio942ZTqejuv0baslKTw7Pw4Hd6S5fMXZZqXtRti', 1, '$2y$10$9LkydmclYbT893/580qGduwVR3m.ytmqcY2Fc8yqDYDIDlpHrciSS'),
(21, 'Fabio Henrique Silva Falconeri Reis', 'freis1801@gmail.com', '$2y$10$F1ArPmlTsuIPs3Ti74vpBe6.pOyE0H.EH5hQDTKxXqHLS/bwxeTku', 1, '$2y$10$AM5pUqsRWxnWlZCN.qyi..B1ASnEBmhsNHq7trHNwe5cWobjAtnx6');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
