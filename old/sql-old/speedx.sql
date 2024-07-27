-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2014 at 10:42 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `speedx`
--
CREATE DATABASE IF NOT EXISTS `speedx` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `speedx`;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cadastro` int(11) NOT NULL,
  `id_tipo_exame` int(11) NOT NULL,
  `dt_upload` datetime DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk_tab_resultado_exame_tab_tipo_exame1_idx` (`id_tipo_exame`),
  KEY `fk_tab_resultado_exame_tab_cadastro1_idx` (`id_cadastro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `tab_cadastro`
--

CREATE TABLE IF NOT EXISTS `tab_cadastro` (
  `id_cadastro` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_cad` int(11) NOT NULL,
  `id_saudacao` int(11) NOT NULL,
  `id_uf` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `dt_cadastro` date DEFAULT NULL,
  `nm_cad` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `nm_endereco` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `nm_cidade` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nr_cep` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `nr_tel_fix` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `nr_tel_cel` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `nm_email` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `nr_cpf` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_cadastro`),
  KEY `fk_tab_cadastro_tab_tipo_cadastro1_idx` (`id_tipo_cad`),
  KEY `fk_tab_cadastro_tab_status2_idx` (`id_status`),
  KEY `fk_tab_cadastro_tab_uf2_idx` (`id_uf`),
  KEY `fk_tab_cadastro_tab_saudacao2_idx` (`id_saudacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tab_cadastro`
--

INSERT INTO `tab_cadastro` (`id_cadastro`, `id_tipo_cad`, `id_saudacao`, `id_uf`, `id_status`, `dt_cadastro`, `nm_cad`, `nm_endereco`, `nm_cidade`, `nr_cep`, `nr_tel_fix`, `nr_tel_cel`, `nm_email`, `nr_cpf`) VALUES
(1, 1, 1, 1, 1, '2014-03-14', 'Admin', 'Av. epaminondas rua 1', 'Araraguara', '73005100', '61 3422 5544', '61 9144 5566', 'email1@email.com', '71555111'),
(2, 3, 2, 7, 1, '2014-03-14', 'Darth Vader', 'QD. 7 CJ 8 CS 09', 'Brasília', '73.005-100', '(61) 3322-1100', '(61) 9222-1100', 'email2@email.com', '11223344');

-- --------------------------------------------------------

--
-- Table structure for table `tab_perfil`
--

CREATE TABLE IF NOT EXISTS `tab_perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nm_perfil` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `in_admin` char(1) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tab_perfil`
--

INSERT INTO `tab_perfil` (`id_perfil`, `nm_perfil`, `in_admin`) VALUES
(1, 'Administrador', 'S'),
(2, 'Cliente', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tab_saudacao`
--

CREATE TABLE IF NOT EXISTS `tab_saudacao` (
  `id_saudacao` int(11) NOT NULL AUTO_INCREMENT,
  `nm_saudacao` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_saudacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tab_saudacao`
--

INSERT INTO `tab_saudacao` (`id_saudacao`, `nm_saudacao`) VALUES
(1, 'Dr.(a)'),
(2, 'Sr.(a)'),
(3, 'Caro(a)');

-- --------------------------------------------------------

--
-- Table structure for table `tab_status`
--

CREATE TABLE IF NOT EXISTS `tab_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nm_status` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tab_status`
--

INSERT INTO `tab_status` (`id_status`, `nm_status`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

-- --------------------------------------------------------

--
-- Table structure for table `tab_tipo_cadastro`
--

CREATE TABLE IF NOT EXISTS `tab_tipo_cadastro` (
  `id_tipo_cad` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_cad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_cad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tab_tipo_cadastro`
--

INSERT INTO `tab_tipo_cadastro` (`id_tipo_cad`, `nm_tipo_cad`) VALUES
(1, 'Dentista'),
(2, 'Funcionário'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Table structure for table `tab_tipo_exame`
--

CREATE TABLE IF NOT EXISTS `tab_tipo_exame` (
  `id_tipo_exame` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_exame` varchar(100) DEFAULT NULL,
  `nm_descricao` varchar(1500) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_tipo_exame`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tab_tipo_exame`
--

INSERT INTO `tab_tipo_exame` (`id_tipo_exame`, `nm_tipo_exame`, `nm_descricao`) VALUES
(1, 'Radiografia', 'Processo de registro gráfico de estruturas anatômicas profundas através de raios x ou de raios gama; processo de registro gráfico de estruturas através de raios x ou de raios gama; cópia de uma chapa obtida pela radiografia; estudo dos raios luminosos; estudo apurado; descrição minuciosa'),
(2, 'Tomografia', 'Qualquer exame radiológico que permita visualizar as estruturas anatômicas na forma de cortes; imagem obtida por qualquer dos processos anteriormente descritos'),
(3, 'Prototipagem', 'Construção de modelos físicos da anatomia humana');

-- --------------------------------------------------------

--
-- Table structure for table `tab_uf`
--

CREATE TABLE IF NOT EXISTS `tab_uf` (
  `id_uf` int(11) NOT NULL AUTO_INCREMENT,
  `nm_uf` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `nm_sigla` varchar(2) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tab_uf`
--

INSERT INTO `tab_uf` (`id_uf`, `nm_uf`, `nm_sigla`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amapá', 'AP'),
(4, 'Amazonas', 'AM'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espírito Santo', 'ES'),
(9, 'Goiás', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Mato Grosso', 'MT'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Minas Gerais', 'MG'),
(14, 'Pará', 'PA'),
(15, 'Paraíba', 'PB'),
(16, 'Paraná', 'PR'),
(17, 'Pernambuco', 'PE'),
(18, 'Piauí', 'PI'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'Rio Grande do Sul', 'RS'),
(22, 'Rondônia', 'RO'),
(23, 'Roraima', 'RR'),
(24, 'Santa Catarina', 'SC'),
(25, 'São Paulo', 'SP'),
(26, 'Sergipe', 'SE'),
(27, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Table structure for table `tab_usuario`
--

CREATE TABLE IF NOT EXISTS `tab_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_cadastro` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `nm_usuario` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `nm_senha` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_cadastro`),
  KEY `fk_tab_usuario_tab_cadastro1_idx` (`id_cadastro`),
  KEY `fk_tab_usuario_tab_perfil1_idx` (`id_perfil`),
  KEY `fk_tab_usuario_tab_status2_idx` (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tab_usuario`
--

INSERT INTO `tab_usuario` (`id_usuario`, `id_cadastro`, `id_perfil`, `nm_usuario`, `nm_senha`, `id_status`) VALUES
(3, 1, 1, 'admin', 'matrix77', 1),
(4, 2, 2, 'user', 'user', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_tab_resultado_exame_tab_cadastro1` FOREIGN KEY (`id_cadastro`) REFERENCES `tab_cadastro` (`id_cadastro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tab_resultado_exame_tab_tipo_exame1` FOREIGN KEY (`id_tipo_exame`) REFERENCES `tab_tipo_exame` (`id_tipo_exame`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tab_cadastro`
--
ALTER TABLE `tab_cadastro`
  ADD CONSTRAINT `fk_tab_cadastro_tab_saudacao2` FOREIGN KEY (`id_saudacao`) REFERENCES `tab_saudacao` (`id_saudacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tab_cadastro_tab_status2` FOREIGN KEY (`id_status`) REFERENCES `tab_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tab_cadastro_tab_tipo_cadastro1` FOREIGN KEY (`id_tipo_cad`) REFERENCES `tab_tipo_cadastro` (`id_tipo_cad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tab_cadastro_tab_uf2` FOREIGN KEY (`id_uf`) REFERENCES `tab_uf` (`id_uf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD CONSTRAINT `fk_tab_usuario_tab_cadastro1` FOREIGN KEY (`id_cadastro`) REFERENCES `tab_cadastro` (`id_cadastro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tab_usuario_tab_perfil1` FOREIGN KEY (`id_perfil`) REFERENCES `tab_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tab_usuario_tab_status2` FOREIGN KEY (`id_status`) REFERENCES `tab_status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
