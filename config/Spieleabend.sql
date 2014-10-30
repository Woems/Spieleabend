-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 31. Okt 2014 um 00:08
-- Server Version: 5.5.37-MariaDB
-- PHP-Version: 5.5.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `wSpieleabend`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `leiter` int(11) NOT NULL,
  `locationfromuser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eventgame`
--

CREATE TABLE IF NOT EXISTS `eventgame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `eventuser`
--

CREATE TABLE IF NOT EXISTS `eventuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `minPlayer` int(11) NOT NULL DEFAULT '0',
  `maxPlayer` int(11) NOT NULL DEFAULT '0',
  `minLength` int(11) NOT NULL DEFAULT '0',
  `maxLength` int(11) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL DEFAULT '0',
  `boxSizeLength` int(11) NOT NULL DEFAULT '0',
  `boxSizeWidth` int(11) NOT NULL DEFAULT '0',
  `boxSizeHeight` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Daten für Tabelle `game`
--

INSERT INTO `game` (`id`, `name`, `minPlayer`, `maxPlayer`, `minLength`, `maxLength`, `age`, `boxSizeLength`, `boxSizeWidth`, `boxSizeHeight`, `description`, `added`, `changed`) VALUES
(1, 'Test123', 2, 5, 60, 110, 11, 0, 0, 0, '', '2013-12-26 14:36:20', '2013-12-26 14:36:20');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `group`
--

INSERT INTO `group` (`id`, `name`) VALUES
(1, 'Administratoren');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `have`
--

CREATE TABLE IF NOT EXISTS `have` (
  `gameId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `lastplay` date NOT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  `add` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`gameId`,`userId`),
  UNIQUE KEY `gameId` (`gameId`,`userId`),
  KEY `gameId_2` (`gameId`,`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `have`
--

INSERT INTO `have` (`gameId`, `userId`, `count`, `lastplay`, `rate`, `add`, `change`) VALUES
(1, 1, 1, '2014-05-24', 4, '0000-00-00 00:00:00', '2014-05-24 13:01:54'),

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
