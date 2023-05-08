-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 07-Maio-2023 às 22:44
-- Versão do servidor: 5.7.23-23
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `grupo119_ativacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `capa`
--

CREATE TABLE `capa` (
  `CAPAID` int(11) NOT NULL,
  `SUPPLIERID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `NAME` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NF` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SERIENF` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OC` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMISSIONDT` datetime DEFAULT NULL,
  `DTINC` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `capa`
--

INSERT INTO `capa` (`CAPAID`, `SUPPLIERID`, `COMPANYID`, `NAME`, `NF`, `SERIENF`, `OC`, `EMISSIONDT`, `DTINC`) VALUES
(8, 14, 6, 'Capa 1', '1111111111', '44444444', '333333333333', '2022-04-12 00:00:00', '2022-06-29 00:19:41'),
(9, 14, 6, 'Capa 3', '1111111111', '22222222', '333333333333', '0000-00-00 00:00:00', '2022-06-29 01:05:11'),
(10, 14, 6, 'Capa 2', '1111111111', '22222222', '444444444444', '0000-00-00 00:00:00', '2022-06-29 01:07:45'),
(11, 14, 6, 'Capa 34', '00000000000', '22222222', '444444444444', '1993-02-15 00:00:00', '2022-06-29 01:10:59'),
(12, 14, 6, 'Capa 100', '1111111111', '22222222', '333333333333', '1990-02-14 00:00:00', '2022-06-29 17:18:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `COMPANYID` int(11) NOT NULL,
  `CNPJ` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `LOGO` text COLLATE utf8_unicode_ci,
  `DTINC` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`COMPANYID`, `CNPJ`, `NAME`, `LOGO`, `DTINC`) VALUES
(6, '74185296374185', 'Empresa 1', 'uploads/Wikimedia-logo.png', '2022-06-29 00:02:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `ITEMID` int(11) NOT NULL,
  `CAPAID` int(11) NOT NULL,
  `KEYLICENSE` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SERIELICENSE` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DTINC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`ITEMID`, `CAPAID`, `KEYLICENSE`, `SERIELICENSE`, `DTINC`) VALUES
(21, 11, 'QQQQQQQQQQQQQQ', '4444', '2022-06-29 04:13:04'),
(22, 12, 'QQQQQQQQQQQQQQ', '33333333332', '2022-06-29 20:18:22'),
(23, 12, 'rrsrsrsrsrsrs', '', '2022-06-29 20:18:28'),
(24, 12, 'QQQQQQQQQQQQQQ', 'WWWWWWWWWWWWWWWW', '2022-06-29 20:26:02'),
(25, 8, 'hhhhhhhhh34345', 'WWWWWWWWWWWWWWWW', '2022-06-29 20:26:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIERID` int(11) NOT NULL,
  `CNPJ` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `DTINC` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `supplier`
--

INSERT INTO `supplier` (`SUPPLIERID`, `CNPJ`, `NAME`, `DTINC`) VALUES
(14, '74185296374185', 'Fornecedor 1', '2022-06-29 00:00:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `USERID` double NOT NULL,
  `CPF` varchar(15) DEFAULT NULL,
  `USERNAME` varchar(25) DEFAULT NULL,
  `PASSWORD` varchar(36) DEFAULT NULL,
  `OLDPASSWORD` varchar(25) DEFAULT NULL,
  `FULLNAME` varchar(50) DEFAULT NULL,
  `USERMAIL` text,
  `USERPHONE` varchar(15) DEFAULT NULL,
  `USERSTATUS` double DEFAULT '0',
  `USERISACTIVE` double DEFAULT '1',
  `SUPERUSER` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`USERID`, `CPF`, `USERNAME`, `PASSWORD`, `OLDPASSWORD`, `FULLNAME`, `USERMAIL`, `USERPHONE`, `USERSTATUS`, `USERISACTIVE`, `SUPERUSER`) VALUES
(1, '98765432101', 'admin', 'e6e061838856bf47e1de730719fb2609', 'admin@123', 'Anderson Alves', 'alves-anderson@live.com', '11983985612', 1, 1, 1),
(2, '00000000000', 'adriano', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'Adriano Viegas', 'dri.viegas.av@gmail.com', '000000', 1, 1, 0),
(4, '00000000002', 'sistemalicencas', '040b7cf4a55014e185813e0644502ea9', 'asdfg', 'Sistema de Licenças', 'sistemalicencas@teste.com', '11999999999', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_status`
--

CREATE TABLE `user_status` (
  `USERSTATUSID` double NOT NULL,
  `USERSTATUSNAME` varchar(25) DEFAULT NULL,
  `USERSTATUSISACTIVE` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_status`
--

INSERT INTO `user_status` (`USERSTATUSID`, `USERSTATUSNAME`, `USERSTATUSISACTIVE`) VALUES
(1, '1 - Cadastro', 1),
(2, '2 - Usuário', 1),
(3, '3 - Consulta', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `capa`
--
ALTER TABLE `capa`
  ADD PRIMARY KEY (`CAPAID`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`COMPANYID`),
  ADD UNIQUE KEY `IDX_CNPJ` (`CNPJ`);

--
-- Índices para tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ITEMID`);

--
-- Índices para tabela `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIERID`),
  ADD UNIQUE KEY `idx_CNPJ` (`CNPJ`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERID`),
  ADD UNIQUE KEY `IDX_CPF` (`CPF`),
  ADD KEY `USERID` (`USERID`);

--
-- Índices para tabela `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`USERSTATUSID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `capa`
--
ALTER TABLE `capa`
  MODIFY `CAPAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `COMPANYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `ITEMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `USERID` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `user_status`
--
ALTER TABLE `user_status`
  MODIFY `USERSTATUSID` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
