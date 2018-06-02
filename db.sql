-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `documentId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `subject` varchar(50) DEFAULT NULL,
  `uploads` mediumtext,
  `fileName` mediumtext,
  `dateUploaded` datetime DEFAULT NULL,
  PRIMARY KEY (`documentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `documents` (`documentId`, `title`, `description`, `subject`, `uploads`, `fileName`, `dateUploaded`) VALUES
(1,	'New Fares',	'Bus Fares',	'Bus Fares for 2018',	'a:1:{i:0;s:38:\"How to Create a Pagination in PHP.docx\";}',	'New Fares',	'2018-06-02 12:30:16');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `userType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `userName`, `email`, `password`, `userType`) VALUES
(1,	'Wellington',	'Chanda',	'admin',	'admin@mail.com',	'123456',	'Adminstrator'),
(2,	'John',	'Banda',	'test',	'test@mail.com',	'654321',	'User');

-- 2018-06-02 11:12:31
