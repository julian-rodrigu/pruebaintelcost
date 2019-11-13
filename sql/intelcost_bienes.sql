DROP DATABASE IF EXISTS intelcost_bienes;

CREATE DATABASE `intelcost_bienes`;

USE `intelcost_bienes`;

DROP TABLE IF EXISTS `bien`;

CREATE TABLE `bien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Address` varchar(250) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `Phone` varchar(250) DEFAULT NULL,
  `Postal` varchar(250) DEFAULT NULL,
  `Type` varchar(250) DEFAULT NULL,
  `Price` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
