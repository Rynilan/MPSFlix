-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql212.infinityfree.com
-- Tempo de geração: 16/05/2025 às 10:37
-- Versão do servidor: 10.6.19-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `if0_38603676_mpsflix`
--
CREATE DATABASE IF NOT EXISTS `if0_38603676_mpsflix` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `if0_38603676_mpsflix`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categoria_filme`
--

CREATE TABLE `tb_categoria_filme` (
  `id` int(11) NOT NULL,
  `id_filme` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categoria_serie`
--

CREATE TABLE `tb_categoria_serie` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_episodios`
--

CREATE TABLE `tb_episodios` (
  `id_episodio` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  `duracao` time NOT NULL,
  `temporada` int(11) NOT NULL,
  `link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_filmes`
--

CREATE TABLE `tb_filmes` (
  `id_filme` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL,
  `duracao` time NOT NULL,
  `sinopse` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_series`
--

CREATE TABLE `tb_series` (
  `id_serie` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `descricao` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `email` varchar(256) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `senha` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `tb_categoria_filme`
--
ALTER TABLE `tb_categoria_filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_filme` (`id_filme`),
  ADD KEY `fk_categoria` (`id_categoria`);

--
-- Índices de tabela `tb_categoria_serie`
--
ALTER TABLE `tb_categoria_serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk__serie` (`id_serie`),
  ADD KEY `fk__categoria` (`id_categoria`);

--
-- Índices de tabela `tb_episodios`
--
ALTER TABLE `tb_episodios`
  ADD PRIMARY KEY (`id_episodio`),
  ADD KEY `fk_serie` (`id_serie`);

--
-- Índices de tabela `tb_filmes`
--
ALTER TABLE `tb_filmes`
  ADD PRIMARY KEY (`id_filme`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Índices de tabela `tb_series`
--
ALTER TABLE `tb_series`
  ADD PRIMARY KEY (`id_serie`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_categoria_filme`
--
ALTER TABLE `tb_categoria_filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_categoria_serie`
--
ALTER TABLE `tb_categoria_serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_episodios`
--
ALTER TABLE `tb_episodios`
  MODIFY `id_episodio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_filmes`
--
ALTER TABLE `tb_filmes`
  MODIFY `id_filme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_series`
--
ALTER TABLE `tb_series`
  MODIFY `id_serie` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_categoria_filme`
--
ALTER TABLE `tb_categoria_filme`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`),
  ADD CONSTRAINT `fk_filme` FOREIGN KEY (`id_filme`) REFERENCES `tb_filmes` (`id_filme`);

--
-- Restrições para tabelas `tb_categoria_serie`
--
ALTER TABLE `tb_categoria_serie`
  ADD CONSTRAINT `fk__categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`),
  ADD CONSTRAINT `fk__serie` FOREIGN KEY (`id_serie`) REFERENCES `tb_series` (`id_serie`);

--
-- Restrições para tabelas `tb_episodios`
--
ALTER TABLE `tb_episodios`
  ADD CONSTRAINT `fk_serie` FOREIGN KEY (`id_serie`) REFERENCES `tb_series` (`id_serie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
