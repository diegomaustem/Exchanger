-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 02:48 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exchanger`
--

-- --------------------------------------------------------

--
-- Table structure for table `arqbase`
--

CREATE TABLE `arqbase` (
  `cod` int(11) NOT NULL,
  `endereco` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dice`
--

CREATE TABLE `dice` (
  `id` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `sourcee` varchar(50) DEFAULT NULL,
  `mediumm` varchar(50) DEFAULT NULL,
  `campaign` varchar(50) DEFAULT NULL,
  `dt_emission` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dice`
--

INSERT INTO `dice` (`id`, `cod`, `sourcee`, `mediumm`, `campaign`, `dt_emission`) VALUES
(1, 1, 'Instragran', 'Instagran', 'Instagran', '2020-06-05 20:38:36'),
(2, 2, 'Muccashop', 'CPC', 'Muccashop', '2020-08-10 17:23:11'),
(3, 3, 'twitter', 'twitter', 'twitter', '2020-08-11 02:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `datta` timestamp NOT NULL DEFAULT current_timestamp(),
  `nome_archive` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `url`, `datta`, `nome_archive`) VALUES
(1, 'https://aguadecoco.com.br/media/googleshopping/google-shopping-1.xml', '2020-06-08 15:41:56', 'teste-atualizacao'),
(2, 'https://aguadecoco.com.br/media/googleshopping/google-shopping-1.xml', '2020-08-10 17:23:35', 'Muccashop'),
(3, 'http://melhorias.eastus.cloudapp.azure.com/exchanger/examples/archives/Muccashop.xml', '2020-08-11 02:39:30', 'campanha-twitter'),
(4, 'http://melhorias.eastus.cloudapp.azure.com/exchanger/examples/archives/Muccashop.xml', '2020-08-14 12:02:19', 'campanha-instagram');

-- --------------------------------------------------------

--
-- Table structure for table `urls_actual`
--

CREATE TABLE `urls_actual` (
  `id_a` int(11) NOT NULL,
  `urlatual` varchar(150) DEFAULT NULL,
  `datta` varchar(20) DEFAULT current_timestamp(),
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urls_actual`
--

INSERT INTO `urls_actual` (`id_a`, `urlatual`, `datta`, `nome`) VALUES
(1, 'melhorias.eastus.cloudapp.azure.com/exchanger/examples/archives/teste-atualizacao.xml', '2020-06-08 12:41:56', 'teste-atualizacao'),
(2, 'melhorias.eastus.cloudapp.azure.com/exchanger/examples/archives/Muccashop.xml', '2020-08-10 14:23:35', 'Muccashop'),
(3, 'melhorias.eastus.cloudapp.azure.com/exchanger/examples/archives/campanha-twitter.xml', '2020-08-10 23:39:30', 'campanha-twitter'),
(4, 'melhorias.eastus.cloudapp.azure.com/exchanger/examples/archives/campanha-instagram.xml', '2020-08-14 09:02:19', 'campanha-instagram');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arqbase`
--
ALTER TABLE `arqbase`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `dice`
--
ALTER TABLE `dice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urls_actual`
--
ALTER TABLE `urls_actual`
  ADD PRIMARY KEY (`id_a`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dice`
--
ALTER TABLE `dice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `urls_actual`
--
ALTER TABLE `urls_actual`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
