-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 02/08/2024 às 16:01
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
  `mapa_id` int NOT NULL,
  `mapa_usuario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ambiente`
--

CREATE TABLE `ambiente` (
  `id` int NOT NULL,
  `mapa_id` int NOT NULL,
  `mapa_usuario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `desejo`
--

CREATE TABLE `desejo` (
  `id` int NOT NULL,
  `mapa_id` int NOT NULL,
  `mapa_usuario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `mapa_id` int NOT NULL,
  `mapa_usuario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mapa`
--

CREATE TABLE `mapa` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mentalidade`
--

CREATE TABLE `mentalidade` (
  `id` int NOT NULL,
  `mapa_id` int NOT NULL,
  `mapa_usuario_id` int NOT NULL
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `visual`
--

CREATE TABLE `visual` (
  `id` int NOT NULL,
  `mapa_id` int NOT NULL,
  `mapa_usuario_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acoes`
--
ALTER TABLE `acoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_acoes_mapa1_idx` (`mapa_id`,`mapa_usuario_id`);

--
-- Índices de tabela `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ambiente_mapa1_idx` (`mapa_id`,`mapa_usuario_id`);

--
-- Índices de tabela `desejo`
--
ALTER TABLE `desejo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_desejo_mapa1_idx` (`mapa_id`,`mapa_usuario_id`);

--
-- Índices de tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_feedback_mapa1_idx` (`mapa_id`,`mapa_usuario_id`);

--
-- Índices de tabela `mapa`
--
ALTER TABLE `mapa`
  ADD PRIMARY KEY (`id`,`usuario_id`),
  ADD KEY `fk_mapa_usuario_idx` (`usuario_id`);

--
-- Índices de tabela `mentalidade`
--
ALTER TABLE `mentalidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mentalidade_mapa1_idx` (`mapa_id`,`mapa_usuario_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `visual`
--
ALTER TABLE `visual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_visual_mapa1_idx` (`mapa_id`,`mapa_usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acoes`
--
ALTER TABLE `acoes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `desejo`
--
ALTER TABLE `desejo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mapa`
--
ALTER TABLE `mapa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mentalidade`
--
ALTER TABLE `mentalidade`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `visual`
--
ALTER TABLE `visual`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `acoes`
--
ALTER TABLE `acoes`
  ADD CONSTRAINT `fk_acoes_mapa1` FOREIGN KEY (`mapa_id`,`mapa_usuario_id`) REFERENCES `mapa` (`id`, `usuario_id`);

--
-- Restrições para tabelas `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `fk_ambiente_mapa1` FOREIGN KEY (`mapa_id`,`mapa_usuario_id`) REFERENCES `mapa` (`id`, `usuario_id`);

--
-- Restrições para tabelas `desejo`
--
ALTER TABLE `desejo`
  ADD CONSTRAINT `fk_desejo_mapa1` FOREIGN KEY (`mapa_id`,`mapa_usuario_id`) REFERENCES `mapa` (`id`, `usuario_id`);

--
-- Restrições para tabelas `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_mapa1` FOREIGN KEY (`mapa_id`,`mapa_usuario_id`) REFERENCES `mapa` (`id`, `usuario_id`);

--
-- Restrições para tabelas `mapa`
--
ALTER TABLE `mapa`
  ADD CONSTRAINT `fk_mapa_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `mentalidade`
--
ALTER TABLE `mentalidade`
  ADD CONSTRAINT `fk_mentalidade_mapa1` FOREIGN KEY (`mapa_id`,`mapa_usuario_id`) REFERENCES `mapa` (`id`, `usuario_id`);

--
-- Restrições para tabelas `visual`
--
ALTER TABLE `visual`
  ADD CONSTRAINT `fk_visual_mapa1` FOREIGN KEY (`mapa_id`,`mapa_usuario_id`) REFERENCES `mapa` (`id`, `usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
