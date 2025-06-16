-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/06/2025 às 20:18
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdeventos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcontato`
--

CREATE TABLE `tbcontato` (
  `idContato` int(11) NOT NULL,
  `nomeContato` varchar(50) NOT NULL,
  `cnpjContato` varchar(20) NOT NULL,
  `telefoneContato` varchar(15) NOT NULL,
  `emailContato` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbcontato`
--

INSERT INTO `tbcontato` (`idContato`, `nomeContato`, `cnpjContato`, `telefoneContato`, `emailContato`) VALUES
(1, 'GISELE NUNES DA SILVA', '11.111.111/0001-xx', '11986469433', 'giselepucca2008@hotmail.com'),
(2, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(3, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(4, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(5, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(6, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(7, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(8, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(9, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(10, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(11, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(12, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(13, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(14, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(15, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(16, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(17, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(18, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(19, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(20, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(21, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(22, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(23, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(24, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(25, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(26, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(27, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(28, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(29, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(30, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(31, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(32, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(33, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(34, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(35, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(36, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(37, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(38, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com'),
(39, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'gisele@hotmail.com'),
(40, 'GISELE NUNES DA SILVA', '41.858.503/0001-68', '11986469433', 'giselepucca2008@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbeventos`
--

CREATE TABLE `tbeventos` (
  `idEvento` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `data_evento` date NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbeventos`
--

INSERT INTO `tbeventos` (`idEvento`, `titulo`, `data_evento`, `descricao`, `imagem`, `idUsuario`) VALUES
(1, 'Virada cultural', '2025-05-27', 'show do Periclão', 'imagem3.png', 1),
(2, 'Show da Luisa', '2025-06-07', 'Campos de Morango', 'imagem1.jpg', 2),
(3, 'Show do João Gomes', '2025-06-08', 'Na praça de eventos em Guaianases', 'imagem2.jpg', 3),
(4, 'Show Luiza Sonza', '2025-06-14', 'Show da braba!!', 'imagem3.jpg', 4),
(5, 'Luisa', '2025-06-13', 'Shooow!!', 'imagem4.jpg', 5),
(16, 'Luiza Sonza', '2025-06-21', 'Show da Luiza em Guaianazes.', 'imagem5.jpg', 13),
(17, 'Show do Péricles', '2025-06-15', 'Show do Periclão.', 'imagem2.jpeg', 17),
(20, 'teste', '2025-06-20', 'teste', 'imagem13.png', 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idUsuario`, `emailUsuario`, `senhaUsuario`) VALUES
(1, 'giselepucca2008@hotmail.com', '$2y$10$fJgE.b4zE7IJyMMXimf7BuPl5KIkgkxoY'),
(2, 'esther@gmail.com', '$2y$10$DoO8kw4UwAbHG4SbjVUeCOVjP9rPGxzvA'),
(3, 'hyago@lol.com', '$2y$10$3ibOc1xWtG/uoqK922Izc.wayj7lWgUL1'),
(4, 'gigi@hotmail.com', '$2y$10$8plYdNSCNaYpGCdrLgpCP.4zBSF/.IYMI'),
(5, 'carlos@hotmail.com', '$2y$10$bgvpBnUgBPLhHWwg/cHBJ.a72asExwZa6'),
(6, 'luciano@gmail.com', '$2y$10$.xBdX2KIvrTYKsV.XZs8T.LJFSE5XCzJkJR1FhXCzTOjQIbJB/rRK'),
(7, 'ellen@gmail.com', '$2y$10$e7nnA7vycnwCCnov4FNvNOMIgp273SgkiP.3bcVMCQmWh0RX6prSW'),
(9, 'gabriel@hotmail.com', '$2y$10$dBulL/1JRgEkbppDbw2kVendfGbrJ1U1/zJPfPwhr.uG1/lWaGFym'),
(10, 'gisele@hotmail.com', '$2y$10$/6pPZcZCiREtV4xmjlbmxuMpg2y7gcFIX4T.2x2j3r1bOtHWX99Fe'),
(11, 'carlao@hotmail.com', '$2y$10$4gfqa9kNcX9D2Oz9t8yykOC4JAw3nvNofUG5azbiP1Ait5tkQuVtW'),
(12, 'clodo@hotmail.com', '$2y$10$7pKfiAuyEwGjSrUkYuG1QuE4rLbuMsLsh/vMN5vEgNZ5IBIcBwwcO'),
(13, 'gi@hotmail.com', '$2y$10$Cew9VLmmQ7mik4Xs7pLir.saqZc2XYAjBhoRw01VtsM1HxR.ShmAu'),
(16, 'gabriel@gmail.com', '$2y$10$y8Xp1AbwOie6cIH0BNRGkelsz6nsT952QR0fFFD7NGXIJMAZCDiG.'),
(17, 'jonathan@gmail.com', '$2y$10$84NC4tN4S.3Mpn0NzqSAT.LEpQKPwt/KclK7kKduoKDo3X13nmH6O');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbcontato`
--
ALTER TABLE `tbcontato`
  ADD PRIMARY KEY (`idContato`);

--
-- Índices de tabela `tbeventos`
--
ALTER TABLE `tbeventos`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `fk_idUsuario` (`idUsuario`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `emailUsuario` (`emailUsuario`),
  ADD KEY `emailUsuario_2` (`emailUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcontato`
--
ALTER TABLE `tbcontato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tbeventos`
--
ALTER TABLE `tbeventos`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbeventos`
--
ALTER TABLE `tbeventos`
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
