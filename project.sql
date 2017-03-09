-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Oca 2017, 17:09:34
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `CID` int(100) NOT NULL AUTO_INCREMENT,
  `PID` int(10) NOT NULL,
  `GID` int(10) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Message` text COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`CID`),
  KEY `PID` (`PID`),
  KEY `GID` (`GID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `GID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `CompanyName` varchar(40) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `Photo` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'game.jpg',
  `AgeLimit` int(3) DEFAULT NULL,
  `Genre` varchar(20) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`GID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `game`
--

INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(12, 'Call Of Duty: Modern Warfare', 'Activision', 'codmw2.jpg', 7, 'ACTION');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(14, 'Darksiders', 'Nordic Games', 'darksiders.jpg', NULL, 'ROLE PLAYING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(15, 'Deadrising', 'Capcom', 'deadrising.jpg', 13, 'HORROR');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(16, 'Dead Souls 3', 'Bandai Namco', 'deadsouls3.jpg', 13, 'ROLE PLAYING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(17, 'Deus Ex: Mankind Divided', 'Eidos', 'deusex.jpg', NULL, 'FPS');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(18, 'Dirt Rally', 'Code Masters', 'dirtrally.jpg', NULL, 'RACING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(19, 'DOOM', 'Bethesda', 'doom.jpg', 13, 'FPS');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(20, 'The Dwarves', 'Nordic Games', 'dwarves.jpg', NULL, 'ROLE PLAYING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(21, 'Emergency', 'Deep Silver', 'emergency.jpg', NULL, 'STRATEGY');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(22, 'Fallout 4', 'Bethesda', 'fallout4.jpg', NULL, 'ROLE PLAYING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(23, 'Farming Simulator 2017', 'Giants Software', 'farming.jpg', NULL, 'SIMULATION');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(24, 'Killing Floor 2', 'Tripwire Interactive', 'killing2.jpg', 13, 'FPS');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(25, 'Mafia 3', '2K Games', 'mafia3.jpg', NULL, 'ACTION');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(26, 'Moto GP 2', 'THQ', 'motogp2.jpg', NULL, 'RACING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(27, 'NBA 2K16', 'EA', 'nba2016.jpg', NULL, 'SPORTS');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(28, 'Pro Evolution Soccer 2017', 'Konami', 'pes2017.jpg', NULL, 'SPORTS');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(29, 'Metal Gear Solid V: The Phantom Pain', 'Konami', 'phantompain.jpg', NULL, 'ACTION');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(30, 'Planet Explorers', 'Pathea Games', 'planetexplorer.jpg', NULL, 'ADVENTURE');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(32, 'Far Cry : Primal', 'Ubisoft', 'primal.jpg', 13, 'ACTION');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(33, 'Ride 2', 'Milestone', 'ride2.jpg', NULL, 'RACING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(34, 'Shadow Warrior 2', 'Devolver Digital', 'shadowwarrior2.jpg', 13, 'FPS');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(35, 'The Elder Scrolls V : Skyrim', 'Bethesda', 'skyrim.jpg', NULL, 'ROLE PLAYING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(36, 'Soma', 'Frictional Games', 'soma.jpg', 13, 'HORROR');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(37, 'The Technomancer', 'Focus Home Interactive', 'technomancer.jpg', NULL, 'ROLE PLAYING');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(38, 'Rise Of The Tomb Rider', 'Crysral Dynamics', 'tombrider.jpg', NULL, 'ACTION');
INSERT INTO `game` (`GID`, `name`, `CompanyName`, `Photo`, `AgeLimit`, `Genre`) VALUES(39, 'Thranny', 'Paradox Interactive', 'tyranny.jpg', NULL, 'ROLE PLAYING');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logouts`
--

DROP TABLE IF EXISTS `logouts`;
CREATE TABLE IF NOT EXISTS `logouts` (
  `SID` int(255) NOT NULL,
  `EndTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `PID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `age` int(3) DEFAULT NULL,
  `photo` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'default.jpg',
  `email` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Pmessage` text COLLATE utf8mb4_turkish_ci,
  `lastWrongLogins` decimal(10,0) NOT NULL DEFAULT '0',
  `password` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `RegisterTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Isadmin` bit(1) NOT NULL DEFAULT b'0',
  `gender` varchar(1) COLLATE utf8mb4_turkish_ci DEFAULT '1',
  PRIMARY KEY (`PID`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `person`
--

INSERT INTO `person` (`PID`, `name`, `surname`, `age`, `photo`, `email`, `Pmessage`, `lastWrongLogins`, `password`, `nick`, `RegisterTime`, `Isadmin`, `gender`) VALUES(6, 'Cihan', 'Toklucu', 21, '20161023_181936_HDR-3.jpg', 'cihantoklucu1@gmail.com', 'ADMIN IS HERE!', '0', '7b0431302170307ff040c10051ad7634', 'Comteng', '2017-01-19 16:55:54', b'1', '1');
INSERT INTO `person` (`PID`, `name`, `surname`, `age`, `photo`, `email`, `Pmessage`, `lastWrongLogins`, `password`, `nick`, `RegisterTime`, `Isadmin`, `gender`) VALUES(7, 'SadÄ±k', 'Talan', 24, 'WhatsApp-Image-20160526.jpg', 'sadiktalan@mail.com', NULL, '0', 'b4e12d0781dd6d85152405146e9953ef', 'IÄŸdÄ±r', '2017-01-19 16:58:28', b'1', '1');
INSERT INTO `person` (`PID`, `name`, `surname`, `age`, `photo`, `email`, `Pmessage`, `lastWrongLogins`, `password`, `nick`, `RegisterTime`, `Isadmin`, `gender`) VALUES(8, 'BahadÄ±r', 'Yurdakul', 21, '12391354_1032791380074690_7619252197581650267_n.jpg', 'bahadiry@mail.com', NULL, '0', '15015a2c3da337729007d8dcc862135d', 'Byrdkl', '2017-01-19 16:59:35', b'1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `SID` int(255) NOT NULL AUTO_INCREMENT,
  `PID` int(10) NOT NULL,
  `Datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SID`),
  KEY `PID` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `PID` int(10) NOT NULL,
  `GID` int(10) NOT NULL,
  `VOTE` bit(1) NOT NULL,
  PRIMARY KEY (`PID`,`GID`),
  KEY `PID` (`PID`),
  KEY `VOTE` (`VOTE`),
  KEY `GID` (`GID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `person` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`GID`) REFERENCES `game` (`GID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `logouts`
--
ALTER TABLE `logouts`
  ADD CONSTRAINT `logouts_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `sessions` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `person` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `person` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`GID`) REFERENCES `game` (`GID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
