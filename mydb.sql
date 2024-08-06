-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06/08/2024 às 10:45
-- Versão do servidor: 8.0.37-0ubuntu0.22.04.3
-- Versão do PHP: 8.1.2-1ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acoes`
--

CREATE TABLE `acoes` (
  `id` int NOT NULL,
  `objetivo_id` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `vencimento` date DEFAULT NULL,
  `status` enum('pendente','em progresso','concluída') DEFAULT 'pendente',
  `criadoEm` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `objetivo`
--

CREATE TABLE `objetivo` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text,
  `criadoEm` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`) VALUES
(1, 'Alice', 'senha123'),
(2, 'Bob', 'senha456'),
(3, 'Carol', 'senha789'),
(4, 'David', 'senha012'),
(5, 'Eve', 'senha345'),
(6, 'Frank', 'senha678'),
(7, 'Grace', 'senha901'),
(8, 'Heidi', 'senha234'),
(9, 'Ivan', 'senha567'),
(10, 'Judy', 'senha890');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acoes`
--
ALTER TABLE `acoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `objetivo_id` (`objetivo_id`);

--
-- Índices de tabela `objetivo`
--
ALTER TABLE `objetivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acoes`
--
ALTER TABLE `acoes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `objetivo`
--
ALTER TABLE `objetivo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `acoes`
--
ALTER TABLE `acoes`
  ADD CONSTRAINT `acoes_ibfk_1` FOREIGN KEY (`objetivo_id`) REFERENCES `objetivo` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `objetivo`
--
ALTER TABLE `objetivo`
  ADD CONSTRAINT `objetivo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
