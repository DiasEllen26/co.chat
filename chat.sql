-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3312
-- Tempo de geração: 22-Maio-2023 às 20:06
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
-- Banco de dados: `chat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `para_id` int(11) NOT NULL,
  `de_id` int(11) NOT NULL,
  `menssagem` text NOT NULL,
  `aberto` tinyint(1) NOT NULL DEFAULT 0,
  `criado_em` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `para_id`, `de_id`, `menssagem`, `aberto`, `criado_em`) VALUES
(1, 1, 2, 'teste', 1, '2023-05-22 14:56:17'),
(2, 1, 2, 'olá\nbela dama\n', 1, '2023-05-22 14:56:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversa`
--

CREATE TABLE `conversa` (
  `id` int(11) NOT NULL,
  `usuario_1` int(11) NOT NULL,
  `usuario_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conversa`
--

INSERT INTO `conversa` (`id`, `usuario_1`, `usuario_2`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `senha` varchar(1000) NOT NULL,
  `avatar` varchar(255) DEFAULT 'user-default.png',
  `visto` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `username`, `senha`, `avatar`, `visto`) VALUES
(1, 'joao', 'joao', '$2y$10$CDyKpJRYpnINv0Mo86bgb.ougyjIomO3bz4JfMA39O/z3oJ5lcuF2', 'user-default.png', '2023-05-21 13:33:46'),
(2, 'ellen', 'ellen', '$2y$10$f5HajOEmXwfSAhXnl15GV.WEOp6m9.vxr/o2cH5DaHqqmYkcvuj5y', 'user-default.png', '2023-05-21 13:34:54'),
(3, 'amor', 'amor', '$2y$10$8XKiqEjIp30b01FjauI2Sera/JHe4OZfNbFkLquRI.RQE3rs/2emO', 'user-default.png', '2023-05-21 13:37:58'),
(4, 'teste', 'teste', '$2y$10$qwEEVCDQZq/OVhj4YCOUdOblP7/1T0TRyWMGeJfwu9fKfjB1vPoJa', 'user-default.png', '2023-05-21 13:48:53');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `conversa`
--
ALTER TABLE `conversa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `conversa`
--
ALTER TABLE `conversa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
