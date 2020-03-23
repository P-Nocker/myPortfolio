-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 mrt 2020 om 18:52
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mijnportfolio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectcategories`
--
-- Aangemaakt: 10 mrt 2020 om 12:52
--

DROP TABLE IF EXISTS `projectcategories`;
CREATE TABLE IF NOT EXISTS `projectcategories` (
  `projectCategoryId` int(5) NOT NULL AUTO_INCREMENT,
  `projectCategoryTitle` varchar(255) NOT NULL,
  `projectCategoryDescription` text NOT NULL,
  `projectCategoryImage` varchar(255) NOT NULL,
  PRIMARY KEY (`projectCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectcategories`
--

INSERT INTO `projectcategories` (`projectCategoryId`, `projectCategoryTitle`, `projectCategoryDescription`, `projectCategoryImage`) VALUES
(1, 'Webdevelopment', '', 'webdevelopment.png'),
(2, 'Windows C#', '', 'softwaredevelopment.jpg'),
(3, 'Embedded Sytems', '', 'embeddedsystems.jpg'),
(4, 'Industrial Automation', '', 'industrialautomation.jpg'),
(5, 'IT Skills', '', 'itskills.jpg'),
(6, 'IT Essentials', '', 'itessentials.jpg'),
(7, 'Mobile App', '', 'mobileappdevelopment.jpg'),
(8, 'MBO Hackaton', '', 'mbohackaton.jpg'),
(9, 'Private Projects', '', 'privateprojects.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectimages`
--
-- Aangemaakt: 10 mrt 2020 om 13:13
--

