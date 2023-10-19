-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Out-2022 às 16:02
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `senha`, `email`) VALUES
(1, 'Fabio Henrique ', '123', 'freis1801@gmail.com'),
(2, 'Fabio Henrique ', '123', 'freis1801@gmail.com'),
(3, 'Lucas', '123', 'freis1801@gmail.com'),
(4, 'Fabio Henrique ', '123', 'freis1801@gmail.com'),
(5, 'Fabio Henrique ', '123', 'freis1801@gmail.com'),
(6, 'Jorge Gabriel', '123', 'freis1801@gmail.com'),
(7, 'Gabriel Mendes', '123', 'freis1801@gmail.com'),
(8, 'Gabriel Mendes', '123', 'freis1801@gmail.com'),
(9, 'Gabriel Mendes', '123', 'freis1801@gmail.com'),
(10, 'Gabriel Mendes', '123', 'freis1801@gmail.com'),
(11, 'Edgar', '123', 'freis1801@gmail.com'),
(12, 'Edgar', '123', 'freis1801@gmail.com'),
(13, 'Fabio Henrique ', '123', 'freis1801@gmail.com'),
(14, 'Fabio Henrique ', '123', 'freis1801@gmail.com'),
(15, 'Fabio Henrique ', '123', 'freis1801@gmail.com'),
(16, 'Fabio Henrique ', '123', 'freis1801@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
