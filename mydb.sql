-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 08/08/2024 às 11:45
-- Versão do servidor: 8.0.39-0ubuntu0.22.04.1
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

--
-- Despejando dados para a tabela `acoes`
--

INSERT INTO `acoes` (`id`, `objetivo_id`, `titulo`, `descricao`, `vencimento`, `status`, `criadoEm`) VALUES
(1, 1, 'Assistir Aulas', 'Assistir todas as aulas do curso de SQL na primeira semana.', '2024-08-15', 'em progresso', '2024-08-08 14:03:31'),
(2, 1, 'Fazer Exercícios', 'Completar todos os exercícios práticos do curso.', '2024-08-20', 'pendente', '2024-08-08 14:03:31'),
(3, 2, 'Revisar Documento', 'Revisar o documento do projeto e enviar feedback.', '2024-08-10', 'pendente', '2024-08-08 14:03:31'),
(4, 2, 'Reunião com Equipe', 'Agendar reunião com a equipe para discutir o progresso.', '2024-08-12', 'pendente', '2024-08-08 14:03:31'),
(5, 3, 'Planejar Treinos', 'Criar um cronograma de treinos para o primeiro mês.', '2024-08-08', 'concluída', '2024-08-08 14:03:31'),
(6, 3, 'Comprar Equipamentos', 'Comprar os equipamentos necessários para os treinos.', '2024-08-09', 'pendente', '2024-08-08 14:03:31'),
(7, 4, 'Reservar Hotel', 'Reservar o hotel para as datas da viagem.', '2024-08-25', 'pendente', '2024-08-08 14:03:31'),
(8, 4, 'Comprar Passagens', 'Comprar passagens aéreas para a viagem.', '2024-08-28', 'pendente', '2024-08-08 14:03:31'),
(9, 5, 'Escolher Livros', 'Selecionar os livros para leitura do primeiro semestre.', '2024-08-10', 'em progresso', '2024-08-08 14:03:31'),
(10, 5, 'Criar Cronograma', 'Criar um cronograma de leitura para os livros selecionados.', '2024-08-12', 'pendente', '2024-08-08 14:03:31'),
(11, 20, 'Ação 1 do Objetivo 1', 'Descrição da Ação 1', '2024-08-10', 'pendente', '2024-08-01 13:00:00'),
(12, 20, 'Ação 2 do Objetivo 1', 'Descrição da Ação 2', '2024-08-15', 'em progresso', '2024-08-01 14:00:00'),
(13, 21, 'Ação 1 do Objetivo 2', 'Descrição da Ação 1', '2024-08-20', 'concluída', '2024-08-02 15:00:00'),
(14, 22, 'Ação 1 do Objetivo 1', 'Descrição da Ação 1', '2024-08-25', 'pendente', '2024-08-01 16:00:00'),
(15, 23, 'Ação 1 do Objetivo 1', 'Descrição da Ação 1', '2024-08-10', 'pendente', '2024-08-01 16:00:00'),
(16, 24, 'Ação 1 do Objetivo 2', 'Descrição da Ação 1', '2024-08-20', 'em progresso', '2024-08-02 17:00:00');

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

--
-- Despejando dados para a tabela `objetivo`
--

INSERT INTO `objetivo` (`id`, `usuario_id`, `titulo`, `descricao`, `criadoEm`) VALUES
(1, 1, 'Aprender SQL', 'Completar o curso básico de SQL e praticar consultas.', '2024-08-08 14:03:10'),
(2, 2, 'Projeto de Trabalho', 'Finalizar o projeto para a apresentação do próximo mês.', '2024-08-08 14:03:10'),
(3, 3, 'Plano de Fitness', 'Seguir o plano de exercícios e alimentação por 3 meses.', '2024-08-08 14:03:10'),
(4, 4, 'Viagem de Férias', 'Planejar a viagem para a praia nas próximas férias.', '2024-08-08 14:03:10'),
(5, 5, 'Leitura de Livros', 'Ler pelo menos 10 livros ao longo do ano.', '2024-08-08 14:03:10'),
(6, 6, 'Melhorar Saúde Mental', 'Praticar meditação e atividades relaxantes diariamente.', '2024-08-08 14:03:10'),
(7, 7, 'Economizar Dinheiro', 'Guardar 20% do salário mensalmente por um ano.', '2024-08-08 14:03:10'),
(8, 8, 'Aprender um Novo Idioma', 'Estudar francês por 6 meses e fazer um teste de proficiência.', '2024-08-08 14:03:10'),
(9, 9, 'Reforma da Casa', 'Renovar a pintura e móveis da sala de estar.', '2024-08-08 14:03:10'),
(10, 10, 'Curso de Cozinha', 'Participar de um curso de culinária e aprender novas receitas.', '2024-08-08 14:03:10'),
(20, 1, 'Objetivo 1 do Alice', 'Descrição do Objetivo 1', '2024-08-01 13:00:00'),
(21, 1, 'Objetivo 2 do Alice', 'Descrição do Objetivo 2', '2024-08-02 14:00:00'),
(22, 2, 'Objetivo 1 do Bob', 'Descrição do Objetivo 1', '2024-08-01 15:00:00'),
(23, 3, 'Objetivo 1 do Carol', 'Descrição do Objetivo 1', '2024-08-01 16:00:00'),
(24, 3, 'Objetivo 2 do Carol', 'Descrição do Objetivo 2', '2024-08-02 17:00:00');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `objetivo`
--
ALTER TABLE `objetivo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
