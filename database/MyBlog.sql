-- Adminer 4.8.1 MySQL 5.5.5-10.5.13-MariaDB-0ubuntu0.21.10.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Articles`;
CREATE TABLE `Articles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(45) NOT NULL,
  `Cont` varchar(150) NOT NULL,
  `DateStart` datetime NOT NULL,
  `DateEnd` datetime NOT NULL,
  `Rank` int(11) NOT NULL DEFAULT 0,
  `Authors_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Articles_Authors1_idx` (`Authors_ID`),
  CONSTRAINT `fk_Articles_Authors1` FOREIGN KEY (`Authors_ID`) REFERENCES `Authors` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Articles` (`ID`, `Title`, `Cont`, `DateStart`, `DateEnd`, `Rank`, `Authors_ID`) VALUES
(1,	'Comment le sport aide à mieux dormir ?',	'Le sport comme le Biathlon permettent de mieux dormir.',	'2022-01-01 12:00:00',	'2022-02-05 12:00:00',	3,	2),
(2,	'Le sport pour les femmes enceintes ?',	'Le sport est bon pour les femmes enceintes. Cela leur permet de mieux gérer la grosse, mais ne faites pas de Biathlon.',	'2022-02-01 12:00:00',	'2022-02-15 12:00:00',	2,	4),
(3,	'Le lait de poule ?',	'Quelle pule mouillé !',	'2022-03-01 12:00:00',	'2022-03-15 12:00:00',	2,	2),
(4,	'Le bébé une torture ?',	'Les bébés est petit.',	'2022-03-01 12:00:00',	'2022-03-15 12:00:00',	5,	3),
(5,	'Article de Valentine',	'Voilà l\'article de valentine',	'2022-01-01 12:00:00',	'2022-03-15 12:00:00',	5,	1),
(6,	'Nouvel Article de Matéo dans les loisirs',	'Voici le nouvel article de notre blog',	'2022-02-01 00:00:00',	'2022-03-20 00:00:00',	5,	4);

DROP TABLE IF EXISTS `Authors`;
CREATE TABLE `Authors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) CHARACTER SET utf16 NOT NULL,
  `FirstName` varchar(45) CHARACTER SET utf16 DEFAULT NULL,
  `Pseudo` varchar(45) CHARACTER SET utf16 NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `AUTPseudo_UNIQUE` (`Pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Authors` (`ID`, `Name`, `FirstName`, `Pseudo`) VALUES
(1,	'Brousseau',	NULL,	'Val'),
(2,	'Batard',	'Adélaïde',	'Bler'),
(3,	'Grimard',	'Daoust',	'Guertin'),
(4,	'Parizeau',	'Latimer',	'Matéo'),
(5,	'Roux',	'Fealty',	'Sabourin');

DROP TABLE IF EXISTS `Categories`;
CREATE TABLE `Categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) CHARACTER SET utf16 NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CATName_UNIQUE` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Categories` (`ID`, `Name`) VALUES
(3,	'bébé'),
(5,	'dévelopement web'),
(1,	'loisirs'),
(4,	'théâtre'),
(2,	'voyage');

DROP TABLE IF EXISTS `Comments`;
CREATE TABLE `Comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cont` varchar(150) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Articles_ID` int(11) NOT NULL,
  `Authors_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Comments_Articles_idx` (`Articles_ID`),
  KEY `fk_Comments_Authors1_idx` (`Authors_ID`),
  CONSTRAINT `fk_Comments_Articles` FOREIGN KEY (`Articles_ID`) REFERENCES `Articles` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comments_Authors1` FOREIGN KEY (`Authors_ID`) REFERENCES `Authors` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

INSERT INTO `Comments` (`ID`, `Cont`, `Date`, `Articles_ID`, `Authors_ID`) VALUES
(2,	'Bravo !',	'2022-02-02 09:41:55',	2,	4),
(3,	'Bravo !',	'2022-02-02 09:42:07',	1,	2),
(6,	'Bravo !',	'2022-02-02 10:04:03',	3,	2);

DROP TABLE IF EXISTS `is_Categorised`;
CREATE TABLE `is_Categorised` (
  `Categories_ID` int(11) NOT NULL,
  `Articles_ID` int(11) NOT NULL,
  PRIMARY KEY (`Categories_ID`,`Articles_ID`),
  KEY `fk_Categories_has_Articles_Articles1_idx` (`Articles_ID`),
  KEY `fk_Categories_has_Articles_Categories1_idx` (`Categories_ID`),
  CONSTRAINT `fk_Categories_has_Articles_Articles1` FOREIGN KEY (`Articles_ID`) REFERENCES `Articles` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categories_has_Articles_Categories1` FOREIGN KEY (`Categories_ID`) REFERENCES `Categories` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `is_Categorised` (`Categories_ID`, `Articles_ID`) VALUES
(1,	1),
(1,	3),
(1,	6),
(2,	4),
(3,	1),
(4,	2),
(4,	3);

-- 2022-02-03 08:01:03
SELECT Articles.Title, Articles.Cont, Authors.Pseudo
FROM Articles
         INNER JOIN Authors ON Articles.Authors_ID = Authors.ID
ORDER BY Articles.ID DESC
LIMIT 10;