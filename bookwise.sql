-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Out-2024 às 01:57
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bookwise`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `livro_id` int(11) DEFAULT NULL,
  `avaliacao` text DEFAULT NULL,
  `nota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `usuario_id`, `livro_id`, `avaliacao`, `nota`) VALUES
(4, 21, 3, 'Livro pica', 4),
(5, 21, 3, 'livro pica 2', 3),
(6, 21, 11, 'Ótimo', 5),
(7, 21, 2, 'odiei esse livro', 1),
(8, 21, 2, 'brinks eu gostei', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `numero_paginas` int(11) DEFAULT NULL,
  `ano_lancamento` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `autor`, `descricao`, `numero_paginas`, `ano_lancamento`, `usuario_id`) VALUES
(2, 'bannerFDSAF', 'Novesiterheinger', 'FQWEFWQEFWQF', NULL, 1818, 21),
(3, 'Dom Quixota', 'Miguel de Cervantes', 'Aventuras de um cavaleiro errante', 863, 1605, 1),
(4, '1984', 'George Orwell', 'Distopia sobre um regime totalitário', 328, 1949, 2),
(5, 'Orgulho e Preconceios', 'Jane Austen', 'Romance sobre classe e casamento', 432, 1813, 2),
(6, 'O Senhor dos Anéis', 'J.R.R. Tolkien', 'Saga épica na Terra-média', 1216, 1954, 1),
(7, 'O Apanhador no Campo de Centeio', 'J.D. Salinger', 'Reflexões de um jovem em conflito', 277, 1951, 3),
(8, 'A Revolução dos Bichos', 'George Orwell', 'Uma fábula sobre revolução e poder', 112, 1945, 1),
(9, 'Moby Dick', 'Herman Melville', 'A caçada de uma baleia branca', 635, 1851, 2),
(10, 'Guerra e Paz', 'Liev Tolstói', 'Uma história sobre a guerra e a sociedade', 1225, 1869, NULL),
(11, 'sitio do pica pau amarelo', 'monteiro loubato', 'fdjalfkjadfjklajfklajkfjkasd', NULL, 1800, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(3, 'Geraldinho', 'geraldo@gmail.com', '12341234$'),
(14, 'joao 1', 'joao1@hotmail.com', '12341234$'),
(17, 'bbbbbbbb', 'bbbbbbbb@hotmail.com', '12341234$'),
(18, 'jerere', 'jerere@gmail.com', '12341234$'),
(20, 'Gustavo', 'gustavofagundes1999@hotmail.com', '12341243$'),
(21, 'Gustavo', 'gustavofagundes1998@hotmail.com', '$2y$10$ynqWxQ.GrJyeIyXCy5QGEuoZAHFQpBUX9420K7yZwUz1iVfpjhI3.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `livro_id` (`livro_id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
