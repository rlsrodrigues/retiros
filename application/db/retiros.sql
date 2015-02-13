-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2015 às 04:13
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `retiros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipes`
--

CREATE TABLE IF NOT EXISTS `equipes` (
  `id` int(11) unsigned NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(140) DEFAULT NULL,
  `principal` int(1) DEFAULT '1' COMMENT 'Campo que define se a equipe é a principal do retiro',
  `ativa` int(1) DEFAULT '1',
  `id_retiro` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_equipes_retiros_idx` (`id_retiro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `id` int(11) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(140) NOT NULL,
  `quantidade_ideal` int(2) DEFAULT NULL,
  `id_equipe` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funcoes_equipes1_idx` (`id_equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `integrantes`
--

CREATE TABLE IF NOT EXISTS `integrantes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `comunidade` varchar(150) NOT NULL,
  `telefone_fixo` varchar(14) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  `primeiro_retiro` varchar(45) DEFAULT NULL,
  `observacoes` varchar(140) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `integrantes`
--

INSERT INTO `integrantes` (`id`, `nome`, `email`, `comunidade`, `telefone_fixo`, `celular`, `data_nascimento`, `primeiro_retiro`, `observacoes`, `senha`) VALUES
(1, 'Renato Rodrigues', 'contato@centroculturaldobrasil.com.br', 'Santa Rita de Cássia', '(41) 3396-5113', '(41) 9933-2664', '1990-08-03', '8º Encontro com Deus', 'teste de maçã', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participacao_integrante`
--

CREATE TABLE IF NOT EXISTS `participacao_integrante` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_integrante` int(11) unsigned NOT NULL,
  `id_funcao` int(11) unsigned NOT NULL,
  `id_equipe` int(11) unsigned NOT NULL,
  `id_retiro` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_participantes_integrantes1_idx` (`id_integrante`),
  KEY `fk_participantes_funcoes1_idx` (`id_funcao`),
  KEY `fk_participantes_equipes1_idx` (`id_equipe`),
  KEY `fk_participantes_retiros1_idx` (`id_retiro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `retiros`
--

CREATE TABLE IF NOT EXISTS `retiros` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `tema` varchar(150) DEFAULT NULL,
  `musica` varchar(150) DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `local` varchar(150) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `observacoes` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `retiros`
--

INSERT INTO `retiros` (`id`, `nome`, `tema`, `musica`, `data_inicio`, `data_fim`, `local`, `endereco`, `observacoes`) VALUES
(1, 'VI Encontro com Deus', '', '', '2015-03-02', '2015-03-04', '', '', ''),
(3, 'VI Encontro com Deus', '', '', '2015-03-02', '2015-03-04', '', '', ''),
(4, 'VI Encontro com Deus', '', '', '2015-03-02', '2015-03-04', '', '', ''),
(5, 'VI Encontro com Deus', '', '', '2015-03-02', '2015-03-04', '', '', ''),
(6, 'VI Encontro com Deus', '', '', '2015-03-02', '2015-03-04', '', '', ''),
(7, 'VI Encontro com Deus', '', '', '2015-03-02', '2015-03-04', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `fk_equipes_retiros` FOREIGN KEY (`id_retiro`) REFERENCES `retiros` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcoes`
--
ALTER TABLE `funcoes`
  ADD CONSTRAINT `fk_funcoes_equipes1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `participacao_integrante`
--
ALTER TABLE `participacao_integrante`
  ADD CONSTRAINT `fk_participantes_equipes1` FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participantes_funcoes1` FOREIGN KEY (`id_funcao`) REFERENCES `funcoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participantes_integrantes1` FOREIGN KEY (`id_integrante`) REFERENCES `integrantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participantes_retiros1` FOREIGN KEY (`id_retiro`) REFERENCES `retiros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
