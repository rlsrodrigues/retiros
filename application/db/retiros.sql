CREATE DATABASE IF NOT EXISTS `retiros`;

USE `retiros`;

CREATE TABLE `integrantes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(150) NOT NULL,
  `comunidade` varchar(150) NOT NULL,
  `telefone_fixo` varchar(14) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  `primeiro_retiro` varchar(45) DEFAULT NULL,
  `observacoes` varchar(140) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;