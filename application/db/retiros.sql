CREATE DATABASE IF NOT EXISTS `retiros`;

USE `retiros`;

CREATE TABLE IF NOT EXISTS `integrantes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comunidade` varchar(150) NOT NULL,
  `telefone_fixo` varchar(14) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;