DROP TABLE IF EXISTS `projectimages`;
CREATE TABLE IF NOT EXISTS `projectimages` (
  `projectImageId` int(5) NOT NULL AUTO_INCREMENT,
  `projectImagePath` varchar(255) NOT NULL,
  PRIMARY KEY (`projectImageId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectimages`
--

INSERT INTO `projectimages` (`projectImageId`, `projectImagePath`) VALUES
(1, 'radiogaga[1].jpg'),
(2, 'tunestore[1].jpg'),
(3, 'gameworld[1].jpg'),
(4, 'gameworld[2].png'),
(5, 'guessthenumber[1].jpg'),
(6, 'clickgame[1].jpg'),
(7, 'signupsignin[1].jpg'),
(8, 'canadeesvermenigvuldigen[1].jpg'),
(9, 'signupsignin[2].jpg'),
(10, 'instaclone[1].jpg'),
(11, 'jquerymemory[1].jpg'),
(12, 'calculator++[1].jpg'),
(13, 'calculator++[2].jpg'),
(14, 'adobe_xd[1].png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectproperties`
--
-- Aangemaakt: 18 mrt 2020 om 14:43
--

DROP TABLE IF EXISTS `projectproperties`;
CREATE TABLE IF NOT EXISTS `projectproperties` (
  `projectPropertyId` int(5) NOT NULL AUTO_INCREMENT,
  `projectPropertyTitle` varchar(255) NOT NULL,
  `projectPropertyDescription` text NOT NULL,
  PRIMARY KEY (`projectPropertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectproperties`
--

INSERT INTO `projectproperties` (`projectPropertyId`, `projectPropertyTitle`, `projectPropertyDescription`) VALUES
(1, 'HTML', ''),
(2, 'CSS', ''),
(3, 'PHP', ''),
(4, 'SQL', ''),
(5, 'Javascript', ''),
(6, 'json', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectreviews`
--
-- Aangemaakt: 10 mrt 2020 om 13:47
--

DROP TABLE IF EXISTS `projectreviews`;
CREATE TABLE IF NOT EXISTS `projectreviews` (
  `projectReviewId` int(5) NOT NULL AUTO_INCREMENT,
  `projectReviewTitle` varchar(255) NOT NULL,
  `projectReviewText` text NOT NULL,
  `projectReviewRating` int(5) NOT NULL,
  `projectReviewDate` datetime NOT NULL,
  `projectId` int(5) NOT NULL,
  `userId` int(5) NOT NULL,
  PRIMARY KEY (`projectReviewId`),
  KEY `projectId` (`projectId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectreviews`
--

INSERT INTO `projectreviews` (`projectReviewId`, `projectReviewTitle`, `projectReviewText`, `projectReviewRating`, `projectReviewDate`, `projectId`, `userId`) VALUES
(1, 'One of the nice projects of period 1', 'One of the nice projects of period 1\r\nOne of the nice projects of period 1\r\nOne of the nice projects of period 1\r\n\r\nOne of the nice projects of period 1One of the nice projects of period 1\r\n\r\nOne of the nice projects of period 1One of the nice projects of period 1\r\nOne of the nice projects of period 1\r\nOne of the nice projects of period 1', 8, '2020-03-09 08:27:22', 1, 2),
(2, 'One of the nice projects of period 1', 'Lorem Ipsum\r\nLorem Ipsum\r\nLorem Ipsum\r\nLorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum', 8, '2020-03-10 17:38:52', 1, 3),
(3, 'One of the nice projects of period 1', 'Lorem Ipsum\r\nLorem Ipsum\r\nLorem Ipsum\r\nLorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum', 8, '2020-03-10 17:38:52', 7, 2),
(4, 'One of the nice projects of period 1', 'Lorem Ipsum\r\nLorem Ipsum\r\nLorem Ipsum\r\nLorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum', 8, '2020-03-10 17:38:52', 7, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--
-- Aangemaakt: 10 mrt 2020 om 13:06
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `projectId` int(5) NOT NULL AUTO_INCREMENT,
  `projectTitle` varchar(255) NOT NULL,
  `projectDescription` text NOT NULL,
  `projectCategoryId` int(5) NOT NULL,
  PRIMARY KEY (`projectId`),
  KEY `projectCategoryId` (`projectCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projects`
--

INSERT INTO `projects` (`projectId`, `projectTitle`, `projectDescription`, `projectCategoryId`) VALUES
(1, 'GameWorld', '', 1),
(2, 'TuneStore', '', 2),
(3, 'Radio Gaga', '', 1),
(4, 'Calculator++', 'This is the first webdevelopment assignment at school.\r\nIn this assignment PHP is used to fetch $_GET information from the URL that was sent uing an HTML form', 1),
(5, 'Guess The Number', '', 1),
(6, 'Wireframes', '', 5),
(7, 'Sign Up, Sign In', 'Webdevelopment assignment to be able to login using PHpassword encryption and databaseP\'s $_SESSION, B-crypt and a database', 1),
(8, 'Click Game', 'Fancy Javascript game with a dice and 2 players', 1),
(9, 'Canadees Vermenigvuldigen', '', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectsprojectimages`
--
-- Aangemaakt: 10 mrt 2020 om 13:18
--

DROP TABLE IF EXISTS `projectsprojectimages`;
CREATE TABLE IF NOT EXISTS `projectsprojectimages` (
  `projectId` int(5) NOT NULL,
  `projectImageId` int(5) NOT NULL,
  KEY `projectId` (`projectId`),
  KEY `projectImageId` (`projectImageId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectsprojectimages`
--

INSERT INTO `projectsprojectimages` (`projectId`, `projectImageId`) VALUES
(1, 3),
(3, 1),
(2, 2),
(8, 6),
(5, 5),
(7, 7),
(9, 8),
(7, 9),
(6, 14),
(4, 12);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectsprojectproperties`
--
-- Aangemaakt: 18 mrt 2020 om 17:29
--

DROP TABLE IF EXISTS `projectsprojectproperties`;
CREATE TABLE IF NOT EXISTS `projectsprojectproperties` (
  `projectsProjectPropertiesId` int(10) NOT NULL AUTO_INCREMENT,
  `projectId` int(5) NOT NULL,
  `projectPropertyId` int(5) NOT NULL,
  PRIMARY KEY (`projectsProjectPropertiesId`),
  KEY `projectId` (`projectId`),
  KEY `projectPropertyId` (`projectPropertyId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectsprojectproperties`
--

INSERT INTO `projectsprojectproperties` (`projectsProjectPropertiesId`, `projectId`, `projectPropertyId`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 3),
(4, 1, 1),
(5, 3, 2),
(6, 3, 3),
(7, 7, 1),
(8, 7, 3),
(9, 7, 4),
(10, 3, 1),
(11, 1, 2),
(12, 1, 5),
(13, 1, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--
-- Aangemaakt: 10 mrt 2020 om 13:46
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(5) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `streetName` varchar(100) NOT NULL,
  `houseNumber` varchar(5) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `cityName` varchar(50) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `streetName`, `houseNumber`, `zipCode`, `cityName`, `emailAddress`, `password`, `createdAt`, `updatedAt`) VALUES
(1, 'Peter', 'Nocker', 'Keizerin Marialaan', '2', '3257XF', 'Helmond', 'p.nocker@roc-teraa.nl', '$2y$12$s2mfsrQRHSEEZizGfhBDyuMHTX1XhVbUjxOrwOtgAOXcb7YhDA0MC', '2019-12-14 12:17:32', '2019-12-15 03:12:18'),
(2, 'Klaas', 'Vaak', 'Slaapplein', '123', '1234ZZ', 'Droomstad', 'klaas@slaap.nl', '$2y$12$1IKSn0UHvYoyoyXoa/g3uutJ7oKsmgDsSTWS2k9nL8alE6lhYVoc2', '2019-12-14 13:08:45', '2019-12-15 15:37:24'),
(3, 'Oliver', 'Twist', 'Churchstreet', '345 A', '7766', 'Londen', 'oliver@twist.co.uk', '$2y$12$IJWPFNfcxtynmhzZsG8KOeYVuU0LCunie1H0jUBRD3li6Z5kIYrCW', '2019-12-15 10:05:24', '2019-12-15 01:08:11'),
(5, 'Sherlock', 'Holmes', 'Bakerstreet', '221B', 'NW1 6XE', 'London', 'sherlock@holmes.co.uk', '$2y$12$mjzj/bPvdAnf8eZx0R4r8.KPA5K7GhyNijbRMG16jpKnjT8H6w1Z6', '2019-12-15 15:19:01', '2019-12-15 15:19:01');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `projectreviews`
--
ALTER TABLE `projectreviews`
  ADD CONSTRAINT `projectreviews_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectreviews_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`projectCategoryId`) REFERENCES `projectcategories` (`projectCategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `projectsprojectimages`
--
ALTER TABLE `projectsprojectimages`
  ADD CONSTRAINT `projectsprojectimages_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectsprojectimages_ibfk_2` FOREIGN KEY (`projectImageId`) REFERENCES `projectimages` (`projectImageId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `projectsprojectproperties`
--
ALTER TABLE `projectsprojectproperties`
  ADD CONSTRAINT `projectsprojectproperties_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`projectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectsprojectproperties_ibfk_2` FOREIGN KEY (`projectPropertyId`) REFERENCES `projectproperties` (`projectPropertyId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
