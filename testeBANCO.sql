-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Ago-2019 às 01:28
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.8

CREATE DATABASE IF NOT EXISTS fitcard;
use fitcard;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `categorias` (
  `idcateg` int(11) NOT NULL,
  `nomecateg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `categorias` (`idcateg`, `nomecateg`) VALUES
(0, 'null'),
(1, 'Supermercado'),
(2, 'Restaurante'),
(3, 'Borracharia'),
(4, 'Posto'),
(5, 'Oficina');


CREATE TABLE `estabelecimentos` (
  `RazaoSocial` varchar(100) NOT NULL,
  `NomeFantasia` varchar(100) DEFAULT NULL,
  `CNPJ` bigint(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Endereco` varchar(100) DEFAULT NULL,
  `Cidade` varchar(50) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `DataCadastro` date DEFAULT NULL,
  `Categoria` int(11) NOT NULL DEFAULT 0,
  `Status` varchar(10) DEFAULT NULL,
  `Agencia` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `Conta` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcateg`);

ALTER TABLE `estabelecimentos`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CNPJ` (`CNPJ`),
  ADD KEY `Categoria` (`Categoria`);

ALTER TABLE `categorias`
  MODIFY `idcateg` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `estabelecimentos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `estabelecimentos`
  ADD CONSTRAINT `estabelecimentos_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`idcateg`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
