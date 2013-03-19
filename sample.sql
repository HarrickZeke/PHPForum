-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mar 19 Mars 2013 à 22:36
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `forum`
--
CREATE DATABASE `forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(120) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dateOfBirth` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `author`
--

INSERT INTO `author` (`id`, `name`, `email`, `password`, `gender`, `dateOfBirth`) VALUES
(1, 'Harrick Zeke', 'harrick.zeke@saucisse.fr', 'admin', 'male', '1987-03-19'),
(2, 'Robert Knack', 'robert.knack@saucisse.fr', 'user', 'male', '1981-01-21');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `orderId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `orderId`) VALUES
(1, 'Private', 1),
(2, 'Public', 2),
(3, 'Phantom', 3);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `datetime` datetime NOT NULL,
  `topicId` int(11) NOT NULL,
  `authorId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `body`, `datetime`, `topicId`, `authorId`, `orderId`) VALUES
(1, 'Curabitur sed gravida arcu. Quisque feugiat sagittis mi, et placerat tortor ultrices ut.', '2013-03-17 18:35:55', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `authorId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`id`, `name`, `description`, `authorId`, `orderId`, `categoryId`) VALUES
(1, 'Saucisse 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut auctor tempus arcu sit amet convallis. Sed aliquet, mauris vitae viverra mollis, ligula libero posuere leo, at ultricies nulla nunc at massa. Nulla facilisi. Pellentesque hendrerit mattis risus sit amet tempus. Curabitur sed gravida arcu. Quisque feugiat sagittis mi, et placerat tortor ultrices ut. ', 21, 45, 1),
(2, 'Saucisse 2', 'Mauris tincidunt tristique laoreet. Ut at condimentum nisl. Donec non magna nec odio interdum suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet arcu eu sapien posuere vulputate non eget velit. Morbi diam dui, viverra non porta ut, fermentum id turpis. Cras non enim quis neque viverra vulputate eget vitae ipsum. Vivamus porta gravida ligula, ac aliquet metus ultrices in. Vivamus nisi sapien, tincidunt in bibendum sit amet, consequat quis diam. Cras ut justo at justo euismod tincidunt egestas vitae justo.', 21, 45, 1),
(3, 'Saucisse 3', 'Aliquam erat volutpat. Duis quis nulla augue. Curabitur a metus ut augue eleifend varius. Curabitur ut risus non quam viverra eleifend sit amet ut massa. Suspendisse at velit et metus laoreet dapibus. Integer varius euismod scelerisque. Curabitur eu risus id massa hendrerit luctus. Aliquam vulputate tellus at nisl ornare sit amet imperdiet urna consectetur. Donec placerat dictum diam, ac tempor nisl viverra eu.', 21, 45, 3),
(4, 'Saucisse 4', 'Aliquam erat volutpat. Nam vel nibh odio, at lobortis sem. Vivamus pretium sapien ac augue auctor at varius urna pharetra. Quisque fermentum mi velit, ut adipiscing lectus. Fusce quis lacus purus. Nulla posuere dolor et nibh vulputate ac tempus purus ornare. Aenean mauris sem, fringilla sit amet cursus non, scelerisque imperdiet ipsum. Phasellus vel velit in lacus euismod imperdiet ac at massa. Donec nec ultrices sapien. ', 21, 45, 2),
(5, 'Saucisse 5', 'Fusce sed libero ut leo convallis condimentum vel ac nunc. Praesent sagittis interdum mi et tempus. Aenean sem urna, interdum eget commodo ac, consequat a eros. Praesent ornare velit non nisl tristique posuere. Etiam sollicitudin quam nec neque vestibulum feugiat.', 21, 45, 2),
(6, 'Saucisse 6', 'Pellentesque dignissim urna in nisi vehicula a pellentesque nibh sodales. In mattis egestas sapien, ac eleifend ligula placerat quis. Donec fringilla leo in quam accumsan eleifend. Ut id cursus dolor.', 21, 45, 3),
(7, 'Saucisse 7', 'Suspendisse pellentesque vulputate dictum. Proin posuere imperdiet consequat. Aliquam erat volutpat. Nunc diam tortor, aliquam non fermentum nec, tincidunt eu dui.', 21, 45, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
